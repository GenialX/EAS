<?php
namespace Common\Controller;
use Think\Controller;
use Common\Library\Util\Controller2Model;
use Think\Upload;
use Common\Library\Util\Page;
use Common\Library\Int\Model\AdminModel;
abstract class CommonController extends Controller implements AdminModel{
	
	public function __construct() {
		parent::__construct();
	}
	
	/**
	 * 查询条件映射集合.
	 *
	 * @author genialx
	 *
	 */
	private $_map = array();
	
	/**
	 * SQL order 查询条件.
	 * @author genialx
	*/
	private $_order = "id desc";
	
	/**
	 * This variable is used to storage the datas assigned to template file.
	 * 
	 */
	private $_data = array();
	
	/**
	 * 标志是否渲染界面.
	 * 
	 * @var bool
	 */
	private $_isDisplay = true;
	
	/**
	 * Validation of the current user.
	 * 
	 * @author genialx
	 */
	protected function _validate() {
		if(!is_log()) { // 未登录
				if(CONTROLLER_NAME != 'Login') {
					$this->redirect("/Login/Login/index");
				}
			} else { // 已登录
				if(ACTION_NAME == 'logOut') return true;
				if(ACTION_NAME == 'lock') return true;
				
				if(CONTROLLER_NAME == 'Login') {
					$this->_goAdmin(C("LANG_REDIRCTING"));
					$this->_isDisplay = false;
				}
				
				if(MODULE_NAME != get_admin_module_name()) {
				    $this->_goAdmin(C("LANG_REDIRCTING"));
					$this->_isDisplay = false;
				}
		}
	}
	
	/**
	 * Assign the default vars.
	 *
	 * @author genialx
	 */
	protected function _assign() {
		
		/* current user */
		$this->_data['admin'] = D('Admin')->where(array("id"=>session(self::ADMIN_SESSION_ID)))->find();
		
		/* pageslide left */
		$this->_data['pageSlideLeft'] = $this->_getPageSlideLeft();
		
		/* Location */
		$this->_data['location'] = $this->_getLocation();
		
		/* dispose data */
		$this->_disposeData($this->_data, "_assign");
		
		/* assign */
		$this->assign("data", $this->_data);
	}
	
	/**
	 * 获取左侧边栏数据.
	 * 
	 */
	private function _getPageSlideLeft() {
	    switch(MODULE_NAME) {
	        case 'Student':
	            $data = C("LANG_STUDENT_CONTROLLER_MAP");
	            break;
	        case 'Teacher':
	            $data = C("LANG_TEACHER_CONTROLLER_MAP");
	            break;
	        default :
	            $data = C("LANG_STUDENT_CONTROLLER_MAP");
	            break;
	    }
		$result = '';
		foreach($data as $k=>$v) {
			if(!count($v['sub_map'])){ // 无子菜单
				$class = "";
				if(CONTROLLER_NAME == $v['controller'] && ACTION_NAME == $v['action']) $class = "class = \"active open\"";
				$_result = "<li {$class} ><a href=\"".__MODULE__."/{$v['controller']}/{$v['action']}\"><i class=\"{$v['icon_class']}\"></i> <span class=\"title\">{$v['name']} </span></a></li>";
			} else { //　有子菜单
				$isHave = $this->_isHaveSubMap($v['sub_map']);
				if($isHave) $class = "class = \"active open\""; else $class = "";
				$result_1 = "<li {$class} ><a href=\"javascript:void(0);\"><i class=\"{$v['icon_class']}\"></i> <span class=\"title\">{$v['name']} </span><i class=\"icon-arrow\"></i></a>";
				$result_2 = $this->_getSubPageSlideLfet($v['sub_map']);
				$_result = $result_1 . $result_2 . "</li>";
			}
			$result .= $_result;
		}
		return $result;
	}
	/**
	 * 获取左侧边栏数据[递归].
	 *
	 */
	private function _getSubPageSlideLfet($data) {
		$result = "<ul class=\"sub-menu\">";
		foreach($data as $k => $v) {
			$class = "";
			if(!count($v['sub_map'])) { // 无子菜单
				if(CONTROLLER_NAME == $v['controller'] && ACTION_NAME == $v['action']) $class = "class = \"active open\"";
				$result .= "<li {$class} ><a href=\"".__MODULE__."/{$v['controller']}/{$v['action']}\"><i class=\"{$v['icon_class']}\"></i> <span class=\"title\">{$v['name']} </span></a></li>";
			} else { // 有子菜单
				$isHave = $this->_isHaveSubMap($v['sub_map']);
				if($isHave) $class = "class = \"active open\""; else $class = "";
				$result_1 = "<li {$class} ><a href=\"javascript:void(0);\"><i class=\"{$v['icon_class']}\"></i> <span class=\"title\">{$v['name']} </span><i class=\"icon-arrow\"></i></a>";
				$result_2 = $this->_getSubPageSlideLfet($v['sub_map']);
				$result .= $result_1 . $result_2 . "</li>";
			}
		}
		$result = $result . "</ul>";
		return $result;
	}
	

