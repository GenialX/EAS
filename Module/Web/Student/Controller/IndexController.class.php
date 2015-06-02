<?php
namespace Student\Controller;
use Common\Controller\CommonController;
use Common\Library\Data\Student\IndexData;
/**
 * Student Index controller.
 */
class IndexController extends CommonController{
	
	public function __construct() {
		parent::__construct();
		$this->_validate();
		$this->_assign();
	}
	
	public function index() {
	    $this->display();
	}
	
	/**
	 * 处理模板变量数据.
	 * 
	 * @see \Common\Controller\CommonController::_disposeData()
	 */
	protected function _disposeData(& $data, $fromAction = null) {
	    switch(ACTION_NAME) {
	        case 'index':
	            IndexData::index($data);
	            break;
	        default:
	            IndexData::doDefault($data);
	            break;
	    }
	}
}