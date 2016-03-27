<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\M3Result;
use App\Entity\Member;
use App\Entity\TempPhone;
use App\Entity\TempEmail;
use App\Models\M3Email;
use App\Tool\UUID;
use App\Entity\Question;
use Mail;

class QuestionController extends Controller
{
    public function getAllQuestion(Request $request)
    {
        $m3_result = new M3Result;
        $question = Question::paginate(1);
        if($question!=''){
            return response($question->toJson());
        }
        $m3_result->status = 1;
        $m3_result->message = "数据为空";
        return $m3_result->toJson();
    }
}
