<?php
$config = get_config('Web.ini');
$lang   = get_lang("Web/Common.php", $config['APP']['LANG'], true);
$result = array(
    'DEFAULT_MODULE'        =>  $config['MODULE']['DEFUALT_MODULE'],
    'DEFAULT_CONTROLLER'    =>  $config['MODULE']['DEFAULT_CONTROLLER'],
    'DEFAULT_ACTION'        =>  $config['MODULE']['DEFAULT_ACTION'],
    'URL_MODEL'             =>  $config['MODULE']['URL_MODEL'],
    'SESSION_AUTO_START'    =>  $config['MODULE']['SESSION_AUTO_START'],
    'SHOW_PAGE_TRACE'       =>  $config['APP']['SHOW_PAGE_TRACE'],
    'MANAGE_PAGE_ITEM_COUNT'=>  $config['MODULE']['MANAGE_PAGE_ITEM_COUNT'],
    'CONTROLLER_MODEL_MAP'  =>  $config['MODULE']['CONTROLLER_MODEL_MAP'],
    'LANG'                  =>  $config['APP']['LANG'],
    
    /** 视图配置 **/
    'TMPL_PARSE_STRING' =>  array(
        '__STATIC__' => $config['PATH']['STATIC'],
    ),
);
/** 语言包 **/
$result = array_merge($lang, $result);
return $result; 