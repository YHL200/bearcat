<?php
//工厂类，用于实例化自定义的模型
class Factory {
    private static $ins = array();
    //一个方法，用于实例化自定义的模型，要保证实例化的模型符合单例模型
    public static function M($model){  //参数 为 StudentModel  UserModel
        /*array(
            'Student'=> new StudentModel(),
            'User'=> new UserModel(),
        );*/
        if(!array_key_exists($model, self::$ins)){
            $m = $model . 'Model';
            self::$ins[$model] = new $m();
        }
        return self::$ins[$model];
    }
}
?>