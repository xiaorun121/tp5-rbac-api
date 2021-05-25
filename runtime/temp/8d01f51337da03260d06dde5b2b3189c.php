<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:101:"D:\phpstudy_pro\WWW\tp5-rbac-api\tp5-rbac-api/application/assessment\view\personnel\addpersonnel.html";i:1621839770;}*/ ?>
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
    .demo-carousel{height: 200px; line-height: 200px; text-align: center;}
  </style>
  <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
  <style media="screen">
      .layui-inline{width: 345px;}
      .layui-form-label{width: 110px;}
      .layui-fluid{padding:5px}
      .layui-tab-item{margin-top: -10px;}
  </style>
  <script src="__PY__/pinyin.js"></script>
</head>
<body>
      <div class="layui-fluid">
          <div class="layui-card">
            <div class="layui-card-body" style="padding: 15px;">
              <form class="layui-form" action="" lay-filter="component-form-group" method="post" data-type="ajax">
                <div class="layui-card-header" style="margin-top:-30px;"><i class="fa fa-bars"></i> 基本信息</div>
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label"><span style="color:red">*</span> 编号</label>
                        <div class="layui-input-inline">
                            <input type="text" name="code" value="" lay-verify="required|code" lay-reqtext="编号是必填项，岂能为空？" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label"><span style="color:red;">*</span> 姓名</label>
                        <div class="layui-input-inline">
                            <input type="text" name="name" value="" lay-verify="required|name" lay-reqtext="姓名是必填项，岂能为空？" placeholder="" autocomplete="off" class="layui-input" id="name" oninput="ConvertName()">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label">拼音</label>
                        <div class="layui-input-inline">
                            <input type="tel" name="pingyin" value="" autocomplete="off" class="layui-input" id="full">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label">英文名</label>
                        <div class="layui-input-inline">
                          <input type="tel" name="en_name" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label"> 性别</label>
                        <div class="layui-input-block">
                            <div class="layui-inline" style="width:190px;">
                                <select name="sex" >
                                    <option value="男" >男</option>
                                    <option value="女" >女</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label"><span style="color:red;">*</span> 身份证号码</label>
                        <div class="layui-input-inline">
                            <input type="tel" name="IDcard" lay-verify="required|name" lay-reqtext="身份证号码是必填项，岂能为空？" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label"><span style="color:red;">*</span> 部门</label>
                        <div class="layui-input-block">
                            <div class="layui-inline" style="width:190px;">
                                <select name="organization" lay-verify="required" lay-reqtext="部门是必选项，岂能为空？" lay-search>
                                    <option value="">请选择</option>
                                    <?php if(is_array($organizationinfo) || $organizationinfo instanceof \think\Collection || $organizationinfo instanceof \think\Paginator): $i = 0; $__LIST__ = $organizationinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                        <option value="<?php echo $v['id']; ?>"><?php echo str_repeat('- - ',$v["level"]);?><?php echo $v['name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label"><span style="color:red;">*</span> 岗位</label>
                        <div class="layui-input-block">
                            <div class="layui-inline" style="width:190px;">
                                <select name="position" lay-verify="required" lay-reqtext="岗位是必选项，岂能为空？" lay-search>
                                    <option value="">请选择</option>
                                    <?php if(is_array($positionInfo) || $positionInfo instanceof \think\Collection || $positionInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $positionInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                        <option value="<?php echo $v['code']; ?>"><?php echo $v['code']; ?>--<?php echo showPositionToOrganization($v['organization_code']); ?>--<?php echo $v['name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label"> 职称</label>
                        <div class="layui-input-block">
                            <div class="layui-inline" style="width:190px;">
                                <select name="positionaltitle"  lay-search>
                                    <option value="">无</option>
                                    <?php if(is_array($zcInfo) || $zcInfo instanceof \think\Collection || $zcInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $zcInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                        <option value="<?php echo $v['name']; ?>" ><?php echo $v['name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="layui-inline">
                        <label class="layui-form-label"> 职级</label>
                        <div class="layui-input-inline">
                            <input type="text" name="rand" value="" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label"> 职责描述</label>
                        <div class="layui-input-inline">
                            <input type="text" name="responsibilities" value=""   autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label"> 状态</label>
                        <div class="layui-input-block">
                            <div class="layui-inline" style="width:190px;">
                                <select name="state" >
                                    <option value="试用">试用</option>
                                    <option value="正式">正式</option>
                                    <option value="临时">临时</option>
                                    <option value="兼职">兼职</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label"> 试用期截止日期</label>
                        <div class="layui-input-inline">
                            <input type="text" name="cn_syqjsrq" value="" autocomplete="off" class="layui-input" id="cn_syqjsrq">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label"><span style="color:red;">*</span> 办公地点</label>
                        <div class="layui-input-block">
                            <div class="layui-inline" style="width:190px;">
                                <select name="bgdd" lay-search lay-verify="required" lay-reqtext="办公地点是必填项，岂能为空？">
                                    <option value="">请选择</option>
                                    <?php if(is_array($bgddInfo) || $bgddInfo instanceof \think\Collection || $bgddInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $bgddInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                        <option value="<?php echo $v['name']; ?>" ><?php echo $v['name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="layui-inline">
                        <label class="layui-form-label"> 有何专长</label>
                        <div class="layui-input-inline">
                            <input type="text" name="specialty" value="" placeholder="" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label"> 爱好</label>
                        <div class="layui-input-inline">
                            <input type="text" name="like" value="" placeholder="" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label"> 工号</label>
                        <div class="layui-input-inline">
                            <input type="text" name="jobcode" value="" placeholder="" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                </div>

                <div class="layui-card-header" style="margin-top:-20px;"><i class="fa fa-bars"></i> 通讯信息</div>
                <div class="layui-form-item">
                  <div class="layui-inline">
                      <label class="layui-form-label"> 移动电话</label>
                      <div class="layui-input-inline">
                          <input type="text" name="mobilephone" value="" placeholder="" autocomplete="off" class="layui-input">
                      </div>
                  </div>
                  <div class="layui-inline">
                      <label class="layui-form-label"> 办公室电话</label>
                      <div class="layui-input-inline">
                          <input type="text" name="officephone" value="" placeholder="" autocomplete="off" class="layui-input">
                      </div>
                  </div>
                  <div class="layui-inline">
                      <label class="layui-form-label"> 其他电话</label>
                      <div class="layui-input-inline">
                          <input type="text" name="otherphone" value="" placeholder="" autocomplete="off" class="layui-input">
                      </div>
                  </div>
                  <div class="layui-inline">
                      <label class="layui-form-label"> 传真</label>
                      <div class="layui-input-inline">
                          <input type="text" name="fax" value="" placeholder="" autocomplete="off" class="layui-input">
                      </div>
                  </div>
                  <div class="layui-inline">
                      <label class="layui-form-label"> 电子邮件</label>
                      <div class="layui-input-inline">
                          <input type="text" name="email" value="" placeholder="" autocomplete="off" class="layui-input">
                      </div>
                  </div>
                  <div class="layui-inline">
                      <label class="layui-form-label"> 办公室</label>
                      <div class="layui-input-inline">
                          <input type="text" name="office" value="" placeholder="" autocomplete="off" class="layui-input">
                      </div>
                  </div>
                </div>

                <div class="layui-card-header" style="margin-top:-20px;"><i class="fa fa-bars"></i> 上下级关系</div>
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label"><span style="color:red;">*</span> 直接上级</label>
                        <div class="layui-input-block">
                            <div class="layui-inline" style="width:190px;">
                                <select name="report_name" lay-search lay-verify="required" lay-reqtext="直接上级是必选项，岂能为空？">
                                    <option value="">请选择</option>
                                    <?php if(is_array($personnelToName) || $personnelToName instanceof \think\Collection || $personnelToName instanceof \think\Paginator): $i = 0; $__LIST__ = $personnelToName;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                        <option value="<?php echo $v['name']; ?>" ><?php echo $v['name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label"> 助理</label>
                        <div class="layui-input-block">
                            <div class="layui-inline" style="width:190px;">
                                <select name="assistant" lay-search >
                                    <option value="">请选择</option>
                                    <?php if(is_array($personnelToName) || $personnelToName instanceof \think\Collection || $personnelToName instanceof \think\Paginator): $i = 0; $__LIST__ = $personnelToName;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                        <option value="<?php echo $v['name']; ?>" ><?php echo $v['name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="layui-form-item layui-layout-admin">
                  <div class="layui-input-block">
                    <div class="layui-footer" style="left: 75px;background:#fff;box-shadow: none;margin-bottom: 5px;">
                      <button type="submit" class="layui-btn" lay-submit="" lay-filter="component-form-demo1">保存</button>
                      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
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

layui.use(['form', 'layer', 'layedit', 'laydate'], function(){
  //得到各种内置组件
  var layer = layui.layer //弹层
  ,form = layui.form
  ,laydate = layui.laydate
  ,element = layui.element; //元素操作;

  // 试用期截止日期
  laydate.render({
      elem:'#cn_syqjsrq'
      , trigger: 'click'
  });

  /* 监听指定开关 */
    form.on('switch(component-form-switchTest)', function(data){
      layer.msg('开关checked：'+ (this.checked ? 'true' : 'false'), {
        offset: '6px'
      });
      layer.tips('温馨提示：请注意开关状态的文字可以随意定义，而不仅仅是ON|OFF', data.othis)
    });

});

// 拼音
function ConvertName(){
    var keyword = document.getElementById('name').value;
    var full = pinyin.getFullChars(keyword); //获取全写拼音
    // var simply = pinyin.getCamelChars(keyword); //获取简写拼音(提取首字母并大写)
    document.getElementById('full').value = full;
    // document.getElementById('simply').value = simply;//默认大写.可通过string.toLowerCase()转成小写
}


</script>

</body>
</html>
