```
Apache2.4下载:http://www.apachelounge.com/download/
PHP下载:http://windows.php.net/download/
MySQL下载：https://www.mysql.com/downloads/

vc2015下载:https://www.microsoft.com/zh-cn/download/details.aspx?id=48145     (有时候安装php会缺少文件，就需要安装他)

**最好都配置环境变量

Apache：
在 cmd 命令行中安装apache ：
    1、修改配置文件(httpd.conf)路径，在修改前，可以在cmd下： httpd -t 查看哪里有错误

    2、修改 ServerName ，改成
    #ServerName www.example.com:80  --》  ServerName localhost:80

    2、  httpd -t  没有错误的时候开始安装：
    httpd -k install -n apache 
    该命令的意思是，安装apache服务，并将该服务名称命名为apache(你也可以改成别的)，回车。 

    3、httpd -k start  看看能否启动
    启动成功：localhost 的时候就能访问了
    系统找不到指定的文件，就是没有安装，或者安装的不对
    
    4、：注意他们的路径
    (1)、加载相应的PHP模块： 
    LoadModule php7_module “E:/myev/php/php7apache2_4.dll”    （大约180行）
    (2)、设置处理的文件类型：                                   （大约420行）
    AddType application/x-httpd-php .php 
    (3)、在apache配置文件的最后,指定这个php.ini文件目录          （httpd.conf文件的最后）
    PHPIniDir "c:/wamp/php/php.ini"

    5、加载pdo (php.ini里)

    6、设置首页面：在这里加 index.php
    <IfModule dir_module>
    DirectoryIndex index.html index.php
    </IfModule>

    7、虚拟目录：（250行左右）
    更改虚拟目录：
    DocumentRoot "D:/WWW"
    更改虚拟目录权限：
    <Directory "D:/WWW">

    8、修改端口号：（58行左右）
    Listen 80

    9、DNS解析：（修改localhost用别的访问）
    位置：C:\Windows\System32\drivers\etc\hosts

    10、虚拟主机:(一个apache操作多个网站)
    （1）先包涵这个文件
    # Virtual hosts  （大约508行）
    Include conf/extra/httpd-vhosts.conf
    （2）修改 conf/extra/httpd-vhosts.conf 文件：
        <VirtualHost *:80>
            DocumentRoot "D:\ww"
            ServerName woaini.com
            <Directory "D:/WW">
                Options Indexes FollowSymLinks
                Require all granted
            </Directory>
        </VirtualHost>

上面不好事用下面的--------------------------------------------------------------------------
    <VirtualHost *:80>
            ServerName yj.com
            DocumentRoot F:/phpstudy/WWW/yj/public
            # SetEnv APPLICATION_ENV "development"  //设置开发环境，生产环境删除
            <Directory F:/phpstudy/WWW/yj/public>
                    DirectoryIndex index.php
                    AllowOverride All
                    Require all granted
            </Directory>
    </VirtualHost> 

//错误日志
    ErrorLog "文件位置"
    CustomLog "文件位置" common

 
    （3）在 dns解析一下要访问的域名：
     C:\Windows\System32\drivers\etc\hosts


    OOOOOOOOOKKKKKKKKKKKK

apache命令：
    检查错误：httpd -t 
    检查apache版本：httpd -v
    检查apache加载的模块：httpd -M  (大写) 
    开启apache服务：httpd -k start    
    关闭apache服务：httpd -k stop
    重启apache服务：httpd -k restart
    删除apache服务：sc delete apacccc


PHP7:   

    1、开发时将 php.ini-development 复制一份，并改名为 php.ini
    （在apache配置文件的最后用  PHPIniDir "c:/wamp/php/php.ini"，指定这个文件目录）
    php.ini-development :   开发版
    php.ini-production  :   运行版

    2、php的时区设置为中国的时区：
    date.timezone =PRC  （大约在940行）

    3、设置php的扩展文件，如pdo mysqli等  指定php中的ext文件目录
    extension_dir = "E:/myev/php/ext" （大约在740行）

    4、在900行左右这个是开启php扩展的
    extension=

    OOOOOOOOOKKKKKKKKKKKK

MySQL下载：  
    注意： 安装位置只能在  c:/  目录下，其他位置安装到一个地方会不动（mysql服务启动不了）
    自定义安装：custom

    mysql安装完了我貌似什么也没动


MySQL常用命令：
    启动服务：net start mysql 
    关闭服务：net stop mysql
    登录：mysql -u帐号 -p   密码（回车后在输入密码）
    查看默认字符集： show variables like 'character%';
    查看数据库：show databases;
    选择数据库：use 数据库名;
    查看选择的数据库里面的表：show tables;
    查询表信息：select  *  from  表名; 
    


phpMyAdmin配置安装

    下载phpMyAdmin
    直接将其解压到网站根目录下，然后重命名为phpMyAdmin 
    然后在浏览器中输入： 
    http://localhost/phpMyAdmin 就可以登录mysql数据库了


最后检查：
<?php
header('Content-Type:text/html;charset=utf-8');

$dsn  =  'mysql:host=localhost;dbname=newsdb' ;
$name  =  'root' ;
$password  =  '' ;

try {
     $db  = new PDO($dsn,$name,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"set names utf8"));
     $db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch ( PDOException $e ) {
    echo  '连接失败: '  .  $e -> getMessage ();
}
phpinfo();
?>
```