<?php
namespace app\assessment\controller;

use think\Request;
use think\Db;

class Persion extends Common{

    // 员工列表
    public function plist(){
        return view();
    }

    // 员工考核
    public function passessment(){
        $pDate = input('get.pdate');
        if(empty($pDate)){
            $pDate = date('Y',time());
        }
        $this->assign('pDate',$pDate);
        return view();
    }

    // 员工考核类型维护
    public function patype(){
        return view();
    }

    // 员工publics
    public function publics(){
        if(request()->isPost()){
            $inp = input('post.')['inp'];
        }

        $pYear  = input('get.pYear');
        $pMonth = input('get.pMonth');

        $this->assign('pYear',$pYear);
        $this->assign('pMonth',$pMonth);
        return view();
    }

    // public function getPageByProxy()
    // {
    //     $page_url = 'https://www.googleapis.com/youtube/v3/playlistItems?part=snippet%2CcontentDetails&maxResults=50&playlistId=UUpRmvjdu3ixew5ahydZ67uA&key=AIzaSyACtO6xjAqbpjZD46CJyz7dtgCdn5jAOq8';
    //
    //     //$page_url = "http://www.baidu.com";
    //
    //     //代理ip
    //     $proxy = "47.242.128.3";
    //
    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL, $page_url);
    //
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    //
    //     //设置代理
    //     curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
    //     curl_setopt($ch, CURLOPT_PROXY, $proxy);
    //
    //     //自定义header
    //     $headers = array();
    //     $headers[] = 'User-Agent: Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Trident/5.0);';
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    //
    //     //自定义cookie
    //     curl_setopt($ch, CURLOPT_COOKIE,'');
    //
    //     curl_setopt($ch, CURLOPT_ENCODING, 'gzip'); //使用gzip压缩传输数据让访问更快
    //
    //     curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    //     curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    //
    //     curl_setopt($ch, CURLOPT_HEADER, true);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //
    //     $result = curl_exec($ch);
    //     curl_close($ch);
    //
    //     var_dump($result);
    //
    // }
}
