<?php

class RegisterController extends Controller
{
    /***
     * 注册页
     */
    public function index()
    {
        $this->display('_register.html');
    }

    /**
     * 检测注册页面
     */
    public function register()
    {

        if (strtoupper($_POST['yzm']) != strtoupper($_SESSION['code'])) {
            $this->error('验证码错误');
        }
        if ($_POST['user'] > 18) {
            return $this->error('账号长度不能超过18位数');
        }

        if (!preg_match("/[a-zA-Z0-9_-]+/", $_POST['pwd'])) {
            return $this->error('密码格式错误');
        }
        $login = Factory::M('Register');
        $result = $login->attestation();
        if ($result){
            $this->success('註冊成功','?m=Admin&c=Login&a=login');
        }

    }
}