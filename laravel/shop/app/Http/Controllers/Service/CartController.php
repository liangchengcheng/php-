<?php

namespace App\Http\Controllers\Service;

use App\Entity\CartItem;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\M3Result;
use App\Entity\Member;
use App\Entity\TempPhone;
use App\Entity\TempEmail;
use App\Models\M3Email;
use App\Tool\UUID;
use Mail;

class CartController extends Controller
{
    public function addCart(Request $request, $product_id)
    {
        $m3_result = new M3Result();
        $m3_result->status = 0;
        $m3_result->message = '添加成功';

        //判断用户登录了么
        $member = $request->session()->get('mmber', '');
        if ($member != '') {
            //获取所有的购物车的东西
            $cart_items = CartItem::where('member_id', $member->id)->get();
            //默认是不存在的
            $exist = false;
            foreach ($cart_items as $cart_item) {
                //开始循环
                if ($cart_item->product_id == $product_id) {
                    //在的话就加1
                    $cart_item->count++;
                    $cart_item->save();
                    $exist = true;
                    break;
                }
            }
            if ($exist == false) {
                //不存在的话就新建一个购物车的物件
                $cart_item = new CartItem;
                $cart_item->product_id = $product_id;
                $cart_item->count = 1;
                $cart_item->member_id = $member->id;
                $cart_item->save();
            }
            return $m3_result->toJson();
        }
        //还要去修改本地的cookie里面存放的购物车的数量
        $bk_cart = $request->cookie('bk_cart');
        $bk_cart_arr = ($bk_cart != null ? explode(',', $bk_cart) : array());

        $count = 1;
        foreach ($bk_cart_arr as $value) {
            //查找:的索引
            $index = strpos($value, ":");
            //判断是否有id
            if (substr($value, 0, $index) == $product_id) {
                //获取id后面的数量
                $count = ((int)substr($value, $index + 1)) + 1;
                $value = $product_id . ':' . $count;
                break;
            }
        }

        if ($count == 1) {
            array_push($bk_cart_arr, $product_id . ":" . $count);
        }

        return response($m3_result->toJson())->withCookie('bk_cart', implode(',', $bk_cart_arr));
    }

    /**
     * 删除购物车
     * @param Request $request
     * @return string
     */
    public function deleteCart(Request $request)
    {
        $m3_result = new M3Result;
        $m3_result->status = 0;
        $m3_result->message = '删除成功';

        $product_ids = $request->input('product_ids', '');
        if ($product_ids == '') {
            $m3_result->status = 1;
            $m3_result->message = '书籍的id不能是空的';
            return $m3_result->toJson();
        }

        $product_ids_arr = explode(',', $product_ids);
        $member = $request->session()->get('member', '');
        if ($member != '') {
            //登录了就删除了吧
            CartItem::whereIn('product_id', $product_ids_arr)->delete();
            return $m3_result->toJson();
        }

        $product_ids = $request->input('product_ids', '');
        if($product_ids == '') {
            $m3_result->status = 1;
            $m3_result->message = '书籍ID为空';
            return $m3_result->toJson();
        }

        // 未登录
        $bk_cart = $request->cookie('bk_cart');
        $bk_cart_arr = ($bk_cart!=null ? explode(',', $bk_cart) : array());
        foreach ($bk_cart_arr as $key => $value) {
            $index = strpos($value, ':');
            $product_id = substr($value, 0, $index);
            // 存在, 删除
            if(in_array($product_id, $product_ids_arr)) {
                array_splice($bk_cart_arr, $key, 1);
                continue;
            }
        }

        return response($m3_result->toJson())->withCookie('bk_cart', implode(',', $bk_cart_arr));
    }
}
