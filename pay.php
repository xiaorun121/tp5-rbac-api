<?php
interface single{
    public function config();
}

class WechatPay{
    public function config(){
        return '微信支付';
    }
}

class AliPay{
    public function config(){
        return '支付宝支付';
    }
}

class pay implements single{
    public $payobj;

    public function __construct($obj)
    {
        $this->payobj = $obj;
    }

    public function config(){
        // 通过微信，支付宝支付类实现的类实现的
        echo $this->payobj->config();
    }
}

$config = new WechatPay();
$payobj = new pay($config);
$payobj->config();