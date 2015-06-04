<?php
namespace Teacher\Controller;
use Common\Controller\CommonController;
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
    
    public function add() {
        $this->display();
    }
    
    public function edit() {}
    
    protected function _disposeData(& $data, $fromAction = null) {
        
    }
    
}