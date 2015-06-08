<?php
namespace Common\Library\Data\Teacher;
class EquipmentData {
    public static function edit(& $data) {
        /* 参数检验 */
        $id = I("get.id", 0);
        if($id == 0) return false;
        
        /* 数据获取 */
        $item = M("equipment")->where(array("id"=>$id))->find();
        $data['item'] = $item;
    }
    
    public static function manage(& $data) {
        foreach ($data['list'] as $k => $v) {
            $data['list'][$k]['status'] = get_equipment_status($v['status']);
        }
    }
    
    public static function doDefault(& $data) {}
}