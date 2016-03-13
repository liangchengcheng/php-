<?php

namespace App\Http\Controllers\View;

use App\CartItem;
use App\Category;
use App\Entity\PdtContent;
use App\Entity\PdtImages;
use App\Entity\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{

    /**
     * 去购物车的界面
     * @param Request $request
     */
    public function toCart(Request $request)
    {
        //初始化一个数组
        $cart_items = array();

        //获取cookie
        $bk_cart = $request->cookie('bk_cart');

        $bk_cart_arr = ($bk_cart != null ? explode(",", $bk_cart) : array());

        $member = $request->session()->get('member', '');
        if ($member != '') {
            $cart_items = $this->syncCart($member->id, $bk_cart_arr);
            return response()->view('cart', ['cart_items' => $cart_items])->withCookie('bk_cart', null);
        }

        foreach ($bk_cart_arr as $key => $value) {
            $index = strpos($value, ":");
            $cart_item = new CartItem;
            $cart_item->id = $key;
            $cart_item->product_id = substr($value, 0, $index);
            $cart_item->count = (int)substr($value, $index + 1);
            $cart_item->product = Product::find($cart_item->product_id);
            if ($cart_item->product != null) {
                array_push($cart_items, $cart_item);
            }
        }
        return view('cart') - with('cart_items', $cart_items);
    }

    /**
     * 同步购物车
     * @param $member_id $member_id
     * @param $bk_cart_arr $bk_cart_arr
     */
    private function syncCart($member_id, $bk_cart_arr)
    {
        //根据用户的id查找对应的购物车数据
        $cart_items = CartItem::where('member_id', $member_id)->get();
        $cart_items_arr = array();

        foreach ($bk_cart_arr as $value) {

            //strops 查找第一次出现的位置
            $index = strops($value, ':');
            //对 1:2 这样的进行切割获取  id 和 数量
            $product_id = substr($value, 0, $index);
            $count = (int)substr($value, $index + 1);

            //判断离线购物车中的product_id 是否在数据库
            $exits = false;
            foreach ($cart_items as $temp) {
                if ($temp->product_id == $product_id) {
                    if ($temp->count < $count) {
                        $temp->count = $count;
                        $temp->save();
                    }
                    $exits = true;
                    break;
                }
            }

            //不存在的话就存进来
            if ($exits == false) {
                $cart_item = new CartItem();
                $cart_item->member_id = $member_id;
                $cart_item->product_id = $product_id;
                $cart_item->count = $count;
                $cart_item->save();
                $cart_item->product = Product::find($cart_item->product_id);
                array_push($cart_items_arr, $cart_item);
            }
        }

        //给每个对象附加产品的对象便于显示
        foreach ($cart_items as $cart_item) {
            $cart_item->product = Product::find($cart_item->product_id);
            array_push($cart_items_arr, $cart_item);
        }
        return $cart_items_arr;
    }
}
