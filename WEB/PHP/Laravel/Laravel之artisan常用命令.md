查看laravel版本:

        php artisan --version

查看artisan命令:

        php artisan list   

生成一个随机的 key，并自动更新到 app/config/app.php 的 key 键值对（刚安装好需要做这一步）:

        php artisan key:generate

查看某个帮助命令:

        php artisan help make:model

使用 PHP 内置的开发服务器启动应用:

        php artisan serve

开启Auth用户功能（开启后需要执行迁移才生效）:

        php artisan make:auth

开启维护模式和关闭维护模式（显示503）:

        php artisan down

        php artisan up

进入tinker工具:

        php artisan tinker

列出所有的路由:

        php artisan route:list

生成路由缓存以及移除缓存路由文件:

        php artisan route:cache

        php artisan route:clear
功能篇

创建控制器:

        php artisan make:controller StudentController

创建Rest风格资源控制器（带有index、create、store、edit、update、destroy、show方法）:

        php artisan make:controller PhotoController --resource

在路由中，通过 resource 方法为该控制器注册一个资源路由：

        Route::resource('posts', 'PostController');

创建模型:

        php artisan make:model Student

创建新建表的迁移和修改表的迁移:

        php artisan make:migration create_users_table --create=students //创建students表

       php artisan make:migration add_votes_to_users_table --table=students//给students表增加votes字段

执行迁移:

        php artisan migrate

创建模型的时候同时生成新建表的迁移:

        php artisan make:model Student -m

回滚上一次的迁移:

        php artisan migrate:rollback

回滚所有迁移:

        php artisan migrate:reset

创建填充:

        php artisan make:seeder StudentTableSeeder

执行单个填充:

        php artisan db:seed --class=StudentTableSeeder

执行所有填充:

        php artisan db:seed

创建中间件（app/Http/Middleware 下）:

        php artisan make:middleware Activity

创建队列（数据库）的表迁移（需要执行迁移才生效）:

        php artisan queue:table

创建队列类（app/jobs下）：

        php artisan make:job SendEmail

创建请求类（app/Http/Requests下）:

        php artisan make:request CreateArticleRequest

