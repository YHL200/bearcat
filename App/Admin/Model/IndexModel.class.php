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

}