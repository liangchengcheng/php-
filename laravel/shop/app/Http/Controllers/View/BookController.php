<?php

namespace App\Http\Controllers\View;

use App\Category;
use App\Entity\PdtContent;
use App\Entity\PdtImages;
use App\Entity\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{

  //进去书籍类别的界面
  public function toCategory($value='')
  {
    //去数据库查询对应的id
    $categorys=Category::whereNull('parent_id')->get();
    //并且将查询到的数据传递过去
    return view('category')->with('category',$categorys);
  }

  //去产品对应的界面比如进入node js界面
  public function toProduct($category_id){
    $products=Product::where('category_id',$category_id)->get();
    return view('product')->with('products',$products);
  }

  //进入产品的内容介绍界面
  public function toPdtContent(Request $request,$product_id){

    $product=Product::find($product_id);

    //获取单个数据first();
    $pdt_content=PdtContent::where('product_id',$product_id)->first();

    //get()获取product_id的所有的数据
    $pdt_images=PdtImages::where('product_id',$product_id)-get();

    //如果是获取指定列的数据，则需要加上select条件：
    //$users = DB::table('users')->select('name','email')->get();

    //获取单列的值 比如name列的
    //$users = DB::table('users')->lists('name');


    $count=0;
    //判断session是否存在
    $member=$request->session()->get('member','');
    if($member!=''){

    }
  }


  public function toRegister($value='')
  {
    return view('register');
  }
}
