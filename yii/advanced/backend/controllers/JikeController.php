<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\people;
use yii\data\Pagination;
use yii\web\Cookie;

class JikeController extends Controller
{

    public function actionPeople()
    {
        //$query = People::find();
        $query = new People();
        $query = $query->find();
        $pagination = new Pagination([
            'defaultPageSize' => 2,
            'totalCount' => $query->count(),
        ]);

        //$request = Yii::$app->request;
        // 返回所有参数
        //$params = $request->bodyParams;
        // 返回参数 "id"
        //$param = $request->getBodyParam('id');


        $people = $query->orderBy('id')->offset($pagination->offset)->limit($pagination->limit)->all();

        return $this->render('people', [
            'people' => $people,
            'pagination' => $pagination,
        ]);
    }

    /**
     * 进行基本的表单处理
     * @return string
     */
    public function actionEntry()
    {
        $model = new People;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // 验证 $model 收到的数据

            // 做些有意义的事 ...

            return $this->render('people', ['model' => $model]);
        } else {
            // 无论是初始化显示还是数据验证错误
            return $this->render('entry', ['model' => $model]);
        }
    }

    /**
     * 基本的sql操作
     */
    public function sqlTest()
    {
        //使用 Country 类可以很容易地操作 country 表数据，就像这段代码：
        // 获取 country 表的所有行并以 name 排序
        $countries = People::find()->orderBy('name')->all();

        // 获取主键为 “US” 的行
        $country = People::findOne('US');

        // 输出 “United States”
        echo $country->name;

        // 修改 name 为 “U.S.A.” 并在数据库中保存更改
        $country->name = 'U.S.A.';
        $country->save();
    }

    /**
     * url和他的参数
     */
    public function requesttion()
    {

//        假设被请求的URL是 http://example.com/admin/index.php/product?id=100， 你可以像下面描述的那样获取URL的各个部分：

//        yii\web\Request::url：返回 /admin/index.php/product?id=100, 此URL不包括host info部分。
//        yii\web\Request::absoluteUrl：返回 http://example.com/admin/index.php/product?id=100, 包含host infode的整个URL。
//        yii\web\Request::hostInfo：返回 http://example.com, 只有host info部分。
//        yii\web\Request::pathInfo：返回 /product， 这个是入口脚本之后，问号之前（查询字符串）的部分。
//        yii\web\Request::queryString：返回 id=100,问号之后的部分。
//        yii\web\Request::baseUrl：返回 /admin, host info之后， 入口脚本之前的部分。
//        yii\web\Request::scriptUrl：返回 /admin/index.php, 没有path info和查询字符串部分。
//        yii\web\Request::serverName：返回 example.com, URL中的host name。
//        yii\web\Request::serverPort：返回 80, 这是web服务中使用的端口。

        $data=array();
        $data['view_hello-str']='nihao';
        //携带数据过去
        return $this->renderPartial('index',$data);
    }

    /**
     * 获取头部信息
     */
    public function getheader()
    {

        // $headers 是一个 yii\web\HeaderCollection 对象
        //$headers = Yii::$app->request->headers;

        // 返回 Accept header 值
        //$accept = $headers->get('Accept');

        //if ($headers->has('User-Agent')) { /* 这是一个 User-Agent 头 */ }
    }

    public function responsejson()
    {
        //Yii::$app->response->content = 'hello world!';
        //如果在发送给终端用户之前需要格式化，应设置 yii\web\Response::format 和 yii\web\Response::data 属性，yii\web\Response::format 属性指定yii\web\Response::data中数据格式化后的样式，例如：

        //$response = Yii::$app->response;
        //$response->format = \yii\web\Response::FORMAT_JSON;
        //$response->data = ['message' => 'hello world'];

        //Yii支持以下可直接使用的格式，每个实现了yii\web\ResponseFormatterInterface 类， 可自定义这些格式器或通过配置yii\web\Response::formatters 属性来增加格式器。

        //yii\web\Response::FORMAT_HTML: 通过 yii\web\HtmlResponseFormatter 来实现.
        //yii\web\Response::FORMAT_XML: 通过 yii\web\XmlResponseFormatter来实现.
        //yii\web\Response::FORMAT_JSON: 通过 yii\web\JsonResponseFormatter来实现.
        //yii\web\Response::FORMAT_JSONP: 通过 yii\web\JsonResponseFormatter来实现.
    }

    /**
     * 发送文件
     */
    public function sendfile()
    {

        //和浏览器跳转类似，文件发送是另一个依赖指定HTTP头的功能，Yii提供方法集合来支持各种文件发送需求，它们对HTTP头都有内置的支持。

        //yii\web\Response::sendFile(): 发送一个已存在的文件到客户端
        //yii\web\Response::sendContentAsFile(): 发送一个文本字符串作为文件到客户端
        //yii\web\Response::sendStreamAsFile(): 发送一个已存在的文件流作为文件到客户端
        //这些方法都将响应对象作为返回值，如果要发送的文件非常大，应考虑使用 yii\web\Response::sendStreamAsFile() 因为它更节约内存，以下示例显示在控制器操作中如何发送文件：

        //public function actionDownload()
        //        {
        //            return \Yii::$app->response->sendFile('path/to/file.txt');
        //       }
        //如果不是在操作方法中调用文件发送方法，在后面还应调用 yii\web\Response::send() 没有其他内容追加到响应中。

        //\Yii::$app->response->sendFile('path/to/file.txt')->send();
    }

    /**
     * session
     */
    public function ccokies()
    {
        $session = Yii::$app->session;

        // 检查session是否开启
        if ($session->isActive) {

        }

        // 开启session
        $session->open();

        // 关闭session
        $session->close();

        // 销毁session中所有已注册的数据
        $session->destroy();
    }

    public function sessions()
    {
        //$session = Yii::$app->session;

        // 获取session中的变量值，以下用法是相同的：
        //$language = $session->get('language');
        //$language = $session['language'];
        //$language = isset($_SESSION['language']) ? $_SESSION['language'] : null;

        // 设置一个session变量，以下用法是相同的：
        //$session->set('language', 'en-US');
        //$session['language'] = 'en-US';
        //$_SESSION['language'] = 'en-US';

        // 删除一个session变量，以下用法是相同的：
        //$session->remove('language');
        //unset($session['language']);
        //unset($_SESSION['language']);

        // 检查session变量是否已存在，以下用法是相同的：
        //if ($session->has('language')) ...
        //if (isset($session['language'])) ...
        //if (isset($_SESSION['language'])) ...

        // 遍历所有session变量，以下用法是相同的：
        //foreach ($session as $name => $value) ...
        //foreach ($_SESSION as $name => $value) ...

        //修改值
        $session = Yii::$app->session;

        // 如下代码不会生效
        $session['captcha']['number'] = 5;
        $session['captcha']['lifetime'] = 3600;

        // 如下代码会生效：
        $session['captcha'] = [
            'number' => 5,
            'lifetime' => 3600,
        ];

        // 如下代码也会生效：
        echo $session['captcha']['lifetime'];

        //判断session是否开启
        $session->open();
        if($session->isActive){
            echo 'session is active';
        }
    }

    public function cookieandsession()
    {
/*                读取 Cookies

        当前请求的cookie信息可通过如下代码获取：

        // 从 "request"组件中获取cookie集合(yii\web\CookieCollection)
        $cookies = Yii::$app->request->cookies;

        // 获取名为 "language" cookie 的值，如果不存在，返回默认值"en"
        $language = $cookies->getValue('language', 'en');

        // 另一种方式获取名为 "language" cookie 的值
        if (($cookie = $cookies->get('language')) !== null) {
            $language = $cookie->value;
        }

        // 可将 $cookies当作数组使用
        if (isset($cookies['language'])) {
            $language = $cookies['language']->value;
        }

        // 判断是否存在名为"language" 的 cookie
        if ($cookies->has('language')) ...
        if (isset($cookies['language'])) ...
        发送 Cookies

        You can send cookies to end users using the following code: 可使用如下代码发送cookie到终端用户：

        // 从"response"组件中获取cookie 集合(yii\web\CookieCollection)
        $cookies = Yii::$app->response->cookies;

        // 在要发送的响应中添加一个新的cookie
        $cookies->add(new \yii\web\Cookie([
            'name' => 'language',
            'value' => 'zh-CN',
        ]));

        // 删除一个cookie
        $cookies->remove('language');
        // 等同于以下删除代码
        unset($cookies['language']);*/

        //创建cookie
        $cookie=\Yii::$app->response->cookies;

        $cookie_data=array('name'=>'user','value'=>'z3');
        $cookie->add(new Cookie($cookie_data));

    }
}