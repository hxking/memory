安装 Laravel:

    查看laravel包： composer search laravel

    查看所有版本： composer show -all laravel/laravel

    首先，通过 Composer 安装 Laravel 安装器：composer global require "laravel/installer"

    你还可以在终端中通过 Composer 的 create-project 命令来安装 Laravel 应用，下载5.4版本使用这个命令：

    composer create-project --prefer-dist laravel/laravel blog 5.4.*

    如果缺少vendor文件在当前文件夹下执行命令：composer install

配置 Laravel:

    在 .env 文件中添加 key ; 生成key ：php artisan key:generate

    开启'debug' => env('APP_DEBUG', true), 在 \config\app.php 文件中

    其他配置....

配置路由：

    在 \routes\wab.php 页面，详情看文档

    路由的从命名：

        直接显示输出：Route::get('as',['as'=>'ass', function () { echo route('ass'); }]);或：Route::get('as', function () { echo route('ass'); })->name('ass');

        控制器路由：Route::get('index','IndexController@index')->name('index');

        通过辅助函数 route 为该命名路由生成 URL,可以有第二个参数。

    路由群组：共享属性以数组的形式参数传递给 Route::group 方法。

        路由前缀：['prefix' => 'admin']   // 匹配 "/admin" URL

        命名空间:['namespace' => 'Admin'] // 控制器在 "App\Http\Controllers\Admin" 命名空间下

        中间件: ['middleware' => 'auth'] // 使用 Auth 中间件

        子域名路由:['domain' => '{account}.[myapp.com](http://myapp.com/)']

        Route::group(['namespace' => 'Admin'], function(){       });

视图传值：

    给视图传一个值：return view('greeting', ['name' => 'James']);或： return view('greeting')->with('name', 'James');

    给admin下的profile传一个$data数组值 ：return view('admin.profile', $data);

    返回上一个视图：return back();

    跳转页面：return redirect('跳转的页面');



Model操作：  

    创建model： php artisan make:model 文件名/userModel

    model的约定：

        在laravel中约定(非强制),表名叫xxs,复数形式.类和表名有关系,一般表名去掉s,即为Model的类名.

        表名的约定 默认表名为Model名+s,可能通过的model类的table属性来指定表名.

        id的约定 Model默认认为,每张表都有一个叫做id的主键,你可以通过primaryKey属性来指定主键列名.

        不想要created_at,updated_at字段，可以把model的timestamps属性设为false

            class XxModel extends Model {

                protected $table = 'yourTableName';//指定表名

                protected $primaryKey = 'Xx_id'; //设置主键

                public $timestamps = false; //去掉created_at,updated_at字段

            }

    继承自：Illuminate\Database\Eloquent\Model

    实例化Model：

        $model = new App\Xxx(); // 得到Xx表的Model,且不与表中任何行对应.

        $model = Xxx::find($id); // 得到Xx表的Model,且与$id行数据对应.

    增：

        public function add() {

            $msg = new Msg();

            $msg->title = $_POST['title'];

            $msg->content= $_POST['title'];

            return $msg->save() ? 'OK' : 'fail';

        }

    查：

        查单行: find()与first()

            Msg::find($id) // 按id查

            Msg::where('id','>',3)->first();// 按where条件查

        查多行: all()和get()

            Msg::all(['列1','列2']);// 无条件查所有行. select 列1,列2 from msgs;

            Msg::where('id','>',2)->get(['列1','列2']);// 按条件查多行

    改：

        public function up($id) {

            if( empty($_POST) ) {

                $msg = Msg::find($id);

                return view('msg.up',['msg'=>$msg]);

            }else {

                $msg = Msg::find($id);

                $msg->title = $_POST['title'];

                $msg->content= $_POST['content'];

                return $msg->save() ? 'OK' : 'fail';

            }

        }

    删：

        public function del($id) {

            $msg = Msg::find($id);

            return $msg->delete() ? 'ok' : 'fail';

        }

    复杂查询:// select .. where id>2 order by id desc limit 2,1;

        Msg::where('id','>',2)->orderBy('id','desc')->skip(2)->take(1)->get();

    统计

        Msg::count(); //总数

        Msg::avg('id'); //平均值

        Msg::min('id'); //最小

        Msg::max('id'); //最大

        Msg::sum('id'); //合计

    分组  // 用DB::raw()方法,raw是"裸,不修饰的"意思

        Goods::groupBy('cat_id')->get(['cat_id',DB::raw('avg(price)')]) );

数据库：

    引人：use Illuminate\Support\Facades\DB;

    测试是否连接成功：$pdo = DB::connection()->getPdo();  dd($pdo);

    运行 Select 查询：DB::select('select * from users where active = ?', [1]);

    运行插入语句：DB::insert('insert into users (id, name) values (?, ?)', [1, 'Dayle']);

    运行更新语句： DB::update('update users set votes = 100 where name = ?', ['John']);

    运行删除语句：DB::delete('delete from users');

    运行一个通用语句：DB::statement('drop table users');
