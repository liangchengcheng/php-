<?php

namespace App\Http\Controllers;

use App\Entity;
use App\Models\M3Result;
use App\Entity\Order;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class OrderController extends BaseController
{

    /**
     * 去订单列表的界面
     * @param Request $request
     * @return $this
     */
    public function toOrder(Request $request)
    {
        $order = Order::all();
        return view('admin.order')->with('orders', $order);
    }

    /**
     * 去单个数据
     * @param Request $request
     * @return $this
     */
    public function toOrderEdit(Request $request)
    {
        $order = Order::find($request->input('id', ''));
        return view('admin.order_edit')->with('order', $order);
    }

    /**
     * 编辑保存单个数据
     * @param Request $request
     * @return string
     */
    public function orderEdit(Request $request)
    {
        $order = Order::find($request->input('id', ''));
        $order->status = $request->input('status', 1);
        $order->save();

        $m3_result = new M3Result();
        $m3_result->status = 0;
        $m3_result->message = "修改成功";

        return $m3_result->toJson();
    }
}