	/**
	 * [递归]获取当前位置所在位置数组的一维下标.
	 *
	 * @param array $data
	 * @return boolean
	 */
	private function _isHaveSubMap($data){
		foreach ($data as $k => $v) {
			if($v['controller'] == CONTROLLER_NAME && $v['action'] == ACTION_NAME) {
				return true;
			} else if(count($v['sub_map'])) {
				return $this->_isHaveSubMap($v['sub_map']);
			}
		}
		return false;
	}
	
	
	/**
	 * 获取当前位置数据.
	 * 
	 */
	private function _getLocation() {
	    switch(MODULE_NAME) {
        case 'Student':
            $data = C("LANG_STUDENT_CONTROLLER_MAP");
            break;
        case 'Teacher':
            $data = C("LANG_TEACHER_CONTROLLER_MAP");
            break;
        default :
            $data = C("LANG_STUDENT_CONTROLLER_MAP");
            break;
	    }
		$index = 0;
		
		/* Get location arr index */
		foreach ($data as $k => $v) {
			$_data = array(1 => $v);	
			$index++;
			if($this->_isHaveSubMap($_data) == true) {
				break;
			}
		}
		/* Get location string */
		$v = array(
				1 => $data[$index],
		);
		$_location = $this->_getLocationString($v,true);
		
		/* Return */
		$result['locationString'] = $_location['locationString'];
		$result['lastName'] = $_location['lastName'];
		$result['firstName'] = $_location['firstName'];
		return $result;
	}

	
	/**
	 * [递归]根据当前位置获取位置字符串.
	 * 
	 * @param unknown $data
	 * @return string
	 */
	private function _getLocationString($data, $firstLevel = false) {
		$location = array();
		$once = false;
		foreach($data as $k => $v) {
			$_index = $this->_isHaveSubMap($v['sub_map']);
			$__index = ($v['action'] == ACTION_NAME && $v['controller'] == CONTROLLER_NAME)?true:false;
			if($__index == true) $location['lastName'] = $v['name'];
			if($_index == true || $__index == true) {
				$once = true;
				$location['locationString'] = " & " . $v['name'];
				$location['firstName'] = "";
				if($firstLevel == true) 
				{
					$location['locationString'] = ltrim($location['locationString']," & ");
					$location['firstName'] = $v['name'];
				}
				if(count($v['sub_map'])) {
					$rs = $this->_getLocationString($v['sub_map']);
					$location['locationString'] .= $rs['locationString'];
					$location['lastName'] 		= $rs['lastName'];
					if(!isset($location['firstName'])) $location['firstName'] = $rs['firstName'];
					return $location;
				} else {
					return $location;
				}
			}
			if($once == true) break;
		}
	}
	

	/**
	 * 上传文件.
	 *
	 * @author genialx
	 */
	protected function _upload(){	
		$upload 		   = 	 new Upload();// 实例化上传类
		$upload->maxSize   =     3145728 ;// 设置附件上传大小
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		// 上传文件
		$info  =  $upload->upload();
		if(!$info) {// 上传错误提示错误信息
			$this->error($upload->getError());
		} else {
			foreach ($info as $file) {
				return $file['savepath'] . $file['savename'];
			}
		}
	}
	

	/**
	 * 增加操作.
	 *
	 * @author genialx
	 *
	 * @param bool isRelation 关联查询
	 * @return mixed bool | string
	 */
	public function insert($isRelation = false, $table = null) {
		$table = (isset($table))?$table:$this->_getTable();
		$table = D($table);
		$data  = $table->create();
		$this->_disposeData($data, "insert");
		if($data) {
			$result = null;
			if($isRelation) {
				$result = $table->relation($isRelation)->add($data);
			} else {
				$result = $table->add($data);
			}
			if($result) return $result; // Return the last insert id.
		}
		return $table->getError();
	}
	
	/**
	 * 删除操作.
	 *
	 * @author genialx
	 * @param isRelation 关联删除
	 */
	public function delete($isRelation = false, $table = null) {
			    
	    $this->_before_delete();
	
	    $ids = I('get.ids',0);
	    $ids = trim($ids, ",");
	    if($ids == 0) {
	        $this->error(C("LANG_PARAM") . C("LANG_ERR"));
	        return false;
	    }
	    
		$table 	= (isset($table))?$table:$this->_getTable();
		$D 		= D($table);
	
		if($isRelation) {
			$result = $D->relation($isRelation)->delete($ids);
		} else {
			$result = $D->delete($ids);
		}

		$this->_after_delete();
		
		return $result;
	
	}
	
	/**
	 * 删除后的滞后操作.
	 */
	protected function _after_delete() {}
	
	/**
	 * 删除前的前置操作.
	 */
	protected function _before_delete() {}
	
	/**
	 * 更新操作.
	 * @author genialx
	 */
	public function update($isRelation = false, $table = null) {
	    
	    $this->_before_update();
	    
		$table = (isset($table))?$table:$this->_getTable();
		$table = D($table);
		$data  = $table->create();
		$this->_disposeData($data, "update");
		if($data) {
			if($isRelation) {
				$result = $table->relation($isRelation)->save($data);
			} else {
				$result = $table->save($data);
			}
			return $result;
		}	
		
		$this->_after_update();
		
		return $table->getError();
	}
	
