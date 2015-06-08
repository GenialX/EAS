<?php
namespace Common\Library\Util;
use Common\Library\Int\Util\ErrorCode;
use Think\Log;
class ErrMsg implements ErrorCode {
    
    private static $code    = 0;
    
    private static $msg     = '';
    
    private static $type    = 'json';
    
    private static $return  = false;
    
    private static $data    = array();
    
    public static function setErrCode($code = 0) {
        self::$code = $code;
        $msg = self::getErrMsgByErrCode($code);
        if($msg != false) {
            self::setErrMsg($msg);
        }
    }
    
    public static function getErrCode() {
        return self::$code;
    }
    
    public static function setErrMsg($msg = '') {
        self::$msg = $msg;
    }
    
    public static function getErrMsg() {
        return self::$msg;
    }
    
    public static function setType($type = 'json') {
        self::$type = $type;
    }
    
    public static function getType() {
        return self::$type;
    }
    
    public static function setReturn($return = false) {
        self::$return = $return;
    }
    
    public static function getReturn() {
        return self::$return;
    }
    
    public function __set($name, $value) {
        self::$data[$name] = $value;
    }
    
    public function __get($name) {
        if(isset(self::$data[$name])) {
            return self::$data[$name];
        } else {
            return '';
        }
    }
    
    public static function echoMsg() {
        switch(self::$type) {
            case 'json':
                self::getJsonMsg();
                break;
            default :
                return '';
                break;
        }
    }
    
    public static function getJsonMsg() {
        $rs = array_merge(array("errCode"=>self::$code, "errMsg"=>self::$msg), self::$data);
        if(self::$return) return json_encode($rs);
        echo json_encode($rs);
    }
    
    private static function getErrMsgByErrCode($code) {
        switch($code) {
            case self::ERROR_0_CODE:
                return self::ERROR_0_MSG;
            break;
            case self::ERROR_N_1_CODE:
                return self::ERROR_N_1_MSG;
            break;
            default:
                return false;
            break;
        }
    }
    
}