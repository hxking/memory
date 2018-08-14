使用 Composer :
```
常用命令：
    1、初始化命令     composer init
    2、安装依赖包命令  composer install
    3、更新依赖包命令  composer update
    4、添加依赖命令    composer require  
    5、创建项目命令    composer create-project  laravel/laravel  [保存文件夹名]   [版本]
    6、查看版本信息    composer show laravel/laravel(项目)
    7、更新composer   composer dump-autoload
```

composer 添加自动加载文件
```
1、修改cmposer，json 文件
"autoload": {
    //加载类文件，写命名空间
    "classmap": [
        "app/Lib/category"
    ],
    "psr-4": {
        "App\\": "app/"
    },
    //加载函数文件，写函数位置
    "files":[
        "app/Lib/foo.php"
    ]
},

2、更新composer
composer dump-autoload
```