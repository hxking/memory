<?php
class Index{

     //创建用户文件夹，生成中转文件
    public function zhong($source, $destination, $child)  
    {
          //用法：   
        // xCopy("feiy","feiy2",1):拷贝feiy下的文件到 feiy2,包括子目录   
        // xCopy("feiy","feiy2",0):拷贝feiy下的文件到 feiy2,不包括子目录   
        //参数说明：   
        // $source:源目录名   
        // $destination:目的目录名   
        // $child:复制时，是不是包含的子目录   
        if(!is_dir($source)){
            echo("Error:the $source is not a direction!");
            return 0;   
        };

        if(!is_dir($destination)){
            mkdir($destination,0777);
        };
        $handle=dir($source);
        while($entry=$handle->read()) {
            if(($entry!=".")&&($entry!="..")){
                if(is_dir($source."/".$entry)){
                    if($child){
                        $this ->zhong($source."/".$entry,$destination."/".$entry,$child);   
                    }
                }else{
                    copy($source."/".$entry,$destination."/".$entry); 
                }
            }   
        }
        return 1;   
    
    }

    //创建用户文件夹，生成中转文件
    public function jian($user,$view,$mulu)
    {
        $str = $user.'/controller/Zhong.php';
        $line_array = '<?php
namespace app\\'.$mulu.'\controller;

use think\Controller;
use think\Session;
use think\Db;

class Zhong extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session(\'mulu\',\''.$mulu.'\');
        if(!empty(session(\'mulu\'))){
            $re = Db::name(\'admin\')->where(\'mulu\', session(\'mulu\') )->find();
            if($re){
                session(\'user_id\',$re[\'id\']);
                // dump(session(\'user_id\'));
            }
        }
    }
}';

            if(!is_dir($view)){
                mkdir ($view,0777,true);
            }
            // dump($str);
            $f = fopen($str, 'w');//打开的文件只能向文件写入。若文件不存在，则建立该文件，文件存在，则将该文件删去，重建一个新文件。
            fwrite($f, $line_array);//写入信息
            fclose($f);//关闭fopen资源
            // echo 456;
            return 1;
    }


     //修改文件内容方法
     public function xiugai($dir,$view,$vie){
        $files=array();
        if(is_dir($dir)){
            if ($dh = opendir($dir)) {
              while (($file= readdir($dh)) !== false){
         
                  if($file!="." && $file!=".."){
                    if($file == '.svn'){
                        continue;
                    }
                    $files[] =  $file;
                  }
              }
              closedir($dh);
            }
          }
          foreach($files as $val){
            $content = file_get_contents($dir.'/'.$val);
            // return $dir.'/'.$val;

            $content = str_replace('namespace app\\'.$vie.'\controller;','namespace app\\'.$view.'\controller;',$content);
            $content = str_replace('use app\\'.$vie.'\controller\Zhong;','use app\\'.$view.'\controller\Zhong;',$content);
            file_put_contents($dir.$val,$content);
          }
          return $files;
    }

    //获取模板
    public function index3($dir)
    {
        $files=array();
        if(is_dir($dir)){
            if ($dh = opendir($dir)) {
              while (($file= readdir($dh)) !== false){
                if((is_dir($dir."/".$file)) && $file!="." && $file!=".."){
                    if($file == '.svn'){
                        continue;
                    }
                $files[] = $file;
               
                } 
              }
              closedir($dh);
            }
          }
          return $files;
        //   $this->fetch();
    }
}