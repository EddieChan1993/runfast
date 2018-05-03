<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/5
 * Time: 17:51
 */
return [
    'app_debug' =>true,
    //异常页面,调试模式关闭的时候显示模板
    'exception_tmpl'         => ROOT_PATH.'public'.DS.'admin/alpha/404.html',

    // 默认模块名
    'default_module' => 'admin',
    //默认跳转
    'controller'=>'admin',
    'action'=>'home_page',

    //自定义日志文件
    'log_path'     => './data/runtime/log/',
    //图片压缩比例
    'img_px' => 600,

    // 视图输出字符串内容替换
    'view_replace_str' => [
        '__ROOT__' => $basename,
        '__ADDONS__' => $basename . '/addons',

        '__PUBLIC__' => $basename . '/public',
        '__UPLOAD__' => $basename . '/data/upload',
        '__ADMIN__' => '/public/admin/alpha',
        '__HOME__' => $basename . '/public/home',

    ],
    //权限配置
    'auth_config' => [
        'auth_on' => true,           // 认证开关
        'auth_type' => 1,            // 认证方式，1为实时认证；2为登录认证。
        'auth_group' => 'role',      // 角色表
        'auth_group_access' => 'role_user', // 用户-角色关系表
        'auth_rule' => 'menu',       // 权限规则表
        'auth_user' => 'auth_user',  // 用户信息表
        'auth_open_id' => []        //不需要验证的管理员id
    ],
    //自定义分页
    'my_page' => [
        'pages_nums' => 15,//分页按钮条数
        'list_nums' => 10,//每页显示条数
    ],
];