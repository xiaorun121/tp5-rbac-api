<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:95:"D:\phpstudy_pro\WWW\tp5-rbac-api\tp5-rbac-api/application/assessment\view\report\agereport.html";i:1624867624;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>用户维护</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="__LAYUI__/css/layui.css"  media="all">
    <link rel="stylesheet" href="__LAYUI__/tab/layui.css?t=1619028572570" media="all">
    <link href="__HOME__/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <style>
        body{margin: 10px;}
        .layui-progress-text{color: #ea0a0a !important}
        .layui-form-item .layui-inline{
            margin-right: -2px;
            margin-left: -25px;
        }
    </style>
    <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
</head>
<body>
<div class="layui-fluid">
    <div class="layui-card">
        <div class="layui-card-body" style="padding: 15px;">
            <form class="layui-form" action="" lay-filter="component-form-group" method="get">
                <div class="layui-card-header"><i class="fa fa-bars"></i> 报表条件</div>
                <div class="layui-form-item">

                    <div class="layui-inline">
                        <label class="layui-form-label"> 部门</label>
                        <div class="layui-input-block">
                                <select name="organization" lay-search style="width:190px;">
                                    <option value="">请选择</option>
                                    <?php if(is_array($organizationinfo) || $organizationinfo instanceof \think\Collection || $organizationinfo instanceof \think\Paginator): $i = 0; $__LIST__ = $organizationinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                    <option value="<?php echo $v['id']; ?>" <?php if($data['organization'] == $v['id']): ?>selected<?php endif; ?>><?php echo str_repeat('- - ',$v["level"]);?><?php echo $v['name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                        </div>
                    </div>

                    <div class="layui-inline">
                        <label class="layui-form-label"> 办公地点</label>
                        <div class="layui-input-block">
                                <select name="bgdd" lay-search style="width:190px;">
                                    <option value="">请选择</option>
                                    <?php if(is_array($bgddInfo) || $bgddInfo instanceof \think\Collection || $bgddInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $bgddInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                    <option value="<?php echo $v['name']; ?>" <?php if($data['bgdd'] == $v['name']): ?>selected<?php endif; ?>><?php echo $v['name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label"> 入职时间</label>
                        <div class="layui-input-block">
                            <input type="text" name="repty_date_start" id="date1" autocomplete="off" value="<?php if($data['repty_date_start']): ?><?php echo $data['repty_date_start']; endif; ?>" class="layui-input" style="width: 190px;">
                        </div>

                    </div>
                    <div class="layui-inline" style="margin-left: -72px">
                        <label class="layui-form-label"> ~</label>
                        <div class="layui-input-block">
                            <input type="text" name="repty_date_end" id="date2" autocomplete="off" value="<?php if($data['repty_date_end']): ?><?php echo $data['repty_date_end']; endif; ?>" class="layui-input" style="width: 190px;">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label"> 状态</label>
                        <div class="layui-input-block">
                                <select name="state" style="width:190px;">
                                    <option value="">请选择</option>
                                    <option value="试用" <?php if($data['state'] == '试用'): ?>selected<?php endif; ?>>试用</option>
                                    <option value="正式" <?php if($data['state'] == '正式'): ?>selected<?php endif; ?>>正式</option>
                                    <option value="临时" <?php if($data['state'] == '临时'): ?>selected<?php endif; ?>>临时</option>
                                    <option value="兼职" <?php if($data['state'] == '兼职'): ?>selected<?php endif; ?>>兼职</option>
                                </select>
                        </div>
                    </div>
                    <div class="layui-inline">
                        <div class="layui-input-block">
                            <button type="submit" class="layui-btn" lay-submit="" lay-filter="demo1">查询</button>
                        </div>
                    </div>
                </div>

                <div class="layui-card-header" style="margin-top:-20px;"><i class="fa fa-bars"></i> 报表结果</div>
                <div class="layui-form-item">
                    <div class="layui-table-box">
                        <div class="layui-table-body layui-table-main">
                            <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
                                <tbody>
                                    <tr data-index="0" class="">
                                        <td data-field="username" data-key="3-0-0" class="">
                                            <div class="layui-table-cell laytable-cell-3-0-0">年龄</div>
                                        </td>
                                        <td data-field="joinTime" data-key="3-0-1" class="">
                                            <div class="layui-table-cell laytable-cell-3-0-1">人数</div>
                                        </td>
                                        <td data-field="sign" data-key="3-0-2" data-minwidth="180" class="">
                                            <div class="layui-table-cell laytable-cell-3-0-2">占比</div>
                                        </td>
                                    </tr>
                                    <?php if(is_array($info) || $info instanceof \think\Collection || $info instanceof \think\Paginator): $k = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
                                        <tr data-index="<?php echo $k; ?>" class="">
                                            <td data-field="username" data-key="3-0-0" class="">
                                                <div class="layui-table-cell laytable-cell-3-0-0"><?php echo $v['ages']; ?></div>
                                            </td>
                                            <td data-field="joinTime" data-key="3-0-1" class="">
                                                <div class="layui-table-cell laytable-cell-3-0-1"><?php echo $v['value']; ?></div>
                                            </td>
                                            <td data-field="sign" data-key="3-0-2" data-minwidth="180" class="">
                                                <div class="layui-progress layui-progress-big" lay-showpercent="true">
                                                    <div class="layui-progress-bar" lay-percent="<?php echo $v['proportion']*100; ?>%"></div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="layui-table-page">
                        <div id="layui-table-page1">
                            <div class="layui-box layui-laypage layui-laypage-default" id="layui-laypage-1">
                                <span class="layui-laypage-count">总计: <?php echo $sum; ?> </span>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>



<script src="__HOME__/js/jquery.min.js"></script>
<script src="__LAYUI__/tab/layui.js?t=1619028572570"></script>
<script src="__ADMIN__/js/plugins/layer/layer.min.js"></script>
<script src="__LAYUI__/layui.js" charset="utf-8"></script>
<script src="__LAYUI__/layer_hplus_tc.js" charset="utf-8"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
<script>

    layui.use(['form', 'layer', 'layedit', 'laydate','table'], function(){
        //得到各种内置组件
        var layer = layui.layer //弹层
            ,form = layui.form
            ,laydate = layui.laydate
            ,table = layui.table
            ,element = layui.element; //元素操作;

        var $ = layui.$, active = {
            parseTable: function(){
                table.init('parse-table-demo', { //转化静态表格
                    //height: 'full-500'
                });
            }
        };

        //入职日期
        laydate.render({
            elem: '#date1'
        });
        laydate.render({
            elem: '#date2'
        });

        /* 监听指定开关 */
        form.on('switch(component-form-switchTest)', function(data){
            layer.msg('开关checked：'+ (this.checked ? 'true' : 'false'), {
                offset: '6px'
            });
            layer.tips('温馨提示：请注意开关状态的文字可以随意定义，而不仅仅是ON|OFF', data.othis)
        });

    });



</script>

</body>
</html>
