<?php
namespace Student\Controller;
use Common\Controller\CommonController;
/**
 * Login controller.
 * @author genialx
 * 
 * @todo the verify code;record login data.
 *
 */
class IndexController extends CommonController{
	
	public function __construct() {
		parent::__construct();
		$this->_validate();
	}
	
	public function index() { echo 'hello world';exit; }
	
	
	
}