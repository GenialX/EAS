<?php
namespace Common\Model;
use Think\Log;
use Think\Model\RelationModel;
class AdminModel extends RelationModel {
	
	public function __construct() {
		$this->_dispose();
		parent::__construct();
	}
	protected $_map = array( );
	
	private function _dispose() {
		
	}
}