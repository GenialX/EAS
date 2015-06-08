<?php
namespace Teacher\Controller;
use Common\Controller\CommonController;
use Common\Library\Util\ErrMsg;
use Common\Library\Int\Util\ErrorCode;
use Think\Log;
use Common\Library\Data\Teacher\EquipmentData;
class EquipmentController extends CommonController {
    
    public function __construct() {
        parent::__construct();
        $this->_validate();
        $this->_assign();
    }
    
    public function manage($isRelation = false, $table = 'Equipment') {
        parent::manage($isRelation, $table);
    }
    
    public function delete($isRelation = false, $table = 'Equipment') {
        $result = parent::delete($isRelation, $table);
        if($result) {
            $this->success(C("LANG_DELETE") . C("LANG_SUC"), __MODULE__ . "/Equipment/manage");
        } else {
            $this->error(C("LANG_DELETE") . C("LANG_FAIL"));
        }
    }
    
    public function insert($isRelation = false, $table = 'Equipment') {
        $isAjax = I("post.isAjax", 0);
        Log::record("isAjax: {$isAjax}", Log::DEBUG);
        $result = parent::insert($isRelation, $table);
        Log::record("result: " . var_export($result, true), Log::DEBUG);
        if($result > 0) {
            if($isAjax == true) {
                ErrMsg::setErrCode(ErrMsg::ERROR_0_CODE);
                ErrMsg::echoMsg();
                return true;
            }
            $this->success(C("LANG_ADD") . C("LANG_SUC"), __MODULE__ . "/Equipment/manage");
        } else {
            if($isAjax == true) {
                ErrMsg::setErrCode(ErrorCode::ERROR_N_1_CODE);
                ErrMsg::echoMsg();
                return false;
            }
            $this->error($result, __MODULE__ . '/Equipment/manage/');
        }
    }
    
    /**
     * 更新操作.
     * 
     * @todo 关联操作和限制
     * @see \Common\Controller\CommonController::update()
     */
    public function update($isRelation = false, $table = 'Equipment') {
        $isAjax = I("post.isAjax", 0);
        $id     = I("post.id", 0);
        $result = parent::update($isRelation, $table);
        Log::record("result: " . var_export($result, true), Log::DEBUG);
        if($result == true) {
            if($isAjax == true) {
                ErrMsg::setErrCode(ErrMsg::ERROR_0_CODE);
                ErrMsg::echoMsg();
                return true;
            } 
            $this->success(C("LANG_EDIT") . C("LANG_SUC"), __MODULE__ . "/Equipment/edit/id/{$id}/");
        } else {
            if($isAjax == true) {
                ErrMsg::setErrCode(ErrorCode::ERROR_N_1_CODE);
                ErrMsg::echoMsg();
                return false;
            }
            $this->error($result, __MODULE__ . '/Equipment/manage/');
        }
    }
    
    protected function _disposeData(& $data, $fromAction = null) {
        switch(ACTION_NAME) {
            case 'edit': 
                if($fromAction == '_assign') EquipmentData::edit($data);
                break;
            case 'manage': 
                if($fromAction == '_list') EquipmentData::manage($data);
                break;
            default:
                break;
        }
    }
    
}