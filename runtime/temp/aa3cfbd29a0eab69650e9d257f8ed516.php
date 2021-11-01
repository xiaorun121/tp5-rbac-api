<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:104:"D:\phpstudy_pro\WWW\tp5-rbac-api\tp5-rbac-api/application/assessment\view\personnel\personnelupload.html";i:1626426805;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>功能演示一 - 上传组件</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link rel="stylesheet" href="__LAYUI__/css/layui.css" media="all">
  <script src="__HOME__/js/jquery-1.8.2.js"></script>
  <script  src="__LAYUI__/ajaxfileupload.js" media="all" type="text/javascript"></script>
</head>
<body>

  <style>
  .layui-upload-img{width: 92px; height: 92px; margin: 0 10px 10px 0;}
  </style>

  <div class="layui-card layadmin-header">
    <div class="layui-breadcrumb" lay-filter="breadcrumb">

    </div>
  </div>

  <div class="layui-fluid">
    <div class="layui-row layui-col-space15">

      <form artion="<?php echo url('personnelUpload'); ?>" enctype="multipart/form-data" method="post" data-type="ajax" class="layui-form">
          <div class="layui-col-md12">
            <div class="layui-card">
              <div class="layui-card-header">上传文件</div>
              <div class="layui-card-body">
                <input type="file" name="file" id="test-upload-primary">
              </div>
              <div class="layui-card-header">
                <button class="layui-btn" type="submit" lay-submit="" lay-filter="component-form-element">立即提交</button>
                <a  class="layui-btn layui-btn-normal layui-btn-radius" onclick="javascript:history.go(-1);">返回</a>
              </div>
            </div>
          </div>
      </form>


    </div>
  </div>

  <script src="__ADMIN__/js/plugins/layer/layer.min.js"></script>
  <script src="__LAYUI__/layui.js" charset="utf-8"></script>
</body>
<script>
  $(document).on('submit','form[data-type=ajax]',function(){
    //获取数据
    // var url = $(this).attr('action');
    // var data = $(this).serializeArray();//序列化表单元素

    //弹出询问框
    layer.confirm('您确定提交处理吗?',{icon:3, title:'提示'},function(index){
      //异步提交
      $.ajaxFileUpload({
        url:"<?php echo url('personnelUpload'); ?>",
        secureuri :false,
        fileElementId :'test-upload-primary',//file控件id
        dataType:"json",
        success: function (data, status)  //服务器成功响应处理函数
        {
          alert(data);
          alert(status);
            // if(data.status==200 || data.status==202){
            //   layer.open({
            //     content: data.msg,
            //     btn: ['确定'],
            //     shade: 0.1,
            //     icon: icon_num,
            //     yes: function(index, layero){
            //       if(data.url){
            //         window.location.replace(data.url);
            //       }else{
            //         layer.close(index);
            //       }
            //     },
            //     cancel: function(){
            //       if(data.url){
            //         window.location.replace(data.url);
            //       }else{
            //         layer.close();
            //       }
            //     },
            //   });
            // }
        },
        error: function (data, status, e)//服务器响应失败处理函数
        {
          alert(e);
        }
      });
    });
    return false;
  });



</script>
</html>
