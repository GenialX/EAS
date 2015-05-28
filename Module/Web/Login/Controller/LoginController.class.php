<?php
namespace Login\Controller;
use Common\Controller\CommonController;
use Common;
use Common\Library\Int\Util\ErrorCode;
/**
 * Login controller.
 * @author genialx
 * 
 * @todo the verify code;record login data.
 *
 */
class LoginController extends CommonController{
	
	public function __construct() {
		parent::__construct();
		$this->_validate();
	}
	
	/**
	 * Echo login page.
	 */
	public function index() {
		$this->display();
	}
	
	/**
	 * Login action.
	 * 
	 * @param string $type
	 */
	public function login() {
		if(!count($_POST)) {
			$this->display('index');
		} else {
			if(login(I('post.ebes0csjd'), I('post.do98jf7hs'))) {
				$this->_goAdmin();
			} else {
				$this->error(C("LANG_LOGIN_FAILED"));
				$this->display('index');
			}
		}
	}
	
	public function logOut() {
		log_out();
		$this->success(C("LANG_LOG_OUT_SUCCESSFULLY"), __MODULE__ . "/Login/index");
	}
	
	public function forgotPassword() {
	    $data['errCode']  = ErrorCode::ERROR_0_CODE;
		$data['errMsg']   = ErrorCode::ERROR_0_MSG;
		$data             = json_encode($data,true);
		echo $data;
		return true;
	}
	
	public function lock() {
		$id = get_admin_id();
		if(!$id) $this->redirect(__MODULE__ . "/Login/index");
		log_out();
		$admin = D("Admin")->where(array("id"=>$id))->find();
		$this->assign("admin", $admin);
		$this->display();
	}
	
	protected function _disposeData(& $data) {}
	
}