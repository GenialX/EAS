<?php
namespace Common\Library\Util;
class Category {
	

	//得到父类的分类ID，一维数组
	Static Public function getParentCIDArr ($cates = NULL, $id = -1) {
		$arr = array();
		if( $cates == NULL ) $cates = Category::getCatesArr();
		foreach ( $cates as $k => $v ) {
			if( $v['id'] == $id ) {
				if( $v['pid'] == -1 ) return $arr;
				$arr[] = $v['pid'];
				$arr = array_merge($arr, self::getParentCIDArr($cates, $v['pid']));
			}
		}
	
		return $arr;
	}
	
	//得到子类的分类ID，一维数组
	Static Public function getChildIDArr ($cates = NULL, $pid = -1) {
		if( $cates == NULL ) $cates = Category::getCatesArr();
		$arr = array();
		foreach ( $cates as $k => $v ) {
			if( $v['pid'] == $pid ) {
				if( $v['id'] == -1 ) return $arr;
				$arr[] = $v['id'];
				$arr = array_merge($arr, self::getChildIDArr($cates, $v['id']));
			}
		}
		return $arr;
	}
	

	/**
	 * Get classic datas.
	 *
	 * @param String $map
	 *
	 */
	Static Public function getCatesArr($map = null) {
		return M("Classic")->where($map)->select();
	}
	
	
}