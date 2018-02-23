<?php

class IndexModel extends Model {

    //对筛选留言人进行数据查询
    public function sel(){

        $id= $_SESSION['id'];
        $sql="SELECT id,username FROM LOGIN WHERE id NOT IN (?) ";
        $res = $this->select($sql, array($id));

       return $res;

  /*       echo "<pre>";
          print_r($res);
    }*/

    }

    public function sel_super_addresserid(){

        $sql="SELECT addresserid  FROM MESSAGE  ";
        $res=$this->selectsql($sql);


        return $res;
     /*   echo "<pre>";
        print_r($res);
        exit;*/


    }
    public function sel_super_recipientsid(){
        $sql="SELECT recipientsid,title,content  FROM MESSAGE ";
        $res=$this->selectsql($sql);
        return $res;
    }
    public  function   del(){
        $id=$_GET['d'];
        $sql="delete form message where id=$id";
        $res=$this->selectsql($sql);
           echo "<pre>";
     var_dump($res);
     exit;

        return $res;
    }






}