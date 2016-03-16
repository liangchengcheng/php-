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

class OrderController extends Controller
{
    public function toOrderCommit(Request $request)
    {
        $product_ids = $request->input('products', '');

        //判断是否为空不是空的话直接拆分
        $product_ids_arr = ($product_ids != '' ? explode(',', $product_ids) : array());
        //在session里面获取member
        $member = $request->session()->get('member', '');
        $cart_items = CartItem::where('member_id', $member->id)->whereIn('product_id', $product_ids_arr)->get();
        $order=new Order
    }
}
