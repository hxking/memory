# laravel之 Model操作
```
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


```