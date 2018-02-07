<?php
class Controller {
    protected $smarty;

    public function __construct()
    {
        //判断，如果控制器的实例含有yanzheng方法，就调用它
        if(method_exists($this, 'yanzheng')) $this->yanzheng();

        //引入Smarty类，实例化Smarty，分配数据，指定模板
        include_once FRAME_PATH . 'Smarty/Smarty.class.php';
        $this->smarty = new Smarty();
        //配置Smarty的模板目录
        $this->smarty->setTemplateDir(VIEW_PATH . C);
        //设置Smarty的编译目录
        $this->smarty->setCompileDir(APP_PATH . 'Runtime');
    }

    //没有完全smarty的assign
    public function assign($key, $value){
        $this->smarty->assign($key, $value);
    }

    //完全实现了smarty的display
    public function display($template, $cache_id = null, $compile_id = null, $parent = null){
        $this->smarty->display($template, $cache_id, $compile_id, $parent);
    }

    //成功跳转的方法
    public function success($msg, $url){
        echo "<script>alert('$msg'); location.href='$url';</script>";
        exit();
    }

    //失败跳转的方法
    public function error($msg){
        echo "<script>alert('$msg'); history.back();</script>";
        exit();
    }


}
?>