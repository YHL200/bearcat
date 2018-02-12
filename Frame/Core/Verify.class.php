<?php
class Verify {
    //生成验证码的方法
    public static function code(){
        //header设置
        header('content-type:image/png');
        //创建一张真彩色图像
        $im = imagecreatetruecolor(210, 75);

        /***************************这部分是设置验证码*******************************/
        //背景颜色
        $bgcolor = imagecolorallocate($im, mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
        imagefill($im,0,0,$bgcolor);
        //得到验证码字符串
        $default_str = '0123456789';
        //打乱字符串
        $shuffle_str = str_shuffle($default_str);
        //截取4个，作为验证码字符串
        $code = substr($shuffle_str, 0, 4);
        //将验证码存入session
        $_SESSION['code'] = $code;
        //file_put_contents('a.txt', $code); //测试验证码字符串是否得到
        //将验证码字符串写到图片上，使用truetype类型字体 ALGER.TTF
        for($i=0; $i<4; $i++){
            $ttfcolor = imagecolorallocate($im, mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
            imagettftext($im, 60, mt_rand(-25,25), 5+50*$i, 68, $ttfcolor, FRAME_PATH . 'Core/ALGER.TTF', substr($code, $i, 1));
        }

        /***************************这部分是设置验证码*******************************/

        //如果图像出不来，可能是因为在输入输出之前，输出内存中有内容存在，我们只需把输出缓冲中的内容清空即可
        ob_clean(); //output buffering 这是ob的意思，是输出缓冲的意思
        //输出图像
        imagepng($im);
        //销毁图像
        imagedestroy($im);
    }
}
?>