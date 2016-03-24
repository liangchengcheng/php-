<?php

namespace App\Http\Controllers\View;

use App\Entity\CartItem;
use App\Entity\Category;
use App\Entity\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
use App\Entity\Order;
use App\Entity\OrderItem;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function toOrderCommit(Request $request)
    {
        $product_ids = $request->input('products', '');

        //判断是否为空不是空的话直接拆分
        $product_ids_arr = ($product_ids != '' ? explode(',', $product_ids) : array());
        //在session里面获取member
        $member = $request->session()->get('member', '');
        //从购物车获取商品商品id在其中并且会员id是此的购物车列表
        $cart_items = CartItem::where('member_id', $member->id)->whereIn('product_id', $product_ids_arr)->get();
        //初始化订单的对象
        $order = new Order();
        $order->member_id = $member->id;
        $order->save();

        $cart_items_arr = array();
        //当前的价格是0
        $total_price = 0;
        $name = '';
        foreach ($cart_items as $cart_item) {
            //在商品列表查找对应的商品根据id
            $cart_item->product = Product::find($cart_item->product_id);
            if ($cart_item->product != null) {
                //当前的价格=购物车商品的价格 乘以 数量
                $total_price += $cart_item->product->price * $cart_item->count;
                $name .= ('《' . $cart_item->product->name . '》');
                array_push($cart_items_arr, $cart_item);

                $order_item = new OrderItem();
                //订单的id
                $order_item->order_id = $order->id;
                //商品id
                $order_item->product_id = $cart_item->product_id;
                //商品数量
                $order_item->count = $cart_item->count;
                $order_item->pdt_snapshot = json_encode($cart_item->product);
                $order_item->save();
            }
        }

        //提交完了要删除购物车的数据
        CartItem::where('member_id', $member->id)->delete();
        //商品的名字
        $order->name = $name;
        //商品的价格
        $order->total_price = $total_price;
        //商品的id
        $order->order_no = 'E' . time() . '' . $order->id;

        // JSSDK 相关
        $access_token = WXTool::getAccessToken();
        $jsapi_ticket = WXTool::getJsApiTicket($access_token);
        $noncestr = WXTool::createNonceStr();
        $timestamp = time();
        $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        // 签名
        $signature = WXTool::signature($jsapi_ticket, $noncestr, $timestamp, $url);
        // 返回微信参数
        $bk_wx_js_config = new BKWXJsConfig;
        $bk_wx_js_config->appId = config('wx_config.APPID');
        $bk_wx_js_config->timestamp = $timestamp;
        $bk_wx_js_config->nonceStr = $noncestr;
        $bk_wx_js_config->signature = $signature;

        return view('order_commit')->with('cart_items', $cart_items_arr)
            ->with('total_price', $total_price)
            ->with('name', $name)
            ->with('order_no', $order->order_no)
            ->with('bk_wx_js_config', $bk_wx_js_config);
    }

    /**
     * 去订单列表的界面
     * @param Request $request
     * @return $this
     */
    public function toOrderList(Request $request)
    {
        $member = $request->session()->get('member', '');
        //在订单的列表查询属于我的订单
        $orders = Order::where('member_id', $member->id)->get();
        //开始遍历我的订单
        foreach ($orders as $order) {
            //查询我的各个订单
            $order_items = OrderItem::where('order_id', $order->id)->get();
            //订单的具体的内容条目
            $order->order_items = $order_items;
            foreach ($order_items as $order_item) {
                $order_item->product = json_encode($order_item->pdt_snapshot);
            }
        }
        return view('order_list')->with('orders', $orders);
    }
}
