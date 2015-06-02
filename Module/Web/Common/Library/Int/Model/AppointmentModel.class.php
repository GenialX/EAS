<?php
namespace Common\Library\Int\Model;
interface AppointmentModel {
    
    const STATUS_NOT_AUDIT      = 0x01; // 未审核
    const STATUS_AUDIT          = 0x02; // 已审核
    const STATUS_TO_IMPROVE     = 0x03; // 待完善
     
}