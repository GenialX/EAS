<?php
use Module\Web\Go;
/**
 * EAS - 自动化工程实训中心网上预约系统(胡旭的沈阳化工大学2015届本科毕业设计作品).
 *
 * WEB层入口文件。
 * 
 * @author      GenialX <admin@ihuxu.com>
 * @copyright   Copyright 2014-2015 沈阳晨信网络科技有限公司
 * @license     GNU Library General Public License 3.0
 */
require './Module/BootStrap.class.php';
require './Module/Web/Go.class.php';
if(!defined("EAS_MODE")) define("EAS_MODE", "WEB");
new Go();