<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"D:\phpstudy_pro\WWW\shwap/application/assessment\view\position\positionsave.html";i:1615534617;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>职位信息维护</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="/layui/css/layui.css"  media="all">
  <script src="__JS__/jquery.min.js"></script>
  <script src="__LAYUI__/layui.js" charset="utf-8"></script>
  <style>
    .layui-form-label{width: 100px;}
  </style>
  <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
</head>
<body>

<form class="layui-form" action="<?php echo url('positionSave'); ?>" method="post" data-type="ajax" lay-filter="myselect">

  <div class="layui-form-item">

  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">部门：</label>
    <div class="layui-input-inline sjzzdy" style="width:270px;">
      <select name="organization_code" lay-verify="required" lay-reqtext="上级组织单元是必填项，岂能为空？" style="width:270px;" lay-search>
          <?php if(is_array($organizationInfo) || $organizationInfo instanceof \think\Collection || $organizationInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $organizationInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
              <option value="<?php echo $v['code']; ?>" <?php if($info['organization_code'] == $v['code']): ?>selected<?php endif; ?>><?php echo str_repeat('- - ',$v["level"]);?><?php echo $v['name']; ?></option>
          <?php endforeach; endif; else: echo "" ;endif; ?>
      </select>
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">组织编码：</label>
    <div class="layui-input-inline">
      <input type="text" name="code"  placeholder="组织编码" value="<?php echo $info['code']; ?>" autocomplete="off" class="layui-input" style="width: 270px;">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">职位名称：</label>
    <div class="layui-input-inline">
      <input type="text" name="name"  placeholder="组织名称" value="<?php echo $info['name']; ?>" autocomplete="off" class="layui-input" style="width: 270px;">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">主管职位：</label>
    <div class="layui-input-inline">
      <select name="is_executive_position">
          <option value="是" <?php if($info['is_executive_position'] == '是'): ?>selected<?php endif; ?>>是</option>
          <option value="否" <?php if($info['is_executive_position'] == '否'): ?>selected<?php endif; if(!$info['is_executive_position']): ?>selected<?php endif; ?>>否</option>
      </select>
    </div>
  </div>


  <div class="layui-form-item">
    <label class="layui-form-label">上级职位：</label>
    <div class="layui-input-inline">
      <select name="parent_id" lay-search>
        <option value="">--请选择--</option>
        <?php if(is_array($position) || $position instanceof \think\Collection || $position instanceof \think\Paginator): $i = 0; $__LIST__ = $position;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
            <option value="<?php echo $v['code']; ?>" <?php if($info['parent_id'] == $v['code']): ?>selected<?php endif; ?>><?php echo $v['code']; ?>--<?php echo showPositionToOrganization($v['organization_code']); ?>--<?php echo $v['name']; ?></option>
        <?php endforeach; endif; else: echo "" ;endif; ?>
      </select>
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">职能：</label>
    <div class="layui-input-inline">
      <select name="functional">
        <option value="">--请选择--</option>
      </select>
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">职能等级：</label>
    <div class="layui-input-inline">
      <select name="functional_level">
        <option value="">--请选择--</option>
      </select>
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
    <label class="layui-form-label">职位说明：</label>
    <div class="layui-input-block">
        <textarea name="description" placeholder="请输入内容" class="layui-textarea" style="width: 430px;"><?php echo $info['description']; ?></textarea>
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
