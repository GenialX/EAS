<?php
namespace Common\Library\Data\Student;
/**
 * 学生模块的IndexData控制器.
 */
class IndexData {
    
    public static function index(& $data) {
        /* 处理语言包 */
        $lang = C("LANG_SI_WELCOME_CONTENT");
        $lang = sprintf($lang, get_admin_type_name() . " " .  $data['admin']['nickname']);
        C("LANG_SI_WELCOME_CONTENT", $lang);
        
    }
    
    public static function doDefault(& $data) {}
}