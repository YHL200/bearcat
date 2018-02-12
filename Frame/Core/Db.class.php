<?php
class Db {
    private static $ins = false;
    public $pdo; //用于保存pdo对象，以便于当前类中的所有方法使用


    private function __construct(){
        $this->connect();
    }
    private function __clone(){}

    public static function getIns(){
        if(self::$ins === false){
            self::$ins = new self;
        }
        return self::$ins;
    }

    //连接数据库方法
    private function connect(){
        $dsn = $GLOBALS['conf']['DB_TYPE'].":host={$GLOBALS['conf']['DB_HOST']};dbname={$GLOBALS['conf']['DB_NAME']};charset=".$GLOBALS['conf']['DB_CHARSET'];
        $this->pdo = new PDO($dsn, $GLOBALS['conf']['DB_USER'], $GLOBALS['conf']['DB_PWD'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    }

    /**************************** 下面的部分完成基本的增删改查方法 ******************************************/

}
?>