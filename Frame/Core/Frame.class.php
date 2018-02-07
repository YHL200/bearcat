<?php
//框架初始化类、引导类
class Frame {

    //整体调用当前类中的其他方法
    public static function run(){
        self::readConfig();  //先读取配置项，因为后面的getParams方法中使用了配置
        self::getParams(); //放到setConst之前，因为在setConst里面用到了M
        self::setConst(); //放到autoLoad前面，因为autoLoad方法中使用了路径常量
        self::autoLoad(); //放到dispatch前面，因为分发控制方法中使用了自动加载
        self::dispatch();
    }
    //获取地址栏参数
    public static function getParams(){
        $m = isset($_GET['m']) ? $_GET['m'] : 'Admin'; // m为module，表示前台或后台
        $c = isset($_GET['c']) ? $_GET['c'] : 'Login'; //c为controller，表示的是控制器  User
        $a = isset($_GET['a']) ? $_GET['a'] : 'login';//a为action，表示每个控制器中的方法
        //把各个地址栏的参数，声明为常量，因为常量具有全局性，后面的代码中都可以使用M、C、A的值
        define('M', $m);
        define('C', $c);
        define('A', $a);
    }

    //分发控制
    public static function dispatch(){
        $controller = C . 'Controller';  //UserController
        //实例化控制器类
        $obj = new $controller(); //$obj = new UserController();
        $a = A;
        $obj->$a(); //$obj->user();
    }

    //类的自动加载
    public static function autoLoad(){
        spl_autoload_register(function($classname){
            //Core目录中的类
            $filename = FRAME_PATH . 'Core/' . $classname . '.class.php';
            if(file_exists($filename)) include_once $filename;

            //Controller中的类
            $filename = CONTROLLER_PATH . $classname . '.class.php';
            if(file_exists($filename)) include_once $filename;

            //Model中的类
            $filename = MODEL_PATH . $classname . '.class.php';
            if(file_exists($filename)) include_once $filename;
        });
    }

    //读取配置
    public static function readConfig(){
        $config = include_once './Frame/Config/config.php';
        $GLOBALS['conf'] = $config;
    }

    //定义常用路径常量
    public static function setConst(){
        $frame_path = str_replace('Core','',__DIR__);
        $frame_path = str_replace('\\','/',$frame_path);
        define('FRAME_PATH', $frame_path); //E:/server/Apache24/htdocs/mvc/v08/Frame/
        //echo FRAME_PATH;
        //定义App中的M、V、C三个目录
        define('CONTROLLER_PATH', APP_PATH . M . '/Controller/');
        define('MODEL_PATH', APP_PATH . M . '/Model/');
        define('VIEW_PATH', APP_PATH . M . '/View/');
    }

}
?>