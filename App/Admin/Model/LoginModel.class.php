<?php
class LoginModel extends Model{
    //检测用户名和密码是否正确
    public function check(){
        //提取用户输入的内容

        $adminname = $_POST['user'];
        $pwd = md5($_POST['pwd']);


        $sql = "select * from login where username=?";

        $res = $this->find($sql, array($adminname));


        if($res){
            //echo 111;
            if($res['password'] == $pwd){

        //验证通过之后的用户ID保存在session中
        $_SESSION['id'] = $res['id'];

                return true;

            }else{

                return false;
            }
        }else{
//            echo 222;
            //说明用户名不对
            return false;
        }
    }
}
?>