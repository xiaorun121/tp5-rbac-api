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



$objPHPExcel->getActiveSheet(0)->setCellValue('A'.($i+2), $list[$i]['code']);
$objPHPExcel->getActiveSheet(0)->setCellValue('B'.($i+2), $list[$i]['name']);
$objPHPExcel->getActiveSheet(0)->setCellValue('C'.($i+2), $list[$i]['pingyin']);
$objPHPExcel->getActiveSheet(0)->setCellValue('D'.($i+2), $list[$i]['en_name']);
$objPHPExcel->getActiveSheet(0)->setCellValue('E'.($i+2), $list[$i]['sex']);
$objPHPExcel->getActiveSheet(0)->setCellValue('F'.($i+2), $list[$i]['organization']."\t");
$objPHPExcel->getActiveSheet(0)->setCellValue('G'.($i+2), $list[$i]['organization_name']);
$objPHPExcel->getActiveSheet(0)->setCellValue('H'.($i+2), $list[$i]['position_id']);
$objPHPExcel->getActiveSheet(0)->setCellValue('I'.($i+2), $list[$i]['position_name']);
$objPHPExcel->getActiveSheet(0)->setCellValue('J'.($i+2), $list[$i]['rand']."\t");
$objPHPExcel->getActiveSheet(0)->setCellValue('K'.($i+2), $list[$i]['responsibilities']);
$objPHPExcel->getActiveSheet(0)->setCellValue('L'.($i+2), $list[$i]['state']);
$objPHPExcel->getActiveSheet(0)->setCellValue('M'.($i+2), $list[$i]['bgdd']);
$objPHPExcel->getActiveSheet(0)->setCellValue('N'.($i+2), $list[$i]['jobcode']);
$objPHPExcel->getActiveSheet(0)->setCellValue('O'.($i+2), $list[$i]['specialty']);
$objPHPExcel->getActiveSheet(0)->setCellValue('P'.($i+2), $list[$i]['like']);
$objPHPExcel->getActiveSheet(0)->setCellValue('Q'.($i+2), $list[$i]['repty_date']);
$objPHPExcel->getActiveSheet(0)->setCellValue('R'.($i+2), $list[$i]['mobilephone']);
$objPHPExcel->getActiveSheet(0)->setCellValue('S'.($i+2), $list[$i]['officephone']);
$objPHPExcel->getActiveSheet(0)->setCellValue('T'.($i+2), $list[$i]['otherphone']);
$objPHPExcel->getActiveSheet(0)->setCellValue('U'.($i+2), $list[$i]['fax']);
$objPHPExcel->getActiveSheet(0)->setCellValue('V'.($i+2), $list[$i]['email']);
$objPHPExcel->getActiveSheet(0)->setCellValue('W'.($i+2), $list[$i]['office']);
$objPHPExcel->getActiveSheet(0)->setCellValue('X'.($i+2), $list[$i]['report_name']);
$objPHPExcel->getActiveSheet(0)->setCellValue('Y'.($i+2), $list[$i]['assistant']);
$objPHPExcel->getActiveSheet(0)->setCellValue('Z'.($i+2), $list[$i]['birth']);
$objPHPExcel->getActiveSheet(0)->setCellValue('AA'.($i+2), $list[$i]['cn_mz']);
$objPHPExcel->getActiveSheet(0)->setCellValue('AB'.($i+2), $list[$i]['cn_jiguan']);
$objPHPExcel->getActiveSheet(0)->setCellValue('AC'.($i+2), $list[$i]['cn_hk']);
$objPHPExcel->getActiveSheet(0)->setCellValue('AD'.($i+2), $list[$i]['IDcard']);
$objPHPExcel->getActiveSheet(0)->setCellValue('AE'.($i+2), $list[$i]['cn_hy']);
$objPHPExcel->getActiveSheet(0)->setCellValue('AF'.($i+2), $list[$i]['cn_zzmm']);
$objPHPExcel->getActiveSheet(0)->setCellValue('AG'.($i+2), $list[$i]['cn_rutuan_time']);
$objPHPExcel->getActiveSheet(0)->setCellValue('AH'.($i+2), $list[$i]['cn_rudang_time']);
$objPHPExcel->getActiveSheet(0)->setCellValue('AI'.($i+2), $list[$i]['cn_ghhy']);
$objPHPExcel->getActiveSheet(0)->setCellValue('AJ'.($i+2), $list[$i]['cn_zgxl']);
$objPHPExcel->getActiveSheet(0)->setCellValue('AK'.($i+2), $list[$i]['cn_xw']);
$objPHPExcel->getActiveSheet(0)->setCellValue('AL'.($i+2), $list[$i]['cn_jkzk']);
$objPHPExcel->getActiveSheet(0)->setCellValue('AM'.($i+2), $list[$i]['cn_height']);
$objPHPExcel->getActiveSheet(0)->setCellValue('AN'.($i+2), $list[$i]['cn_weight']);
$objPHPExcel->getActiveSheet(0)->setCellValue('AO'.($i+2), $list[$i]['cn_xjzddz']);
$objPHPExcel->getActiveSheet(0)->setCellValue('AP'.($i+2), $list[$i]['cn_sfzdz']);
$objPHPExcel->getActiveSheet(0)->setCellValue('AQ'.($i+2), $list[$i]['cn_zzz_number']);
$objPHPExcel->getActiveSheet(0)->setCellValue('AR'.($i+2), $list[$i]['cn_ygxz']);
$objPHPExcel->getActiveSheet(0)->setCellValue('AS'.($i+2), $list[$i]['cn_htksrq']);
$objPHPExcel->getActiveSheet(0)->setCellValue('AT'.($i+2), $list[$i]['cn_syqjsrq']);
$objPHPExcel->getActiveSheet(0)->setCellValue('AU'.($i+2), $list[$i]['cn_htjsrq']);
$objPHPExcel->getActiveSheet(0)->setCellValue('AV'.($i+2), $list[$i]['cn_khh']);
$objPHPExcel->getActiveSheet(0)->setCellValue('AW'.($i+2), $list[$i]['cn_bank']);
$objPHPExcel->getActiveSheet(0)->setCellValue('AX'.($i+2), $list[$i]['cn_zzkh']);
$objPHPExcel->getActiveSheet(0)->setCellValue('AY'.($i+2), $list[$i]['cn_gjjzh']."\t");
