<?php

phpinfo();exit; 
$memcache = new Memcache();
$memcache->connect('127.0.0.1',11211) or die('shit');

$memcache->set('key','hello memcache!');

$out = $memcache->get('key');

echo $out;