	/**
	 * 更新后的滞后操作.
	 */
	protected function _after_update() {}
	
	/**
	 * 更新前的前置操作.
	 */
    protected function _before_update() {}
	
	/**
	 * 管理界面.
	 * @author genialx
	 * @param isRelation 真，则说明利用关联查询（请确保有关联模型）.
	 */
	public function manage($isRelation = false, $table = null) {
		$this->_list($isRelation, $table);
		$this->display();
	}
	
	/**
	 * 根据条件(map)获取数据并渲染模板.
	 *
	 * @author genialx
	 */
	private function _list($isRelation = false, $table = null) {
		$table 		= (isset($table))?$table:$this->_getTable();
		$Data 		= D($table); // 实例化数据对象
		$count      = $Data->where($this->_map)->count();// 查询满足要求的总记录数 $map表示查询条件
		$Page       = new Page($count, C('MANAGE_PAGE_ITEM_COUNT'));// 实例化分页类 传入总记录数
		$Page->setConfig('theme', "%totalRow% %header% %nowPage%/%totalPage% 页 %upPage% %downPage% %first% %prePage% %linkPage% %nextPage% %end%");
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询
		if($isRelation) {
			// 关联查询
			$list = $Data->relation(true)->where($this->_map)->order($this->_order)->limit($Page->firstRow.','.$Page->listRows)->select();
		} else {
			$list = $Data->where($this->_map)->order($this->_order)->limit($Page->firstRow.','.$Page->listRows)->select();
		}
		
		$data['list'] = $list;
		$this->_disposeData($data, "_list");
		$list = $data['list'];
		
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
	}

	/**
	 * 控制器名称.
	 * @author genialx
	 * @return string
	 */
	protected function _getController() {
		return CONTROLLER_NAME;
	}
	
	/**
	 * 操作名称.
	 * @author genialx
	 * @return string
	 */
	protected function _getAction() {
		return ACTION_NAME;
	}
	
	/**
	 * 根据当前CONTROLLER获取对应的数据库表名.
	 * @author genialx
	 * @version 0.1.0 增加关联查询机制 by genialx
	 * @param $isRelation 是否利用关联模型
	 * @return string [tableName] or ''
	 */
	private function _getTable() {
		$controller = $this->_getController();
		$C2M = new Controller2Model();
		return $C2M->{$controller};
	}
	
	/**
	 * 跳转到管理主界面.
	 * 
	 */
	protected function _goAdmin($message = null) {
	    if(!isset($message)) $message = C("LANG_LOGIN_SUCCESSFULLY");
	    $type = session(AdminModel::ADMIN_SESSION_TYPE);
	    switch($type) {
	        case AdminModel::ADMIN_SESSION_STUDENT_TYPE:
	            $this->success($message,  "/Student/Index/index");
	            break;
	        case AdminModel::ADMIN_SESSION_TEACHER_TYPE:
	            $this->success($message,  "/Teacher/Index/index");
	            break;
	        default:
	            $this->redirect( __MODULE__ .  "/Login/index");
	            break;
	    }
	}
	
	/**
	 * 模板显示 调用内置的模板引擎显示方法，
	 * @access protected
	 * @param string $templateFile 指定要调用的模板文件
	 * 默认为空 由系统自动定位模板文件
	 * @param string $charset 输出编码
	 * @param string $contentType 输出类型
	 * @param string $content 输出内容
	 * @param string $prefix 模板缓存前缀
	 * @return void
	 */
	protected function display($templateFile='',$charset='',$contentType='',$content='',$prefix='') {
	    if($this->_isDisplay === false) return false;
	    $this->view->display($templateFile,$charset,$contentType,$content,$prefix);
	}
	
	protected function _disableDisplay() {
	    $this->_isDisplay = false;
	}
	
	/**
	 * 处理模板变量.
	 * 
	 * 该动作在赋值完默认的模板变量后和执行增删改动作之前执行，
	 * 一般用作处理一些常用的语言包字符串替换工作，
	 * 和增删该的相关数据处理工作。
	 * 
	 * @param array $data 数据数组
	 * @param string $fromAction 调用于的控制器名称
	 */
	abstract protected function _disposeData(& $data, $fromAction = null);
	
	/**
	 * 设置map变量.
	 */
	protected function _setMap($map) {
	    $this->_map = $map;
	}
	
	/**
	 * 返回map变量.
	 */
	protected function _getMap() {
	    return $this->_map;
	}
	
	/**
	 * 设置order变量.
	 */
	protected function _setOrder($order) {
	    $this->_order = $order;
	} 
	
	/**
	 * 返回order变量.
	 */
	protected function _getOrder() {
	    return $this->_order;
	}
	
	/**
	 * 重新赋值.
	 */
	protected function _assignData() {
	    $this->assign('data', $this->_data);
	}
	
}