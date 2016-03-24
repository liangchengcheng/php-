<?php

namespace App\Http\Controllers;

use App\Entity\Category;
use App\Http\Requests\Request;
use App\Models\M3Result;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CategoryController extends BaseController
{
    public function toCategory()
    {
        //获取所有的种类
        $categories = Category::all();
        foreach ($categories as $category) {
            if ($category->parent_id != null && $category->parent_id != '') {
                $category->parent = Category::find($category->parent_id);
            }
        }

        return view('admin.category')->with('categories', $categories);
    }

    public function toCategoryAdd()
    {
        $categories = Category::whereNull('parent_id')->get();
        return view('admin/category_add')->with('categories', $categories);
    }

    public function toCategoryEdit(Request $request)
    {
        $id = $request->input('id', '');
        $category = Category::find($id);
        $categories = Category::whereNull('parent_id')->get();

        return view('admin/category+edit')->with('category', $category)
            ->with('categories', $categories);
    }

    /**
     * ==============================对应的服务==================================
     */

    /**
     * 添加类别
     * @param Request $request
     */
    public function  categoryAdd(Request $request)
    {
        $name = $request->input('name', '');
        $category_no = $request->input('category_no', '');
        $parent_id = $request->input('parent_id', '');
        $preview = $request->input('preview', '');

        $category = new Category();
        $category->name = $name;
        $category->category_no = $category_no;
        $category->preview = $preview;

        if ($parent_id != '') {
            $category->parent_id = $parent_id;
        }
        $category->save();

        $m3_result = new M3Result();
        $m3_result->status = 0;
        $m3_result->message = '添加成功';
    }

    /**
     * 删除类别
     * @param Request $request
     * @return string
     */
    public function categoryDel(Request $request)
    {
        $id = $request->input('id', '');
        Category::find($id)->delete();

        $m3_result = new M3Result();
        $m3_result->status = 0;
        $m3_result->message = '删除成功';

        return $m3_result->toJson();
    }

    public function categoryEdit(Request $request)
    {
        $id = $request->input('id', '');
        $category = Category::find($id);

        //获取表单提交的元素
        $name = $request->input('name', '');
        $category_no = $request->input('category_no', '');
        $parent_id = $request->input('parent_id', '');
        $preview = $request->input('preview', '');

        $category->name = $name;
        $category->category_no = $category_no;
        if ($parent_id != '') {
            $category->parent_id = $parent_id;
        }
        $category->preview = $preview;
        $category->save();

        $m3_result = new M3Result();
        $m3_result->status = 0;
        $m3_result->message = '添加成功';

        return $m3_result->toJson();
    }

}
