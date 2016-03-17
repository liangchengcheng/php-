<?php

namespace App\Http\Controllers\Service;

use App\Category;
use App\Http\Controllers\Controller;

use App\Models\M3Result;
use Illuminate\Http\Request;
use Mail;

class BookController extends Controller
{
  public function getCategoryByParentId($parent_id)
  {
    //获取parent_id为此的类别
    $category=Category::where('parent_id',$parent_id)->get();

    $m3_result=new M3Result;
    $m3_result->status=0;
    $m3_result->message='返回成功';
    $m3_result->categorys=$category;

    return $m3_result->toJson();
  }
}
