<?php
class LoginController extends Controller {

    public function login(){

        $this->display('login.html');
    }

    //检测是否登录成功
    public function loginCheck(){
        //首先检测验证码是否正确
        if(strtoupper($_POST['yzm']) != strtoupper($_SESSION['code'])){
            $this->error('验证码错误');
        }
        //实例化login模型
        $login = Factory::M('Login');
        $result = $login->check();
        if($result){
            //记录session，并跳转到后台首页
            $_SESSION['admin'] = 'admin';
            $this->success('登录成功', '?m=Admin&c=Index&a=index');
        }else{
            $this->error('登录失败');
        }
    }

    //生成验证码图片的方法
    public function yzm(){
        Verify::code();
    }
}
?>














