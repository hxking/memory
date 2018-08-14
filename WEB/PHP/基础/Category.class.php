<?php
/**
 * 
 * 递归输出网页常用的无限极分类相关项目。树形下拉，面包屑导航，获取传递栏目下子栏目
 * @author www.16186.com
 *
 */
class Category{
	
	//无限极分类树
	public function cateTree($cate,$pid = 0,$level = 0){
		$cateTree = array();
		foreach($cate as $v){
			if($v['pid'] == $pid){
				$v['html'] = str_repeat("&nbsp;&nbsp;--",$level);
				$cateTree[] = $v;
				$cateTree = array_merge($cateTree,self::cateTree($cate,$v['cid'],$level+1));
			}
		}
		return $cateTree;
	}
	
	//生成多维子栏目数组
	public function cateArray($cate,$pid = 0){
		$cateArray = array();
		foreach($cate as $v){
			if($v['pid'] == $pid){
				$v['child'] = self::cateArray($cate,$v['cid']);
				$cateArray[] = $v;
			}
		}
		return $cateArray;
	}
	
	//传递一个父级栏目ID返回该栏目下所有子栏目
	public function cateChilds($cate,$cid){
		$cateChilds = array();
		foreach($cate as $v){
			if($v['pid'] == $cid){
				$cateChilds[] = $v;
				$cateChilds = array_merge($cateChilds,self::cateChilds($cate, $v['cid']));
			}
		}
		return $cateChilds;
	}
	
	//传递一个父级栏目ID返回该栏目下所有子栏目id
	public function cids($cate,$cid){
		$cids = array();
		foreach($cate as $v){
			if($v['pid'] == $cid){
				$cids[] = $v['cid'];
				$cids = array_merge($cids,self::$cids($cate, $v['cid']));
			}
		}
		return $cateChilds;
	}
	
	//传递一个子分类ID，返回改栏目所有父级栏目
	public function cateParents($cate,$cid){
		$cateParents = array();
		foreach($cate as $v){
			if($v['cid'] == $cid){
				$cateParents[] = $v;
				$cateParents = array_merge(self::cateParents($cate, $v['pid']),$cateParents);
			}
		}
		return $cateParents;
	}
}