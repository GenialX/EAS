<?php
namespace Common\Model;
use Think\Model\RelationModel; 
class AppointmentModel extends RelationModel {
    protected $_link = array(
        'AppointmentReply' => array(
            'mapping_type' => self::HAS_MANY,
            'mapping_name' => 'reply',
            'foreign_key'  => 'a_id',
            'mapping_order' => 'c_time',
        ),
        
        'Teacher' => array(
            'mapping_type' => self::BELONGS_TO,
            'class_name'   => 'Admin',
            'mapping_name' => 'teacher',
            'foreign_key'  => 'teacher_id',
        ),
        
        'Student' => array(
            'mapping_type' => self::BELONGS_TO,
            'class_name'   => 'Admin',
            'mapping_name' => 'student',
            'foreign_key'  => 'student_id',
        ),
    );
}