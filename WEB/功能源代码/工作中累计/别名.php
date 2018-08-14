<?php
namespace app\index3\controller;

use think\Controller;
use think\Db;

class Index extends Controller
{
    public function index()
    {
        //栏目
        $re = Db::name('lanmu')->where('top_id=0')->limit(6)->select();
        //别名
        $re_ids = [];
        foreach($re as $value) {
            $re_ids[] = $value['id'];
        }
        $where['fid'] = ['in', $re_ids];
        
        $blanmu = Db::name('blanmu')->where($where)->where('user_id',session('user_id'))->limit(6)->select();
        $blanmu_keys = []; // 栏目ID为KEY的数组
        foreach($blanmu as $value) {
            $blanmu_keys[$value['fid']] = $value;
        }
        
             
        // 替换别名为栏目名
        foreach($re as &$value) {
            if (!empty($blanmu_keys[$value['id']])) {
                
               
                $value['name'] = $blanmu_keys[$value['id']]['bname'];
            }
        }
       
        $this->assign('lanmu',$re);
        
        
    }
}
