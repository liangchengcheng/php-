<?php
namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\people;
use yii\data\Pagination;
class JikeController extends Controller{

    public function actionPeople(){
        //$query = People::find();
        $query = new People();
        $query = $query->find();
        $pagination = new Pagination([
            'defaultPageSize'=>2,
            'totalCount'=>$query->count(),
        ]);

        $people = $query->orderBy('id')->offset($pagination->offset)->limit($pagination->limit)->all();
        return $this->render('people',[
            'people'=>$people,
            'pagination'=>$pagination,
        ]);
    }
}