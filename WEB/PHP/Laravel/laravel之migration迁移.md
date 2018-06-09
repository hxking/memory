# laravel之migration迁移

## 查看迁移文件所执行的命令,但不执行
```
php artisan migrate --pretend
```

## 生成迁移文件
```
php artisan make:migration create_users_table
生成新的迁移文件，指定表名：    --create=users
指定旧的表名，用于增删改查：    --table=users
```

## 生成的迁移文件位置在
```
/database/migrations

内容例子：

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('airline');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('flights');
    }
}
```
## 运行迁移
```
php artisan migrate
```

## 回滚迁移
```
回滚最新的一次迁移:
php artisan migrate:rollback

通过 rollback 命令上提供的 step 选项来回滚指定数目的迁移:
php artisan migrate:rollback --step=5

migrate:reset 命令将会回滚所有的应用迁移：
php artisan migrate:reset

```