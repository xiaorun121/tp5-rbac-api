<?php
namespace app\index\controller;
use think\cache\driver\Redis;
use think\Cache;

class Index
{
    public function index(){
        $config = [

          'host'      => '127.0.0.1',

          'port'      => 6379,

          'password'  => '',

          'select'    => 0,

          'timeout'    => 0,

          'expire'    => 0,

          'persistent' => false,

          'prefix'    => '',

        ];

        $Redis=new Redis($config);

        $Redis->set("test","test");

        // echo  $Redis->get("test");

        Cache::store('file')->set('name','value');

        echo Cache::get('name');

        // Cache::store('redis')->set('name','value');
        //
        // echo Cache::get('name');
    }
}
