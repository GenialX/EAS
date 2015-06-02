<?php
return array (

        /* KEYWORDS */
        'LANG_LOGIN'        => '登陆',
        'LANG_USERNAME'     => '用户名',
        'LANG_PASSWORD'     => '密码',
        'LANG_SUBMIT'       => '提交',
        'LANG_EMAIL'        => '邮件',
        'LANG_WELCOME'      => '欢迎您',
        'LANG_DASHBOARD'    => '起始页',
        'LANG_ONLINE'       => '在线',
        'LANG_OFFLINE'      => '离线',
        'LANG_STATUS'       => '状态',
        'LANG_ADMIN'        => '后台',
        'LANG_EDIT'         => '编辑',
        'LANG_ARTICLE'      => '文章',
        'LANG_PAGE'         => '页面',
        'LANG_CATEGORY'     => '栏目',
        'LANG_SITE'         => '网站',
        'LANG_SAVE'         => '保存',
        'LANG_PHOTO'        => '图像',
        'LANG_TITLE'        => '标题',
        'LANG_CATEGORY'     => '分类',
        'LANG_DELETE'       => '删除',
        'LANG_COLLAPSE'     => '收起',
        'LANG_FULLSCREEN'   => '全屏',
        'LANG_EXPAND'       => '展开',
        'LANG_LOADING'      => '加载中...',
        'LANG_TEACHER'      => '教师',
        'LANG_ACTION'       => '操作',
        'LANG_REMOVE'       => '删除',
        'LANG_BATCH'        => '批量',
        'LANG_PARAM'        => '参数',
        'LANG_ERR'          => '错误',
        'LANG_FAIL'         => '失败',
        'LANG_SUC'          => '成功',
        
        /* APP INFO */
        'LANG_APP_VERSION'  => '版本 1.0.0_dev',
        'LANG_COPYRIGHT'    => '2014-2015 &copy; <a href="http://www.echenxin.com" target="_blank">沈阳晨信网络科技有限公司</a>.',
        'LANG_APP_NAME'     => 'EAS',
    
        /* Action name of controller */
        'LANG_ADMIN_CONTROLLER_MAP' => array(
            1 => array(
                    'name' => '起始页',
                    'controller' => 'Index',
                    'action' => 'index',
                    'icon_class' => 'fa fa-home',
                    'sub_map' => array(),
            ),
            2 => array(
                        'name' => '实验预约',
                        'controller' => 'Appointment',
                        'action' => 'manage',
                        'icon_class' => 'fa fa-archive',
                        'sub_map' => array(
                              1 => array(
                                  'name'          => '预约管理',
                                  'controller'    => 'Appointment',
                                  'action'        => 'manage',
                                  'icon_class'    => 'fa fa-list',
                                  'sub_map'       => array(),  
                              ),
                              2 => array(
                                  'name'          => '申请预约',
                                  'controller'    => 'Appointment',
                                  'action'        => 'add',
                                  'icon_class'    => 'fa fa-envelope-o',
                                  'sub_map'       => array(),  
                              ),
                        ),
            ),
            3 => array(
                        'name' => '设置',
                        'action' => 'index',
                        'controller' => 'Setting',
                        'icon_class' => 'fa fa-cogs',
                        'sub_map' => array(
                                1 => array(
                                        'name' => '个人资料',
                                        'controller' => 'Profile',
                                        'action' => 'index',
                                        'icon_class' => 'fa fa-user',
                                        'sub_map' => array(),
                                ),
                ),
            ),
        ),
        
        /* top bar tpl */
        'LANG_MY_PROFILE'     => '个人资料',
        'LANG_MY_MESSAGES'    => '消息中心',
        'LANG_LOCK_SCREEN'    => '锁定后台',
        'LANG_LOG_OUT'        => '退出',
        'LANG_QUICK_ENTRANCE' => '快捷入口',
        'LANG_LAST_REPLY'     => '最新回复',
        'LANG_NEW_POST'       => '新增文章', 
        'LANG_NEW_PAGE'       => '新增页面',
        'LANG_NEW_CATEGORY'   => '新增栏目',
        'LANG_SETTING_SITE'   => 'SEO设置',
        
        /* Common */
        'LANG_ONE_KEY_DELETE'                  => '一键删除',
        'LANG_ADMIN_SESSION_STUDENT_TYPE_NAME' => '同学',
        'LANG_ADMIN_SESSION_TEACHER_TYPE_NAME' => '教师',
        'LANG_NOT_AUDIT'                       => '未审核',
        'LANG_AUDIT'                           => '已审核',
        'LANG_TO_IMPROVE'                      => '待完善',  
        
        /* Illegal Controller */
        'LANG_ILLEGAL_WELCOME'        => '抱歉，您的版本不是完整版，请联系管理员！',
        
        /* Login controller */
        'LANG_LOGIN_WELCOME'         => '欢迎您来到<em>EAS</em>系统后台！',
        'LANG_WELCOME_SUB'            => '请输入您的用户名和密码来登陆。',
        'LANG_FORGOT_PASSWORD'      => '忘记密码?',
        'LANG_KEEP_SIGNED'            => '记住我',
        'LANG_CREATE_ACCOUNT'        => "还没有账户？<a href=\"#\" class=\"register\">创建账户</a>",
        'LANG_LOGIN_ERROR'            => "貌似有些问题，请仔细检查下再试喔！",
        'LANG_ENTER_EMAIL'             => "请在下方输入框输入您的邮件地址来获取新密码！",
        'LANG_LOGIN_SUCCESSFULLY'    => "登陆成功",
        'LANG_LOGIN_FAILED'            => "用户名或密码错误",
        'LANG_EMAIL_SENT'            => "重置密码已发送到指定邮箱，请查收！",
        'LANG_EMAIL_NOT_SENT'        => "邮件地址错误，请检查后再试。",
        'LANG_LOG_OUT_SUCCESSFULLY' => "登出成功",
        'LANG_TO_UNLOCK'            => "请输入密码解锁",
        'LANG_NOT_ME'                => "我不是",
        
        /* Index controller */
        
        /* Post manage */
        'LANG_COMMENT_COUNT'          => '回复数',
        'LANG_POST_CREATE_TIME'       => '撰写时间',
    
        /* Student Index */
        'LANG_SI_WELCOME_TITLE'       => '欢迎来到EAS管理中心',
        'LANG_SI_WELCOME_CONTENT'     => "
            欢迎您，%s。这里是“自动化工程实训中心实验预约系统”的管理后台。                                
        ",
        'LANG_SI_EAS_NEWS_TITME'      => "官方公告",
    
        /* Student Appointment */
        'LANG_SA_MANAGE_TITLE'        => "预约管理",
        'LANG_SA_MANAGE_ITEM_TITLE'   => '实验标题',
        'LANG_SA_MANAGE_ITEM_TIME'    => '预约时间',
        'LANG_SA_MANAGE_ITEM_STATUS'  => '审核状态',  
        
);