<?php
/**
 * Created by PhpStorm.
 * User: T121
 * Date: 2018/2/11
 * Time: 11:25
 */
class UserModel extends Model
{
    /**
     * 添加留言内容
     * @return bool
     */
    public function insertData()
    {
       $_POST['userid'] =$_SESSION['id'];
       echo "<pre>";

        $sql = "insert into message(`addresserid`, `recipientsid`,`title`,`content`) values(:userid,:usertoid,:title,:content)";
        return $this->add($sql, $_POST);

    }

    /**
     * 获取留言人的姓名
     * @return array|string
     */

    public function seldata(){

        $userid =$_SESSION['id'];
//        echo "<pre>";


        $sql = "select addresserid  from  message  where recipientsid= $userid ";
         $res=$this->selectsql($sql);



//        print_r($res);exit;

        $arr2=[];
        foreach($res as $k=>$v){

            foreach($v as $key=>$val){
                $arr2[]=$val;
            }
        }
        $arr=implode(',',$arr2);
        $sql="SELECT username FROM LOGIN WHERE id  IN ($arr) ";
       $res= $this->sql_in($sql);
        $arr=[];
        foreach($res as $k=>$v){

            foreach($v as $key=>$val){
                $arr[]=$val;
            }
        }
        return $arr;

//        print_r($arr);

    }
    /**
     * 获取留言人标题和内容
     */
    public function sel_data(){

        $userid =$_SESSION['id'];
        $sql = "select title,content  from  message  where recipientsid= $userid";
        $res=$this->selectsql($sql);
        return $res;
     /*   echo "<pre>";
        print_r($res);*/




    }

}






