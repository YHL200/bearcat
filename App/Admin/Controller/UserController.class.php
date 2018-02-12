<?php
/**
 * Created by PhpStorm.
 * User: T121
 * Date: 2018/2/11
 * Time: 11:13
 */
class UserController extends Controller
{
    /***
     * 展示留言页面数据
     */
    public  function index(){



        $login = Factory::M('User');
        $resusername = $login->seldata();

        $rescontent=$login->sel_data();


/*           echo "<pre>";
          print_r($rescontent);
//        exit();*/

        $this->assign('resusername',$resusername);
        $this->assign('rescontent',$rescontent);
        $this->display('_index.html');

    }

    /**顶顶顶顶
     * 提交留言数据
     */
    public function adddata(){

        $login = Factory::M('User');
        $result = $login->insertData();
        if ($result){
            $this->success('留言成功','?m=Admin&c=User&a=index');
        }


    }



}