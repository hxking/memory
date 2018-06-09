<?php
include 'Verify.class.php';
use App\Library\Code\Verify;

print_r($_POST);

$very = new Verify(); 
if($very -> check($_POST['code'])){
    echo "验证码正确";
}else{
    echo "验证码错误";
}
echo time();
?>