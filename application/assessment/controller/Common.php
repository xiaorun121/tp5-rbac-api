<?php
namespace app\assessment\controller;
use think\Controller;
use think\Session;
use think\Db;
use think\Request;
use app\assessment\model\Permission;
use app\assessment\model\Menu;
use app\assessment\model\Website;

use PHPExcel_IOFactory;
use PHPExcel;


class Common extends Controller
{
		public function _initialize(){

	        // 先假设存在session
	        if(session('user.name')==null){
	            session(null);
	            $this->redirect('login/index');
	        }

	        //请求的URL
	        $url = $this->request->baseUrl();

	        //判断是否以.html结尾
	        if (strrpos($url, '.html') > 0) {
	            $url = substr($url, 0, strrpos($url, '.html'));
	        }

	        $id = session('user.id');
	        $permission = new Permission();
	        $permissions = $permission->get_login_user_permissions($id);

	        array_push($permissions,'/assessment','/assessment/index/index','/assessment/index/content','/assessment/index/info');

	        if (!in_array($url, $permissions)) {
	            if ($this->request->isAjax()) {
	                $array = array(
	                    'status' => false,
	                    'msg' => '没有权限访问该模块:' . $url,
	                );
	                exit(json_encode($array));
	            } else {

	                $u = url('/assessment/index/index');
	                exit("<script type='text/javascript'>alert('没有权限访问该模块');history.go(-1);</script>");
	            }
	        }

	        return view();


	    }

			/* 生成二维码 */
	    public function getQrcode(Request $request){
	        if($request->isPost()){
	            $xh = $request->param('xh');

	            // $pathname = APP_PATH . '/../Public/upload/';
	            // if(!is_dir($pathname)) { //若目录不存在则创建之
	            //     mkdir($pathname);
	            // }

	            vendor('phpqrcode.phpqrcode');//引入类库
	            $value = $this->loginurl.'?xh='.$xh;         //二维码内容
	            $errorCorrectionLevel = 'L';  //容错级别
	            $matrixPointSize = 10;      //生成图片大小
	            //生成二维码图片

	            //设置二维码文件名
	            $filename = 'public/qrcode/'.date('YmdHis',time()).rand(10000,9999999).$xh.'.png';
	            //生成二维码
	            \QRcode::png($value,$filename , $errorCorrectionLevel, $matrixPointSize, 2);

	            $request = Request::instance();
	            $domain = $request->domain(); //根据自己的项目路径适当修改

	            $img = $domain.'/'. $filename;
	            echo json_encode(['img'=>$img,'code'=>200]);
	        }
	    }

		public function bgwscdir($path){
			//如果是目录则继续
			  if(is_dir($path)){
			      //扫描一个文件夹内的所有文件夹和文件并返回数组
			     $p = scandir($path);

			     foreach($p as $val){
			         //排除目录中的.和..
			         if($val !="." && $val !=".."){
			             //如果是目录则递归子目录，继续操作
			             if(is_dir($path.$val)){
			                 //子目录中操作删除文件夹和文件
			                 $this->bgwscdir($path.$val.'\\');
			                 //目录清空后删除空文件夹
			                 @rmdir($path.$val.'\\');
			             }else{
			                 //如果是文件直接删除
			                 unlink($path.$val);
			             }
			         }
			     }
			 }

		}

}
?>
