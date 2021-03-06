<?php
namespace Common\Library\Data\Student;
use Common\Library\Int\Model\AdminModel;
use Common\Library\Int\Model\EquipmentModel;
class AppointmentData {
    
    public static function delete() {
        $ids    = I("get.ids", 0);
        $ids    = trim($ids, ",");
        M('appointment_reply')->delete($ids);
    }
    
    public static function manage(& $data) {
        foreach ($data['list'] as $k => $v) {
            $data['list'][$k]['status'] = get_appointment_status($v['status']);
        }
    }
    
    public static function add(& $data) {
        $admin_id = get_admin_id();
        $data['teacher'] = M("admin")->where(array("type" => AdminModel::ADMIN_SESSION_TEACHER_TYPE))->select();
        
        $data['equipment'] = M("equipment")
                                ->where(array(
                                    "status"=>EquipmentModel::STATUS_AVAILABLE, 
                                    'left_count' => array('gt',0)))
                                ->select();
    }
    
    public static function doDefault(& $data = null) {}
}