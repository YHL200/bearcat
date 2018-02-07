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