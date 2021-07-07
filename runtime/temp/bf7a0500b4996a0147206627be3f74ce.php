<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:106:"D:\phpstudy_pro\WWW\tp5-rbac-api\tp5-rbac-api/application/assessment\view\personnelstatus\quit_retire.html";i:1625477191;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="__LAYUI__/css/layui.css"  media="all">
    <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
    <style>
        .layui-form-label{
            width: 100px !important;
        }
    </style>
</head>
<body>

<form class="layui-form" action="<?php echo url('savePersonnelStatus'); ?>" method="post" data-type="ajax">

    <div class="layui-form-item">

    </div>

    <div class="layui-form-item">
        <label class="layui-form-label"><?php echo $type; ?>人：</label>
        <div class="layui-input-inline" style="width: 270px;">
            <select name="id" lay-search lay-verify="required" lay-reqtext="试用日期是必填项，岂能为空？">
                <option value="">请选择</option>
                <?php if(is_array($info) || $info instanceof \think\Collection || $info instanceof \think\Paginator): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label"><?php echo $type; ?>日期：</label>
        <div class="layui-input-inline">
            <input type="text" name="to_date" lay-verify="required" id="date1" lay-reqtext="试用日期是必填项，岂能为空？" placeholder="试用日期" autocomplete="off" class="layui-input" style="width: 270px;">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label"><?php echo $type; ?>原因：</label>
        <div class="layui-input-inline">
            <textarea placeholder="请输入备注信息" name="remarks" class="layui-textarea" style="width: 800px;height: 200px" ></textarea>
        </div>
    </div>

    <div class="layui-form-item">
        <div class="layui-input-block">
            <input type="hidden" name="type" value="<?php if($type): ?><?php echo $type; endif; ?>">
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
    layui.use(['form', 'layedit', 'laydate'], function(){
        var form = layui.form
            ,laydate = layui.laydate;

        //日期
        laydate.render({
            elem: '#date1'
        });

    });
</script>

</body>
</html>
