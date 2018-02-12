<?php
class LoginController extends Controller {
    /**
     * 登录页
     */
    public function login(){

        $this->display('_login.html');
    }

    /***
     * 登录页检测
     */
    public function loginCheck(){
        //首先检测验证码是否正确
        if(strtoupper($_POST['yzm']) != strtoupper($_SESSION['code'])){
            $this->error('验证码错误');
        }
        //实例化login模型
        $login = Factory::M('Login');
        $result = $login->check();

        if($result){
            $_SESSION['admin'] = 'admin';
//            var_dump($_SESSION['id']);exit();
            $this->success('登录成功', '?m=Admin&c=Index&a=index');
        }else{
            $this->error('用户名或密码错误');
        }
    }

    /**
     * 生成验证码
     */
    public function yzm(){
        Verify::code();
    }

    /****
     * 退出登录
     */
    public function logout()
    {

        $this->display('_login.html');
    }
}
?>














