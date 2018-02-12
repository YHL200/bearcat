<?php

class RegisterModel extends Model
{
    /**
     * 注册功能数据插入
     * @return bool
     */
    public function attestation()
    {

//PDO預處理需注意的地方
      $arr['username'] = $_POST['user'];
      $arr['password'] = md5($_POST['pwd']);


        $sql = "insert into login(`username`, `password`) values(:username, :password)";
        return $this->add($sql, $arr);



    }

}