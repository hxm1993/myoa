<?php
return array(
    LOAD_EXT_FILE => "getTree",
    /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'myoa',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'oa_',    // 数据库表前缀
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8

	//'配置项'=>'配置值'
    'TMPL_PARSE_STRING' => array(
        '__ADMIN__' => '/Public/Admin',
        '__ADMINCSS__' => '/Public/Admin/css',
        '__ADMINJS__' => '/Public/Admin/js',
        '__ADMINIMG__' => '/Public/Admin/images',
        '__ADMINCONTROLLER__' => '/Public/Admin/Controller',
        '__COMMON__'  => '/Public/Common'
    ),
    // 设置访问模式为重写模式
    'URL_MODEL' => 2,
    //页面Trance
    'SHOW_PAGE_TRACE' =>true,
    // 拒绝访问的模块
    'MODULE_DENY_LIST'      =>  array('Common','Runtime'),
    // 允许访问的模块
    'MODULE_ALLOW_LIST'      =>  array('Admin','Home'),
    // 默认访问的模块
    'DEFAULT_MODULE'        =>  'Admin',  // 默认模块

    'URL_HTML_SUFFIX'       =>  'html',  // URL伪静态后缀设置

    'DEFAULT_CONTROLLER'    =>  'Login', // 默认控制器名称
    'DEFAULT_ACTION'        =>  'login', // 默认操作名称
);