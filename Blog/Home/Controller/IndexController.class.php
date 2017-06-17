<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
class IndexController extends Controller {
    //初始页面
    public function index(){
        if(!$_SESSION['user']){
            $this->assign('logpage',"http://localhost/pBlog/Index.php/Home/Index/login");
            $this->assign('log',"登录");
            $this->assign('or','OR');
            $this->assign('regpage',"http://localhost/pBlog/Index.php/Home/Index/register");
            $this->assign('reg',"注册");
            $this->display();
        }else{
            $name = $_SESSION['user'];
            $href = "personal?=$name";
            $this->assign('logpage',$href);
            $this->assign('log',$_SESSION['user']);
            $this->assign('or',' ,');
            $this->assign('regpage',"logout");
            $this->assign('reg',"注销");
            $this->display();
        }

    }

    //登录function
    public function login(){
        $this->display('login:login');
    }

    //登录结果返回
    public function loginRes(){
        $user = new Model('User');

        $email = I('email');
        $psw = I('password');
        $psw = md5($psw);
        echo $psw;

        $condition['email'] = $email;
        $condition['password'] = $psw;

        $result = $user->where($condition)->select();
        if($result){
            $name = $user->where($condition)->getField('name');
            $_SESSION['user'] = $name;
            $this->redirect('Index');
        }else{
            $this->error("用户名或者密码错误！");
            history.go(-1);
        }
    }

    //注册页面
    public function register(){
        $this->display('register:register');
    }

    //注册结果返回
    public function registerRes()
    {
        $user = new Model('User');

        $data['email'] = I('email');
        $data['password'] = I('password');
        $data['password'] = md5($data['password']);
        $data['name'] = I('user');
        $data['date'] = date("Y-m-d H:i:s");
        $condition['email'] = $data['email'];
        $con['name'] = $data['name'];
        $result = $user->where($condition)->select();
        $res = $user->where($con)->select();
        if($result&&$res){
            $this->error("该邮箱和用户名都已经被使用！");
            history.go(-1);
        }
        else if($result&&!$res){
            $this->error("该用户名已经被使用！");
            history.go(-1);
        }
        else if(!$result&&$res){
            $this->error("该邮箱已经被使用！");
            history.go(-1);
        }
        else{
            $user->add($data);
           $this->success("注册成功！",'1',U('Index/login'));
        }
    }

    //注销
    public function logout(){
        session('user',null);
        $this->redirect('Index');

    }
    public function logoutAbout(){
        session('user',null);
        $this->redirect('Index/about');

    }
    public function logoutHer(){
        session('user',null);
        $this->redirect('Index/her');

    }
    public function logoutComment(){
        session('user',null);
        $this->redirect('Index/guestbook');

    }


    //About页面
    public function about(){
        if(!$_SESSION['user']){
            $this->assign('logpage',"http://localhost/pBlog/Index.php/Home/Index/login");
            $this->assign('log',"登录");
            $this->assign('or','OR');
            $this->assign('regpage',"http://localhost/pBlog/Index.php/Home/Index/register");
            $this->assign('reg',"注册");
            $this->display('about:about');
        }else {
            $name = $_SESSION['user'];
            $href = "personal?=$name";
            $this->assign('logpage', $href);
            $this->assign('log', $_SESSION['user']);
            $this->assign('or', ' ,');
            $this->assign('regpage', "logoutAbout");
            $this->assign('reg', "注销");
            $this->display('about:about');
        }
    }

    //Home her页面
    public function her(){
        if(!$_SESSION['user']){
            $this->assign('logpage',"http://localhost/pBlog/Index.php/Home/Index/login");
            $this->assign('log',"登录");
            $this->assign('or','OR');
            $this->assign('regpage',"http://localhost/pBlog/Index.php/Home/Index/register");
            $this->assign('reg',"注册");
            $this->display('her:her');
        }else {
            $name = $_SESSION['user'];
            $href = "personal?=$name";
            $this->assign('logpage', $href);
            $this->assign('log', $_SESSION['user']);
            $this->assign('or', ' ,');
            $this->assign('regpage', "logouther");
            $this->assign('reg', "注销");
            $this->display('her:her');
        }
    }

