<?php
$config = get_config('web.ini');
return array(
    'DEFAULT_MODULE'        =>  $config['MODULE']['DEFUALT_MODULE'],
    'URL_MODEL'             =>  $config['MODULE']['URL_MODEL'],
    'SESSION_AUTO_START'    =>  $config['MODULE']['SESSION_AUTO_START'],
    
    /** 视图配置 **/
    'TMPL_PARSE_STRING' =>  array(
        '__STATIC__' => $config['STATIC']['STATIC_PATH'],
    ),
);