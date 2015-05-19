<?php
namespace Module;
abstract class BootStrap {
    
    protected $config = array();
    
    /**
     * 构造函数.
     */
    public function __construct() {
        /** 配置 **/
        $this->_iniConfig();
        /** 调用子类处理 **/
        $this->_go();
        /** 启动TP **/
        $this->_startTP();
    }
    
    /**
     * 启动ThinkPHP.
     */
    private function _startTP() {
        // 检测PHP环境
        if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');
        // 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
        define('APP_DEBUG', $this->config['APP']['DEBUG']);
        // 定义应用目录
        define('APP_PATH', dirname(__FILE__) . "/" . ucwords(strtolower(EAS_MODE)) . "/");
        // 引入ThinkPHP入口文件
        require dirname(dirname(__FILE__)) . '/System/ThinkPHP.php';
    }
     
    /**
     * 获取配置文件.
     * 
     * @return void
     */
    private function _iniConfig() {
        $filename     = strtolower(EAS_MODE);
        $filepath     = dirname(dirname(__FILE__)) . "/Conf/{$filename}.ini";
        $this->config = parse_ini_file($filepath, true);
    }
    
    /** Methods need extending **/
    
    abstract protected function _go();
    
}