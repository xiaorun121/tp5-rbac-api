<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:98:"D:\phpstudy_pro\WWW\tp5-rbac-api\tp5-rbac-api/application/assessment\view\role\publicsaverole.html";i:1615534644;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>角色维护</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="__LAYUI__/css/layui.css"  media="all">
  <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
</head>
<body>

<form class="layui-form" method="post" action="<?php echo url('publicsaverole'); ?>" data-type="ajax">

  <div class="layui-form-item">

  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">角色名称：</label>
    <div class="layui-input-inline">
      <input type="text" name="name" lay-verify="required" value="<?php if($getInfo['name']): ?><?php echo $getInfo['name']; endif; ?>" lay-reqtext="角色名称是必填项，岂能为空？" placeholder="请输入角色名称" autocomplete="off" class="layui-input" style="width: 270px;">
    </div>
  </div>


  <div class="layui-form-item">
    <label class="layui-form-label">描述：</label>
    <div class="layui-input-inline">
      <textarea placeholder="请输入内容" class="layui-textarea" name="description" style="width: 270px;"><?php if($getInfo['desc']): ?><?php echo $getInfo['desc']; endif; ?></textarea>
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">排序：</label>
    <div class="layui-input-inline">
      <input type="text" name="sort" lay-verify="required" value="<?php if($getInfo['sort']): ?><?php echo $getInfo['sort']; endif; ?>" autocomplete="off" class="layui-input" style="width: 270px;">
      <label>升序排序</lable>
    </div>
  </div>

  <div class="layui-form-item">
    <div class="layui-input-block">
      <input type="hidden" name="id" value="<?php if($getInfo): ?><?php echo $getInfo['id']; endif; ?>">
      <button type="submit" class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
      <a  class="layui-btn layui-btn-normal layui-btn-radius" onclick="javascript:history.go(-1);">返回</a>
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

  //监听指定开关
  form.on('switch(switchTest)', function(data){
    layer.msg('用户状态：'+ (this.checked ? '开启' : '禁用'), {
      offset: '6px'
    });
    //layer.tips('温馨提示：请注意开关状态的文字可以随意定义，而不仅仅是ON|OFF', data.othis)
  });

});
</script>

</body>
</html>
