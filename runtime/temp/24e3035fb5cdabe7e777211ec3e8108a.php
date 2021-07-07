<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:96:"D:\phpstudy_pro\WWW\tp5-rbac-api\tp5-rbac-api/application/assessment\view\login\updpassword.html";i:1615534063;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>用户维护</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="__LAYUI__/css/layui.css"  media="all">
  <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
</head>
<body>

<form class="layui-form" action="<?php echo url('updpassword'); ?>" method="post" data-type="ajax">

  <div class="layui-form-item">

  </div>

  <div class="layui-form-item">
      <label class="layui-form-label">用户名：</label>
          <div class="layui-input-inline">
          <input type="text" name="username" lay-verify="required" lay-reqtext="用户名是必填项，岂能为空？" value="<?php if($info['name']): ?><?php echo $info['name']; endif; ?>" placeholder="请输入用户名" autocomplete="off" class="layui-input" style="width: 270px;">
      </div>
  </div>


  <div class="layui-form-item">
      <label class="layui-form-label">密码：</label>
      <div class="layui-input-inline">
        <input type="password" name="password" value="" lay-verify="required" placeholder="请输入密码" lay-reqtext="密码是必填项，岂能为空？" autocomplete="off" class="layui-input" style="width: 270px;">
      </div>
  </div>

  <div class="layui-form-item">
      <div class="layui-input-block">
          <input type="hidden" name="id" value="<?php if($info['id']): ?><?php echo $info['id']; endif; ?>">
          <button type="submit" class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
          <button type="reset" class="layui-btn layui-btn-primary">重置</button>
          <!-- <a class="layui-btn layui-btn-normal layui-btn-radius" onclick="Back()">返回</a> -->
      </div>
    </div>
</form>

<script src="__HOME__/js/jquery.min.js"></script>
<script src="__ADMIN__/js/plugins/layer/layer.min.js"></script>
<script src="__LAYUI__/layui.js" charset="utf-8"></script>
<script src="__LAYUI__/layer_hplus.js" charset="utf-8"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->

<script>
layui.use(['form'], function(){
  var form = layui.form

});

</script>

</body>
</html>
