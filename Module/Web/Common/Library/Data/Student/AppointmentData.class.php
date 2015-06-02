<?php
namespace Common\Library\Data\Student;
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
    
    public static function doDefault(& $data = null) {}
}