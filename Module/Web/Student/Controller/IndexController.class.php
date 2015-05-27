<?php
namespace Student\Controller;
use Common\Controller\CommonController;
/**
 * Student Index controller.
 */
class IndexController extends CommonController{
	
	public function __construct() {
		parent::__construct();
		$this->_validate();
	}
	
	public function index() {
	    $this->display();
	}
	
}