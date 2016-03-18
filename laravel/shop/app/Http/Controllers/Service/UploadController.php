<?php

namespace App\Http\Controllers\Service;

use App\Category;
use App\Http\Controllers\Controller;

use App\Models\M3Result;
use App\Tool\UUID;
use Illuminate\Http\Request;
use Mail;

class UploadController extends Controller
{
    /**
     * 上传文件
     * @param Request $request
     * @param $type
     * @return string
     */
    public function uploadFile(Request $request, $type)
    {
        $width = $request->input('width', '');
        $height = $request->input('height', '');
        $m3_result = new M3Result();

        if ($_FILES["file"]["error"]) {
            $m3_result->status = 2;
            $m3_result->message = "未知错误, 错误码: " . $_FILES["file"]["error"];
            return $m3_result->toJson();
        }

        $file_size = $_FILES['file']['size'];
        if ($file_size > 1024 * 1024) {
            $m3_result->status = 2;
            $m3_result->message = "请不要上传图片大小超过1M";
            return $m3_result->toJson();
        }
        $public_dir = sprintf('/upload/%s/%s/', $type, date('Ymd'));
        $upload_dir = public_path() . $public_dir;
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        //获取文件的拓展名
        $arr_ext = explode('.', $_FILES['file']['name']);
        //end输出数组中的当前元素和最后一个元素的值
        $file_ext = count($arr_ext) > 1 && strlen(end($arr_ext)) ? end($arr_ext) : "unknow";
        //合成上传文件的名字
        $upload_filename = UUID::create();
        $upload_file_path = $upload_dir . $upload_filename . '.' . $file_ext;
        if (strlen($width) > 0) {
            $public_uri = $upload_dir . $upload_filename . '.' . $file_ext;
            $m3_result->status = 0;
            $m3_result->message = "上传成功";
            $m3_result->uri = $public_uri;
        } else {
            //从临时目录长传到目录
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $upload_file_path)) {
                $public_uri = $public_dir . $upload_filename . '.' . $file_ext;
                $m3_result->status = 0;
                $m3_result->message = "上传成功";
                $m3_result->uri = $public_uri;
            } else {
                $m3_result->status = 1;
                $m3_result->message = "上传失败,权限不足";
            }
        }
        return $m3_result->toJson();
    }
}
