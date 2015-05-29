<?php
namespace Student\Controller;
use Common\Controller\CommonController;
/**
 * 学生预约控制器.
 */
class AppointmentController extends CommonController {
    
    public function __construct() {
        parent::__construct();
        $this->_validate();
        $this->_assign();
    }
    
    public function manage($isRelation = false) {
        parent::manage($isRelation);
    }
    
    protected function _disposeData(& $data) {}
}