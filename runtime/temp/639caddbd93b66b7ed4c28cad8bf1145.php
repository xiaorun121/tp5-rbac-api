<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:98:"D:\phpstudy_pro\WWW\tp5-rbac-api\tp5-rbac-api/application/assessment\view\menu\publicsavemenu.html";i:1615534368;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>菜单维护</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="__LAYUI__/css/layui.css"  media="all">
  <style>
    .layui-form-label{width: 90px;}
  </style>
  <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
</head>
<body>

<form class="layui-form" action="<?php echo url('publicsavemenu'); ?>" method="post" data-type="ajax">

  <div class="layui-form-item">

  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">菜单名称：</label>
    <div class="layui-input-inline">
      <!-- <input type="text" name="username" placeholder="请输入用户名" autocomplete="off" class="layui-input"> -->
      <input type="text" name="name" lay-verify="required" value="<?php if($getInfo['name']): ?><?php echo $getInfo['name']; endif; ?>" lay-reqtext="菜单名称是必填项，岂能为空？" placeholder="请输入用户名" autocomplete="off" class="layui-input" style="width: 270px;">
    </div>
    <!-- <div class="layui-form-mid layui-word-aux">请填写6到12位密码</div> -->
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">父级菜单：</label>
    <div class="layui-input-inline">
      <select name="parent_id" lay-search>
        <option value="0">父级菜单</option>
        <?php if(is_array($menuinfo) || $menuinfo instanceof \think\Collection || $menuinfo instanceof \think\Paginator): $i = 0; $__LIST__ = $menuinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
            <option value="<?php echo $v['id']; ?>" <?php if($getInfo['parent_id'] == $v['id']): ?>selected<?php endif; ?>><?php echo str_repeat('- - ',$v["level"]);?><?php echo $v['name']; ?></option>
        <?php endforeach; endif; else: echo "" ;endif; ?>
      </select>
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">模块名称：</label>
    <div class="layui-input-inline">
      <input type="text" name="module_name"  placeholder="模块名称" value="<?php if($getInfo['module_name']): ?><?php echo $getInfo['module_name']; endif; ?>" autocomplete="off" class="layui-input" style="width: 270px;">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">控制器名称：</label>
    <div class="layui-input-inline">
      <input type="text" name="controller_name"  placeholder="控制器名称" value="<?php if($getInfo['controller_name']): ?><?php echo $getInfo['controller_name']; endif; ?>" autocomplete="off" class="layui-input" style="width: 270px;">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">方法名称：</label>
    <div class="layui-input-inline">
      <input type="text" name="view_name"  placeholder="方法名称" value="<?php if($getInfo['view_name']): ?><?php echo $getInfo['view_name']; endif; ?>" autocomplete="off" class="layui-input" style="width: 270px;">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">是否菜单：</label>
    <div class="layui-input-block">
        <?php if($getInfo['is_menu'] == '1'): ?>
            <input type="radio" name="is_menu" value="1" title="是" checked="">
            <input type="radio" name="is_menu" value="0" title="否">
        <?php elseif($getInfo['is_menu'] == '0'): ?>
            <input type="radio" name="is_menu" value="1" title="是">
            <input type="radio" name="is_menu" value="0" title="否" checked="">
        <?php else: ?>
            <input type="radio" name="is_menu" value="1" title="是" checked="">
            <input type="radio" name="is_menu" value="0" title="否">
        <?php endif; ?>
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">排序：</label>
    <div class="layui-input-inline">
      <input type="text" name="sort" value="<?php if($getInfo['sort']): ?><?php echo $getInfo['sort']; endif; ?>" autocomplete="off" class="layui-input" style="width: 270px;">
      <label>升序排序</lable>
    </div>
  </div>

  <div class="layui-form-item">
    <div class="layui-input-block">
      <input type="hidden" name="id" value="<?php if($getInfo['id'] != 0): ?><?php echo $getInfo['id']; endif; ?>">
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

});
</script>

</body>
</html>
