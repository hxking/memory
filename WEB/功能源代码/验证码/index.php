<?php


include 'Verify.class.php';

use App\Library\Code\Verify;

    //输出验证码
    function verifyImg(){
        // 给方法做配置：$cfg  ，创建对象时，直接传值
        $cfg = array(
            'imageH'    =>  50,               // 验证码图片高度
            'imageW'    =>  125,               // 验证码图片宽度
            'length'    =>  4,               // 验证码位数
            'fontSize'  =>  18,              // 验证码字体大小(px)
            'fontttf'   =>  '4.ttf',              // 验证码字体，不设置随机获取
        );
        //实例化verify类对象，对象调用成员方法即可
        $very = new Verify($cfg); 
        $very -> entry();

    }

    echo verifyImg();


?>