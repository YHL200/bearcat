<?php
class CommonController extends Controller {
    //写一个验证session的方法
    public function yanzheng(){
        if(!isset($_SESSION['admin']) || $_SESSION['admin'] != 'admin'){
            $this->success('请先登录', '?m=Admin&c=Login&a=login');
        }
    }
}
?>