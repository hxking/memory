```
COOKIE的基本操作：
    1、新增一个COOKIE
        语法：setcookie('cookie名','值'，有效期int型)
    2、修改COOKIE
        setcookie('cookie名','新值')
    3、获取COOKIE
        $_COOKIE['cookie名']
    4、删除COOKIE  time()当前时间戳
         setcookie('cookie名','值'，有效期小于当前time()的就可以)

SESSION的基本操作：
    1、开启SESSION：要使用SESSION必须先开启SESSION机制
        session_start();

    2、新增一个SESSION数据
        $_SESSION['变量名'] = 变量值;

    3、使用SESSION
        $_SESSION['变量名'];

    4、修改SESSION
        $_SESSION['变量名'] = 新值;

    5、删除一个SESSION数据
        unset($_SESSION['变量名']);

    6、删除SESSION ： 他俩一般一起用
        $_SESSION = []; 删除所有的SESSION数据
        session_destroy(); 销毁SESSION存储的数据文件

```