    //留言板页面
    public function guestbook(){
        if(!$_SESSION['user']){
            //分页技术
            import('ORG.Util.Page');// 导入分页类
            $this->assign('logpage',"http://localhost/pBlog/Index.php/Home/Index/login");
            $this->assign('log',"登录");
            $this->assign('or','OR');
            $this->assign('regpage',"http://localhost/pBlog/Index.php/Home/Index/register");
            $this->assign('reg',"注册");
            $liuyan = new Model('liuyan');
            $count  = $liuyan->count();// 查询满足要求的总记录数
            $page = new \Think\Page($count,10);
            $page->rollPage=5;
            $page->setConfig('header','首页');
            $page->setConfig('prev','上一页');
            $page->setConfig('next','下一页');
            $page->setConfig('theme',"<ul class='pagination'><li>共%TOTAL_PAGE%页</li><li>%UP_PAGE%</li><li>%FIRST%</li><li>%LINK_PAGE%</li><li id='end'>%END%</li><li>%DOWN_PAGE%</li><li>共%TOTAL_ROW%记录</li></ul>");
           // $page->setConfig('theme',"<ul class='pagination' style='list-style:none;'><li style='float:left'>共%TOTAL_PAGE%页</li><li>%UP_PAGE%</li><li>%FIRST%</li><li>%LINK_PAGE%</li><li>%END%</li><li>%DOWN_PAGE%</li><li>共%TOTAL_ROW%记录</li></ul>");
            $show = $page->show();// 分页显示输出
            $this->assign('page',$show);// 赋值分页输出
            $list  = $liuyan->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
            for($i=0;$i<count($list);$i++){
                $str = null;
                $str1 = explode(']',$list[$i]['content']);
                for($index=0;$index<count($str1);$index++)
                {
                    $str2 = explode('[',$str1[$index]);
                    if(strlen($str2[1]) != 0){
                        $str2[1] = "<img style='float:left' src='http://localhost/pBlog/Public/images/guestbook/face/$str2[1].gif'/>";
                        if(strlen($str2[0]) != 0){
                            $str2[0] = "<sapn style='float:left'>$str2[0]</sapn>";
                        }
                    }else{
                        $str2[1] = "<br/>";
                    }
                    if(strlen($str2[0]) == 0){
                        $str1[$index] = $str2[1];
                    }else{
                        $str1[$index] = $str2[0].$str2[1];
                    }
                    $str = $str.$str1[$index];
                }
                $list[$i]['content'] = $str;
            }

            $this->assign('list',$list);// 赋值数据集;
            $this->display('guestbook:guestbook');
        }else
            {
            $name = $_SESSION['user'];
            $href = "personal?=$name";
            $this->assign('logpage', $href);
            $this->assign('log', $_SESSION['user']);
            $this->assign('or', ' ,');
            $this->assign('regpage', "logoutComment");
            $this->assign('reg', "注销");

            $liuyan = new Model('liuyan');
            $count  = $liuyan->count();// 查询满足要求的总记录数
            $page = new \Think\Page($count,10);
            $page->rollPage=5;
            $page->setConfig('header','首页');
            $page->setConfig('prev','上一页');
            $page->setConfig('next','下一页');
            $page->setConfig('theme',"<ul class='pagination'><li>共%TOTAL_PAGE%页</li><li>%UP_PAGE%</li><li>%FIRST%</li><li>%LINK_PAGE%</li><li id='end'>%END%</li><li>%DOWN_PAGE%</li><li>共%TOTAL_ROW%记录</li></ul>");
            // $page->setConfig('theme',"<ul class='pagination' style='list-style:none;'><li style='float:left'>共%TOTAL_PAGE%页</li><li>%UP_PAGE%</li><li>%FIRST%</li><li>%LINK_PAGE%</li><li>%END%</li><li>%DOWN_PAGE%</li><li>共%TOTAL_ROW%记录</li></ul>");
            $show = $page->show();// 分页显示输出
            $this->assign('page',$show);// 赋值分页输出
            $list  = $liuyan->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
                for($i=0;$i<count($list);$i++){
                    $str = null;
                    $str1 = explode(']',$list[$i]['content']);
                    for($index=0;$index<count($str1);$index++)
                    {
                        $str2 = explode('[',$str1[$index]);
                        if(strlen($str2[1]) != 0){
                            $str2[1] = "<img style='float:left' src='http://localhost/pBlog/Public/images/guestbook/face/$str2[1].gif'/>";
                            if(strlen($str2[0]) != 0){
                                $str2[0] = "<span style='float:left'>$str2[0]</span>";
                            }
                        }
                        if(strlen($str2[0]) == 0){
                            $str1[$index] = $str2[1];
                        }else{
                            $str1[$index] = $str2[0].$str2[1];
                        }
                        $str = $str.$str1[$index];
                    }
                    $list[$i]['content'] = $str;
                }
            //$this->replaceStr($liuyan['content']);
            $this->assign('list',$list);// 赋值数据集;
            $this->display('guestbook:guestbook');
        }
    }


