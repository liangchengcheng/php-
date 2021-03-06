<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\M3Result;
use App\Entity\Member;

use App\Entity\TempEmail;
use App\Models\M3Email;
use App\Tool\UUID;
use Mail;

class MemberController extends Controller
{
    public function register(Request $request)
    {
        //用户的用户名(昵称)
        $nickname = $request->input('nicknme', '');
        //用户的邮箱可以不写
        $email = $request->input('email', '');
        //用户的手机号可以不写
        $phone = $request->input('phone', '');
        //用户的密码
        $n_password = $request->input('password', '');
        //再次输入
        $password = $request->input('n_password', '');
        //用户的短信验证码
        $phone_code = $request->input('phone_code', '');
        //邮箱的验证码
        $validate_code = $request->input('validate_code', '');

        //初始化状态类
        $m3_result = new M3Result;
        //判断手机和邮箱2选1
        if ($email == '' && $phone == '') {
            $m3_result->status = 1;
            $m3_result->message = '手机号或邮箱不能为空';
            return $m3_result->toJson();
        }
        //判断密码是否符合规则
        if ($password == '' || strlen($password) < 6) {
            $m3_result->status = 2;
            $m3_result->message = '密码不少于6位';
            return $m3_result->toJson();
        }
        //判断第二次输入的密码
        if ($n_password == '' || strlen($n_password) < 6) {
            $m3_result->status = 2;
            $m3_result->message = '密码不少于6位';
            return $m3_result->toJson();
        }
        //判断2次的密码是否一致
        if ($password != $n_password) {
            $m3_result->status = 4;
            $m3_result->message = '两次密码不相同';
            return $m3_result->toJson();
        }
        //判断用户名是否存在
        if ($nickname == '' ) {
            $m3_result->status = 3;
            $m3_result->message = '确认密码不少于6位';
            return $m3_result->toJson();
        }

        // 手机号注册
        if ($phone != '') {
            if ($phone_code == '' || strlen($phone_code) != 6) {
                $m3_result->status = 5;
                $m3_result->message = '手机验证码为6位';
                return $m3_result->toJson();
            }
            //数据库获取手机对应的短信验证码
            $tempPhone = TempPhone::where('phone', $phone)->first();
            if ($tempPhone->code == $phone_code) {
                if (time() > strtotime($tempPhone->deadline)) {
                    $m3_result->status = 7;
                    $m3_result->message = '手机验证码不正确';
                    return $m3_result->toJson();
                }

                $member = new Member;
                $member->phone = $phone;
                $member->password = md5('lcc' + $password);
                $member->save();

                $m3_result->status = 0;
                $m3_result->message = '注册成功';
                return $m3_result->toJson();
            } else {
                $m3_result->status = 7;
                $m3_result->message = '手机验证码不正确';
                return $m3_result->toJson();
            }

            // 邮箱注册
        } else {
            if ($validate_code == '' || strlen($validate_code) != 4) {
                $m3_result->status = 6;
                $m3_result->message = '验证码为4位';
                return $m3_result->toJson();
            }
            //这里应该去数据库查询
            $validate_code_session = $request->session()->get('validate_code', '');
            if ($validate_code_session != $validate_code) {
                $m3_result->status = 8;
                $m3_result->message = '验证码不正确';
                return $m3_result->toJson();
            }

            $member = new Member;
            $member->email = $email;
            $member->password = md5('lcc' + $password);
            $member->save();

            $uuid = UUID::create();

            $m3_email = new M3Email;
            $m3_email->to = $email;
            $m3_email->cc = 'magina@speakez.cn';
            $m3_email->subject = '凯恩书店验证';
            $m3_email->content = '请于24小时点击该链接完成验证. http://book.magina.com/service/validate_email'
                . '?member_id=' . $member->id
                . '&code=' . $uuid;

            $tempEmail = new TempEmail;
            $tempEmail->member_id = $member->id;
            $tempEmail->code = $uuid;
            $tempEmail->deadline = date('Y-m-d H-i-s', time() + 24 * 60 * 60);
            $tempEmail->save();

            Mail::send('email_register', ['m3_email' => $m3_email], function ($m) use ($m3_email) {
                // $m->from('hello@app.com', 'Your Application');
                $m->to($m3_email->to, '尊敬的用户')
                    ->cc($m3_email->cc)
                    ->subject($m3_email->subject);
            });

            $m3_result->status = 0;
            $m3_result->message = '注册成功';
            return $m3_result->toJson();
        }
    }

    //登录
    public function login(Request $request)
    {
        //获取数据
        $username = $request->get('username', '');
        $password = $request->get('password', '');
        $m3_result = new M3Result;

        //校验数据......+数据Token

        if (strpos($username, '@') == true) {
            $member = Member::where('email', $username)->first();
        } else {
            $member = Member::where('phone', $username)->first();
        }

        if ($member == null) {
            $m3_result->status = 2;
            $m3_result->message = '该用户不存在';
            return $m3_result->toJson();
        } else {
            if (md5('lcc' + $password) != md5('lcc' + $member->password)) {
                $m3_result->status = 3;
                $m3_result->message = "密码不正确";
                return $m3_result->toJson();
            }
        }
        //保存session
        $request->session()->put('member', $member);
        $m3_result->status = 0;
        $m3_result->message = "登录成功";
        return $m3_result->toJson();

    }
}
