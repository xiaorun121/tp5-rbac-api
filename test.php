<?php
$arr = [1,2,4];
foreach ($arr as &$value){
    $value *= 2;
}
$value = [];
$value[0] = 9;
$value[1] = 10;
print_r($arr);
echo '<br>';
print_r($value);

 phpinfo();exit;

//连接本地的 Redis 服务
//// $redis = new Redis();
////  $redis->connect('127.0.0.1', 6379);
////  echo "Connection to server successfully";
////     //设置 redis 字符串数据
////     $redis->set("tutorial-name", "Redis tutorial");
////     // 获取存储的数据并输出
////     echo "Stored string in redis:: " . $redis->get("tutorial-name");
header("Content-type: text/html; charset=utf-8");
$memcache = new Memcache;

$memcache->connect('127.0.0.1',11211);

$memcache->add('var_key','test variable',false,30);

echo $memcache->get('var_key').'<br>';

$memcache->close();
