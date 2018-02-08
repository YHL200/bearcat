<?php

class RegisterModel extends Model
{
    public function attestation()
    {


//      $adminname = $_POST['user'];
//      $pwd = md5($_POST['pwd']);
        $sql = "INSERT INTO  login ('id','username','password') VALUES(:id,:adminname,:pwd)";


        $res = $this->add($sql, $_POST);

        if ($res) {
            //echo 111;
            if ($res['password'] == $pwd) {
                return true;
            } else {

                return false;
            }
        } else {
//            echo 222;
            //说明用户名不对
            return false;
        }

    }

}