    //点赞function
    public function zan(){
        $data['id']=isset($_POST['id'])?intval(trim($_POST['id'])):0;
        $liuyan = new Model("liuyan");

        if(!isset($_COOKIE[$_POST['id']+10000])&&$liuyan->where($data)->setInc('zan')){
            $cookiename = $_POST['id']+10000;
            setcookie($cookiename,40,time()+60,'/');

            $data['info'] = "ok";
            $data['status'] = 1;
            $this->ajaxReturn($data);

            exit();
        }else{
            $data['info'] = "fail";
            $data['status'] = 0;
            $this->ajaxReturn($data);
            exit();
        }
    }

    //留言function
    public function comment(){
        if (!$_SESSION['user']) {
            //分页技术
            $this->redirect('Index/login');
        }else{
            $comment = new Model('liuyan');
            $content = I('content');
            $data['content'] = $content;
            $data['user'] = $_SESSION['user'];
            $ip = $this->getIPaddress();
            dump($ip);
            $address = $this->taobaoIP($ip);
            dump($address);
            $data['address'] = $address;
            $data['time'] = date("Y-m-d H:i:s");
            if(!$data['content']){
                $this->error("留言不能为空！");
                history.go(-1);
            }else{
                $comment->add($data);
                $this->redirect('Index/guestbook');
            }
        }
    }

    //获取ip
    function getIPaddress(){
        $IPaddress='';
        if (isset($_SERVER)){
            if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
                $IPaddress = $_SERVER["HTTP_X_FORWARDED_FOR"];
            } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
                $IPaddress = $_SERVER["HTTP_CLIENT_IP"];
            } else {
                $IPaddress = $_SERVER["REMOTE_ADDR"];
            }
        } else {
            if (getenv("HTTP_X_FORWARDED_FOR")){
                $IPaddress = getenv("HTTP_X_FORWARDED_FOR");
            } else if (getenv("HTTP_CLIENT_IP")) {
                $IPaddress = getenv("HTTP_CLIENT_IP");
            } else {
                $IPaddress = getenv("REMOTE_ADDR");
            }
        }
        return $IPaddress;
    }

    //获取城市
    public function taobaoIP($clientIP){
        $taobaoIP = 'http://ip.taobao.com/service/getIpInfo.php?ip='.$clientIP;
        $IPinfo = json_decode(file_get_contents($taobaoIP));
        $province = $IPinfo->data->region;
        $city = $IPinfo->data->city;
        $data = $province.$city;
        return $data;
    }

    //音影推荐
    public function enjoy(){
        $this->display('enjoy:enjoy');
    }

    //嗨青春啊
    public function friends(){
        $this->display('friends:friends');
    }

    //share
    public function share(){
        $this->display('share:share');
    }
}