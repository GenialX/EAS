<?php
return array (

        /* KEYWORDS */
        'LANG_LOGIN'	    => '登陆',
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
						'name' => '内容',
						'controller' => 'Content',
						'action' => 'index',
						'icon_class' => 'fa fa-archive',
						'sub_map' => array(
								1 => array(
										'name' => '文章',
										'controller' => 'Post',
										'action' => 'index',
										'icon_class' => 'fa fa-book',
										'sub_map' => array(
												1 => array(
														'name' => '管理文章',
														'controller' => 'Post',
														'action' => 'manage',
														'icon_class' => 'fa fa-list-ol',
														'sub_map' => array(),
												),
												2 => array(
														'name' => '撰写新文章',
														'controller' => 'Post',
														'action' => 'add',
														'icon_class' => 'fa fa-pencil-square-o',
														'sub_map' => array(),
												),
										),
								),
								2 => array(
										'name' => '页面',
										'controller' => 'Page',
										'action' => 'index',
										'icon_class' => 'fa fa-file-text-o',
										'sub_map' => array(
												1 => array(
														'name' => '页面管理',
														'controller' => 'Page',
														'action' => 'manage',
														'icon_class' => 'fa fa-list-ol',
														'sub_map' => array(),
												),
												2 => array(
														'name' => '新增页面',
														'controller' => 'Page',
														'action' => 'add',
														'icon_class' => 'fa fa-pencil-square-o',
														'sub_map' => array(),
												),
										),
								),
								3 => array(
										'name' => '栏目',
										'controller' => 'Category',
										'action' => 'index',
										'icon_class' => 'fa fa-th-list',
										'sub_map' => array(
												1 => array(
														'name' => '栏目管理',
														'controller' => 'Category',
														'action' => 'manage',
														'icon_class' => 'fa fa-list-ol',
														'sub_map' => array(),
												),
												2 => array(
														'name' => '新增栏目',
														'controller' => 'Category',
														'action' => 'add',
														'icon_class' => 'fa fa-pencil-square-o',
														'sub_map' => array(),
												),
										),
								),
						),
			),
			3 => array(
						'name' => '反馈',
						'action' => 'index',
						'controller' => 'Feedback',
						'icon_class' => 'fa fa-envelope-o',
						'sub_map' => array(
								1 => array(
										'name' => '留言',
										'controller' => 'Comment',
										'action' => 'manage',
										'icon_class' => 'fa fa-comments-o',
										'sub_map' => array(),
						),
				),
			),
			4 => array(
						'name' => '设置',
						'action' => 'index',
						'controller' => 'Setting',
						'icon_class' => 'fa fa-cogs',
						'sub_map' => array(
								1 => array(
										'name' => '网站',
										'controller' => 'Site',
										'action' => 'index',
										'icon_class' => 'fa  fa-desktop',
										'sub_map' => array(),
								),
								2 => array(
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
		'LANG_MY_PROFILE' => '个人资料',
		'LANG_MY_MESSAGES' => '消息中心',
		'LANG_LOCK_SCREEN' => '锁定后台',
		'LANG_LOG_OUT' => '退出',
		'LANG_QUICK_ENTRANCE' => '快捷入口',
		'LANG_LAST_REPLY' => '最新回复',
		'LANG_NEW_POST' => '新增文章', 
		'LANG_NEW_PAGE' => '新增页面',
		'LANG_NEW_CATEGORY' => '新增栏目',
		'LANG_SETTING_SITE' => 'SEO设置',
		
		/* Common */
		'LANG_ONE_KEY_DELETE'       => '一键删除',
		
		/* Illegal Controller */
		'LANG_ILLEGAL_WELCOME'	    => '抱歉，您的版本不是完整版，请联系管理员！',
		
		/* Login controller */
		'LANG_LOGIN_WELCOME' 		=> '欢迎您来到<em>EAS</em>系统后台！',
		'LANG_WELCOME_SUB'        	=> '请输入您的用户名和密码来登陆。',
		'LANG_FORGOT_PASSWORD'      => '忘记密码?',
		'LANG_KEEP_SIGNED'			=> '记住我',
		'LANG_CREATE_ACCOUNT'		=> "还没有账户？<a href=\"#\" class=\"register\">创建账户</a>",
		'LANG_LOGIN_ERROR'			=> "貌似有些问题，请仔细检查下再试喔！",
		'LANG_ENTER_EMAIL' 			=> "请在下方输入框输入您的邮件地址来获取新密码！",
		'LANG_LOGIN_SUCCESSFULLY'	=> "登陆成功",
		'LANG_LOGIN_FAILED'			=> "用户名或密码错误",
		'LANG_EMAIL_SENT'			=> "重置密码已发送到指定邮箱，请查收！",
		'LANG_EMAIL_NOT_SENT'		=> "邮件地址错误，请检查后再试。",
		'LANG_LOG_OUT_SUCCESSFULLY' => "登出成功",
		'LANG_TO_UNLOCK'		    => "请输入密码解锁",
		'LANG_NOT_ME'				=> "我不是",
		
		/* Index controller */
		
		/* Post manage */
		'LANG_COMMENT_COUNT' => '回复数',
		'LANG_POST_CREATE_TIME' => '撰写时间',
		
);