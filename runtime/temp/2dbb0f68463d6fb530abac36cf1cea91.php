<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:106:"D:\phpstudy_pro\WWW\tp5-rbac-api\tp5-rbac-api/application/assessment\view\personal\userstocompanysave.html";i:1615793557;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>员工信息公司维护</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="__LAYUI__/css/layui.css"  media="all">
  <script src="__JS__/jquery.min.js"></script>
  <script src="__LAYUI__/layui.js" charset="utf-8"></script>
  <style>
    .layui-form-label{width: 100px;}
  </style>
  <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
</head>
<body>

<form class="layui-form" action="" method="post" data-type="ajax" lay-filter="myselect">

  <div class="layui-form-item">

  </div>


  <div class="layui-form-item">
    <label class="layui-form-label">公司名称：</label>
    <div class="layui-input-inline">
      <input type="text" name="name"  placeholder="组织名称" value="<?php echo $info['name']; ?>" autocomplete="off" class="layui-input" style="width: 270px;">
    </div>
  </div>


  <div class="layui-form-item">
    <label class="layui-form-label">职位状态：</label>
    <div class="layui-input-block">
        <?php if($info['status'] == '启用'): ?>
            <input type="radio" name="status" value="启用" title="启用" checked="">
            <input type="radio" name="status" value="关闭" title="关闭">
        <?php elseif($info['status'] == '关闭'): ?>
            <input type="radio" name="status" value="启用" title="启用">
            <input type="radio" name="status" value="关闭" title="关闭" checked="">
        <?php else: ?>
            <input type="radio" name="status" value="启用" title="启用" checked="">
            <input type="radio" name="status" value="关闭" title="关闭">
        <?php endif; ?>
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">排序：</label>
    <div class="layui-input-inline">
      <input type="text" name="sort"  placeholder="排序" value="<?php echo $info['sort']; ?>" autocomplete="off" class="layui-input" style="width: 270px;">
    </div>
  </div>

  <div class="layui-form-item">
    <div class="layui-input-block">
      <input type="hidden" name='id' value="<?php echo $info['id']; ?>">
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
layui.use(['layer', 'form'], function(){
    var layer = layui.layer,
    form = layui.form;

    // 省级城市获取市级城市
    // form.on('select(college)', function (data) {
    //      var province=$("select[name=province").val();
    //      var htmls = '<option value="">--请选择--</option>';
    //      $.ajax({
    //      		url: '<?php echo url("getCity"); ?>',
    //         data:{province:province},
    //      		type: "post",
    //      		dataType : "json",
    //      		contentType : "application/json",
    //         headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    //      		async: false,//这得注意是同步
    //      		success: function (result) {
    //            var data = result.data;
    //      		   for(var x in data){
    //      			      htmls += '<option value = "' + data[x].name + '">' + data[x].name + '</option>';
    //      		   }
    //            $("select[name=city]").empty();
    //            $("select[name=city]").append(htmls);
    //            form.render('select');
    //      		}
    //    	});
    //
    // })
});
</script>

</body>
</html>
