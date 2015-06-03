<?php
namespace Common\Controller;
use Think\Controller;
use Common\Library\Util\UploadHandler;
abstract class UploadController extends Controller {
    
    /**
     * 上传文件方法接口.
     */
    public function upload() {
        new UploadHandler();
    }
}