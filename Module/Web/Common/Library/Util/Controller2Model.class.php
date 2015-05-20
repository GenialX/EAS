<?php
namespace Common\Library\Util;
/**
 * 记录控制器对应数据库模型表的映射关系.
 * 
 * @author genialx
 *
 */
class Controller2Model {
	// 以Relation为后缀的字段代表利用自定义的模型类
	private $map = array();

	public function __construct() {
		$this->map = C("CONTROLLER_MODEL_MAP");
	}
	
	public function __get($name) {
		if(key_exists($name, $this->map)) {
			return $this->map[$name];
		}
		return '';
	}
}