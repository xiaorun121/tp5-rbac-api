<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    // +----------------------------------------------------------------------
    // | 应用设置
    // +----------------------------------------------------------------------

    'template'               => [

        // 模板后缀
        'view_suffix'  => 'html',

    ],


    'view_replace_str'  =>  [
        '__PUBLIC__'  =>'/public/home/public',
        '__ROOT__'    => '/',
        '__ADMIN__'   => '/public/static/admin',
        '__UPLOADS__' => '/public/uploads',
        '__HOME__'    => '/public/home/health',
        '__JS__'      => '/public/static/index/js',
        '__LAYUI__'   => '/public/layui',
        '__PY__'      => '/public/pinyin'
    ],
    // 应用调试模式
    'app_debug' => false,

    'app_trace' => false,

    'session'   => [
        'prefix'         => 'assessment',
        'type'           => '',
        'auto_start'     => true,
        'expire'         => ''
    ],

    'http_exception_template'    =>  [
        // 定义404错误的重定向页面地址
        404 =>  APP_PATH.'404.html',
    ],

    'cache'                  => [
        // 驱动方式
        'type'   => 'redis',
        'host'   => '127.0.0.1',
        'port'   => '6379',
        'password' => '',
        // 缓存前缀
        'prefix' => 'qj_',
        // 缓存有效期 0表示永久缓存
        'expire' => 60,
    ],
];
