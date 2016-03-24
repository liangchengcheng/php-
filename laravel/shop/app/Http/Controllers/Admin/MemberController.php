<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Entity\Member;
use App\Models\M3Result;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class MemberController extends BaseController
{
    /**
     * 去会员列表
     * @param Request $request
     */
    public function toMember(Request $request){

        //获取所有的会员
        $member=Member::all();
        return view('admin.member')->with('member',$member);
    }

    /**
     * 去会员的编辑的列表
     * @param Request $request
     * @return $this
     */
    public function toMemberEdit(Request $request){

        //根据传入的会员的id
        $id=$request->input('id','');
        $member=Member::find($id);
        return view('admin.member_edit')->with('member',$member);
    }

    /**
     * 获取表单提交的值并且保存在数据库
     * @param Request $request
     * @return string
     */
    public function memberEdit(Request $request){
        //去数据库找到这个会员
        $member=Member::find($request->input('id',''));

        $member->nickname=$request->input('nickname','');
        $member->phone=$request->input('phone','');
        $member->email=$request->input('email','');
        $member->save();

        $m3_result=new M3Result();
        $m3_result->status=0;
        $m3_result->message="添加成功";

        return $m3_result->toJson();
    }

}
