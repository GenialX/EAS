<?php 
use Think\Log;
use Common\Library\Int\Model\AdminModel;
/**
 * 获取配置信息.
 *
 * @param string $filename Conf文件夹中的配置文件名称
 *
 * @return array
 */
function get_config($filename = 'Web.ini', $isArr = false, $process_sections = true) {
    $arr        = explode("/", $filename);
    $filename   = "";
    foreach ($arr as $k => $v) {
        $filename .= ucwords(strtolower($v)) . "/";
    }
    $filename = rtrim($filename, "/");
    $filename = dirname(dirname(dirname((dirname(dirname(__FILE__)))))) . "/Conf/{$filename}";
    if(!file_exists($filename)) {
        return array();
    }
    if($isArr === false) {
        $result = parse_ini_file($filename, $process_sections);
    } else {
        $result = require $filename;
    }
    return ($result == false || !is_array($result)) ? array() : $result;
}

/**
 * 获取语言包.
 * 
 * @param string $filename
 * @param string $lang
 * @param bool   $isArr 
 * @param string $process_sections
 * 
 * @return array
 */
function get_lang($filename = 'Web/Common.php', $lang = 'ZH-CN', $isArr = false, $process_sections = true) {
    $arr        = explode("/", $filename);
    $filename   = "";
    foreach ($arr as $k => $v) {
        $filename .= ucwords(strtolower($v)) . "/";
    }
    $filename = rtrim($filename, "/");
    $filename = dirname(dirname(dirname((dirname(dirname(__FILE__)))))) . "/I18N/{$lang}/{$filename}";
    if(!file_exists($filename)) {
        return array();
    }
    if($isArr === false) {
        $result = parse_ini_file($filename, $process_sections);
    } else {
        $result = require $filename;
    }
    return ($result == false || !is_array($result)) ? array() : $result;
}

/**
 * 判断是否登陆.
 *
 * @author genialx
 * @param string $type 用户类型
 * @return boolean
 */
function is_log() {
    $key = AdminModel::ADMIN_SESSION_ID;
    return session("?{$key}");
}

/**
 * 获取当前登录的管理员ID.
 *
 * @return mixed|boolean
 */
function get_admin_id() {
    $key = AdminModel::ADMIN_SESSION_ID;
    if(session("?{$key}")) return session("{$key}");
    return false;
}

/**
 * 设置登陆标记（session）.
 *
 * @author genialx
 * @param string $id ID的类型
 * @return boolean
 */
function set_log($id = null) {

    if(!isset($id)) return false;
    
    /** ID **/
    $key = AdminModel::ADMIN_SESSION_ID;
    if(session("?{$key}")) session($key, null);
    Log::record("[SESSION] index: {$key} value: {$id}", Log::INFO);
    session($key, $id);
    
    /** Type **/
    $type = AdminModel::ADMIN_SESSION_TYPE;
    $data = D('admin')->field('type')->where(array('id' => $id))->find();
    if(session("?{$type}")) session($type, null);
    Log::record("[SESSION] index: {$type} value: {$data['type']}", Log::INFO);
    session($type, $data['type']);
    
    return true;
}

/**
 * 登出.
 * @author genialx
 * @param string $id
 * @return boolean
 */
function log_out() {
    $key    = AdminModel::ADMIN_SESSION_ID;
    $type   = AdminModel::ADMIN_SESSION_TYPE;
    if(session("?{$key}")) session($key, null);
    if(session("?{$type}")) session($type, null);
    return true;
}

/**
 * Login action.
 *
 * @param string $username
 * @param string $userpass
 * @param string $type
 * @return boolean
 */
function login($username, $userpass) {
    $data = D('admin')->field('id')->where(array('account'=>$username, 'password'=>$userpass))->find();
    if(count($data) > 0) return set_log($data['id']);
    return false;
}

/**
 * Get now time format 'Y-m-d H:i:s'
 *
 */
function get_now_time() {
    return date("Y-m-d H:i:s", time());
}

/**
 * 拿到当前用户类型的名字.
 * 
 * @return string
 */
function get_admin_type_name() {
    $config = get_config('Web.ini');
    $type = session(AdminModel::ADMIN_SESSION_TYPE);
    switch($type) {
        case AdminModel::ADMIN_SESSION_STUDENT_TYPE:
            return C("LANG_ADMIN_SESSION_STUDENT_TYPE_NAME") ;
        break;
        case AdminModel::ADMIN_SESSION_TEACHER_TYPE:
            return C("LANG_ADMIN_SESSION_TEACHER_TYPE_NAME");
        break;
        default:
            return "";
            break;
    }
}

/**
 * 打印函数.
 *
 */
function p($v, $exit = false) {
    echo "<pre>" . print_r($v,true) . "</pre>";
    if($exit) exit;
}