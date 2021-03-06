<?php
namespace Student\Controller;
use Common\Controller\CommonController;
use Common\Library\Data\Student\AppointmentData;
use Common\Library\Util\UploadHandler;
/**
 * 学生预约控制器.
 */
class AppointmentController extends CommonController {
    
    public function __construct() {
        parent::__construct();
        $this->_validate();
        $this->_assign();
    }
    
    public function manage($isRelation = true, $table = 'Appointment') {
        $map = array('student_id' => get_admin_id());
        $order = "c_time desc, id desc";
        $this->_setMap($map);
        $this->_setOrder($order);
        parent::manage($isRelation, $table);
    }
    
    public function delete($isRelation = false, $table = 'Appointment') {
        $result = parent::delete($isRelation, $table); 
        if($result) {
            $this->success(C("LANG_DELETE") . C("LANG_SUC"), __MODULE__ . "/Appointment/manage");
        } else {
            $this->error(C("LANG_DELETE") . C("LANG_FAIL"));
        }
    }
    
    /**
     * 插入数据.
     * 
     * @see \Common\Controller\CommonController::insert()
     */
    public function insert($isRelation = false, $table = 'Appointment') {}
    
    public function upload() {
        new UploadHandler();
    }
    
    protected function _disposeData(& $data, $fromAction = null) {
        switch(ACTION_NAME) {
            case 'manage':
                if(isset($fromAction) and $fromAction === '_list') {
                    AppointmentData::manage($data);
                }
                break;
            case 'add' :
                if(isset($fromAction)) {
                    AppointmentData::add($data);
                } 
                break;
            default:
                AppointmentData::doDefault();
                break;
        }
    }
    
    protected function _after_delete() {
        switch(ACTION_NAME) {
            case 'delete':
                    AppointmentData::delete();
                break;
            default:
                    AppointmentController::doDefualt();
                break;
        }
    }
}