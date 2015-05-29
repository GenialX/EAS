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
    
    /** DB配置 **/
    'DB_DEPLOY_TYPE'        => $config['DB']['DEPLOY_TYPE'],
    'DB_RW_SEPARATE'        => $config['DB']['RW_SEPARATE'],
    'DB_TYPE'               => $config['DB']['TYPE'],
    'DB_HOST'               => $config['DB']['HOST'],
    'DB_NAME'               => $config['DB']['NAME'],
    'DB_USER'               => $config['DB']['USER'],
    'DB_PWD'                => $config['DB']['PWD'],
    'DB_PORT'               => $config['DB']['PORT'],
    'DB_PREFIX'             => $config['DB']['PREFIX'],
    'DB_CHARSET'            => $config['DB']['CHARSET'],
    
    /** 视图配置 **/
    'TMPL_PARSE_STRING'     =>  array(
        '__STATIC__' => $config['PATH']['STATIC'],
    ),    
    
    /** 路由配置 **/
    'URL_HTML_SUFFIX'       => $config['URL']['HTML_SUFFIX'],
    
    /** API配置 **/
    'API_EAS'               => $config['API']['EAS'],
    
);
/** 语言包 **/
$result = array_merge($lang, $result);
return $result; 