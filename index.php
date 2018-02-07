<?php
header('content-type:text/html;charset=utf-8');
//安全性代码
//开启session
session_start();
define('APP_PATH', './App/');
//思路是根据地址栏的参数a，来选择到底执行哪个if区间的代码
//$a = isset($_GET['a']) ? $_GET['a'] : 'student';  //a为action表示的是控制器类中的方法 user

include_once './Frame/Core/Frame.class.php';
Frame::run();