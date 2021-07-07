<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:102:"D:\phpstudy_pro\WWW\tp5-rbac-api\tp5-rbac-api/application/assessment\view\personnel\personnelsave.html";i:1624846949;}*/ ?>
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
  <div class="layui-tab layui-tab-brief" lay-filter="demo">
  <ul class="layui-tab-title">
    <li class="layui-this">基本信息</li>
<!--    <li>工作历程</li>-->
    <li>个人信息</li>
    <li>工作信息</li>
    <li>系统信息</li>
    <li>工资福利</li>
    <li>资产信息</li>
<!--    <li>待办事项</li>-->
<!--    <li>日程安排</li>-->
<!--    <li>考勤情况</li>-->
    <li>培训记录</li>
<!--    <li>奖惩考核</li>-->
<!--    <li>角色设置</li>-->
  </ul>
  <div class="layui-tab-content">
    <div class="layui-tab-item layui-show">
      <div class="layui-fluid">
          <div class="layui-card">
            <div class="layui-card-body" style="padding: 15px;">
                <div class="layui-form-item">
                    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
                        <legend>基本信息</legend>
                    </fieldset>

                    <div class="layui-fluid">
                        <div class="layui-card">
                            <div class="layui-card-body" style="padding-left: 20px;margin-top:-20px;">
                                <p><?php echo $info['name']; ?>（<?php echo $info['sex']; ?>）<?php echo $info['code']; ?> &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-balance-scale" style="color:#0345ff"></i><?php echo $info['organization_info']; ?></p>
                                <p>直接上级: <?php echo $info['report_name']; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;状态: <?php echo $info['state']; ?> &nbsp;&nbsp;&nbsp;最后登录日期:<?php echo $info['login_time']; ?></p>
                                <p>创建人: <?php echo $info['create_user_id']; ?> &nbsp;&nbsp;&nbsp;创建时间: <?php echo $info['create_time']; ?></p>
                                <p>最后修改人: <?php echo $info['update_user_id']; ?> &nbsp;&nbsp;&nbsp;最后修改日期: <?php echo $info['update_time']; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="layui-fluid">
                        <div class="layui-card">
                          <div class="layui-card-body" style="padding: 15px;">
                            <form class="layui-form" action="" lay-filter="component-form-group" method="post" data-type="ajax">
                              <div class="layui-card-header" style="margin-top:-30px;"><i class="fa fa-bars"></i> 基本信息</div>
                              <div class="layui-form-item">
                                  <div class="layui-inline">
                                      <label class="layui-form-label"><span style="color:red">*</span> 编号</label>
                                      <div class="layui-input-inline">
                                          <input type="text" name="code" value="<?php echo $info['code']; ?>" lay-verify="required|code" lay-reqtext="编号是必填项，岂能为空？" autocomplete="off" class="layui-input">
                                      </div>
                                  </div>

                                  <div class="layui-inline">
                                      <label class="layui-form-label"><span style="color:red;">*</span> 姓名</label>
                                      <div class="layui-input-inline">
                                          <input type="text" name="name" value="<?php echo $info['name']; ?>" lay-verify="required|name" lay-reqtext="姓名是必填项，岂能为空？" placeholder="" autocomplete="off" class="layui-input" id="name" oninput="ConvertName()">
                                      </div>
                                  </div>
                                  <div class="layui-inline">
                                      <label class="layui-form-label">拼音</label>
                                      <div class="layui-input-inline">
                                          <input type="tel" name="pingyin" value="<?php echo $info['pingyin']; ?>" autocomplete="off" class="layui-input" id="full">
                                      </div>
                                  </div>
                                  <div class="layui-inline">
                                      <label class="layui-form-label">英文名</label>
                                      <div class="layui-input-inline">
                                        <input type="tel" name="en_name" value="<?php echo $info['en_name']; ?>" autocomplete="off" class="layui-input">
                                      </div>
                                  </div>

                                  <div class="layui-inline">
                                      <label class="layui-form-label"> 性别</label>
                                      <div class="layui-input-block">
                                          <div class="layui-inline" style="width:190px;">
                                              <select name="sex" >
                                                  <option value="男" <?php if($info['sex'] == '男'): ?>selected<?php endif; ?>>男</option>
                                                  <option value="女" <?php if($info['sex'] == '女'): ?>selected<?php endif; ?>>女</option>
                                              </select>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="layui-inline">
                                      <label class="layui-form-label"><span style="color:red;">*</span> 部门</label>
                                      <div class="layui-input-block">
                                          <div class="layui-inline" style="width:190px;">
                                              <select name="organization" lay-verify="required" lay-reqtext="部门是必选项，岂能为空？" lay-search>
                                                  <option value="">请选择</option>
                                                  <?php if(is_array($organizationinfo) || $organizationinfo instanceof \think\Collection || $organizationinfo instanceof \think\Paginator): $i = 0; $__LIST__ = $organizationinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                                      <option value="<?php echo $v['id']; ?>" <?php if($info['organization'] == $v['id']): ?>selected<?php endif; ?>><?php echo str_repeat('- - ',$v["level"]);?><?php echo $v['name']; ?></option>
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
                                                      <option value="<?php echo $v['code']; ?>" <?php if($info['position'] == $v['code']): ?>selected<?php endif; ?>><?php echo showPositionToOrganization($v['organization_code']); ?>--<?php echo $v['name']; ?></option>
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
                                          <input type="text" name="rand" value="<?php echo $info['rand']; ?>" autocomplete="off" class="layui-input">
                                      </div>
                                  </div>
                                  <div class="layui-inline">
                                      <label class="layui-form-label"> 职责描述</label>
                                      <div class="layui-input-inline">
                                          <input type="text" name="responsibilities" value="<?php echo $info['responsibilities']; ?>"   autocomplete="off" class="layui-input">
                                      </div>
                                  </div>
                                  <div class="layui-inline">
                                      <label class="layui-form-label"> 状态</label>
                                      <div class="layui-input-block">
                                          <div class="layui-inline" style="width:190px;">
                                              <select name="state" >
                                                  <option value="试用" <?php if($info['state'] == '试用'): ?>selected<?php endif; ?>>试用</option>
                                                  <option value="正式" <?php if($info['state'] == '正式'): ?>selected<?php endif; ?>>正式</option>
                                                  <option value="临时" <?php if($info['state'] == '临时'): ?>selected<?php endif; ?>>临时</option>
                                                  <option value="兼职" <?php if($info['state'] == '兼职'): ?>selected<?php endif; ?>>兼职</option>
                                              </select>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="layui-inline">
                                      <label class="layui-form-label"><span style="color:red;">*</span> 办公地点</label>
                                      <div class="layui-input-block">
                                          <div class="layui-inline" style="width:190px;">
                                              <select name="bgdd" lay-search lay-verify="required" lay-reqtext="办公地点是必填项，岂能为空？">
                                                  <option value="">请选择</option>
                                                  <?php if(is_array($bgddInfo) || $bgddInfo instanceof \think\Collection || $bgddInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $bgddInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                                      <option value="<?php echo $v['name']; ?>" <?php if($info['bgdd'] == $v['name']): ?>selected<?php endif; ?>><?php echo $v['name']; ?></option>
                                                  <?php endforeach; endif; else: echo "" ;endif; ?>
                                              </select>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="layui-inline">
                                      <label class="layui-form-label"> 工号</label>
                                      <div class="layui-input-inline">
                                          <input type="text" name="jobcode" value="<?php echo $info['jobcode']; ?>" placeholder="" autocomplete="off" class="layui-input">
                                      </div>
                                  </div>
                                  <div class="layui-inline">
                                      <label class="layui-form-label"> 有何专长</label>
                                      <div class="layui-input-inline">
                                          <input type="text" name="specialty" value="<?php echo $info['specialty']; ?>" placeholder="" autocomplete="off" class="layui-input">
                                      </div>
                                  </div>
                                  <div class="layui-inline">
                                      <label class="layui-form-label"> 爱好</label>
                                      <div class="layui-input-inline">
                                          <input type="text" name="like" value="<?php echo $info['like']; ?>" placeholder="" autocomplete="off" class="layui-input">
                                      </div>
                                  </div>
                                  <div class="layui-inline">
                                      <label class="layui-form-label"> 入职日期</label>
                                      <div class="layui-input-inline">
                                          <input type="text" name="repty_date" value="<?php echo $info['repty_date']; ?>" autocomplete="off" class="layui-input" id="repty_date">
                                      </div>
                                  </div>
                              </div>

                              <div class="layui-card-header" style="margin-top:-20px;"><i class="fa fa-bars"></i> 通讯信息</div>
                              <div class="layui-form-item">
                                <div class="layui-inline">
                                    <label class="layui-form-label"> 移动电话</label>
                                    <div class="layui-input-inline">
                                        <input type="text" name="mobilephone" value="<?php echo $info['mobilephone']; ?>" placeholder="" autocomplete="off" class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <label class="layui-form-label"> 办公室电话</label>
                                    <div class="layui-input-inline">
                                        <input type="text" name="officephone" value="<?php echo $info['officephone']; ?>" placeholder="" autocomplete="off" class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <label class="layui-form-label"> 其他电话</label>
                                    <div class="layui-input-inline">
                                        <input type="text" name="otherphone" value="<?php echo $info['otherphone']; ?>" placeholder="" autocomplete="off" class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <label class="layui-form-label"> 传真</label>
                                    <div class="layui-input-inline">
                                        <input type="text" name="fax" value="<?php echo $info['fax']; ?>" placeholder="" autocomplete="off" class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <label class="layui-form-label"> 电子邮件</label>
                                    <div class="layui-input-inline">
                                        <input type="text" name="email" value="<?php echo $info['email']; ?>" placeholder="" autocomplete="off" class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <label class="layui-form-label"> 办公室</label>
                                    <div class="layui-input-inline">
                                        <input type="text" name="office" value="<?php echo $info['office']; ?>" placeholder="" autocomplete="off" class="layui-input">
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
                                                      <option value="<?php echo $v['name']; ?>" <?php if($info['report_name'] == $v['name']): ?>selected<?php endif; ?>><?php echo $v['name']; ?></option>
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
                                                      <option value="<?php echo $v['name']; ?>" <?php if($info['assistant'] == $v['name']): ?>selected<?php else: endif; ?>><?php echo $v['name']; ?></option>
                                                  <?php endforeach; endif; else: echo "" ;endif; ?>
                                              </select>
                                          </div>
                                      </div>
                                  </div>
                              </div>


                              <div class="layui-form-item layui-layout-admin">
                                <div class="layui-input-block">
                                  <div class="layui-footer" style="left: 15px;background:#fff;">
                                    <input type="hidden" name="tab_type" value="基本信息">
                                    <button type="submit" class="layui-btn" lay-submit="" lay-filter="component-form-demo1">立即提交</button>
                                    <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                                    <a  class="layui-btn layui-btn-normal layui-btn-radius" onclick="javascript:history.go(-1);">返回</a>
                                  </div>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                  </div>    
            </div>
          </div>
        </div>
    </div>
<!--    <div class="layui-tab-item">-->
<!--      工作历程-->
<!--    </div>-->
    <div class="layui-tab-item">
        <div class="layui-fluid">
            <div class="layui-card">
                <div class="layui-card-body" style="padding: 30px;">
                    <form class="layui-form" action="" lay-filter="component-form-group" method="post" data-type="ajax">
                        <div class="layui-card-header" style="margin-top:-30px;"><i class="fa fa-bars"></i> 基本信息</div>
                        <div class="layui-form-item">
                            <div class="layui-inline">
                                <label class="layui-form-label"> 出生日期</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="birth" value="<?php echo $info['birth']; ?>" autocomplete="off" id="birth"  class="layui-input">
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label">民族</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="cn_mz" value="<?php echo $info['cn_mz']; ?>" placeholder="" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label">籍贯</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="cn_jiguan" value="<?php echo $info['cn_jiguan']; ?>" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label">户口</label>
                                <div class="layui-input-inline">
                                    <input type="tel" name="cn_hk" value="<?php echo $info['cn_hk']; ?>"  autocomplete="off" class="layui-input">
                                </div>
                            </div>

                            <div class="layui-inline">
                                <label class="layui-form-label"> 身份证号码</label>
                                <div class="layui-input-inline">
                                    <input type="tel" name="IDcard" id="IDcard" value="<?php echo $info['IDcard']; ?>" autocomplete="off" class="layui-input" oninput="getIDCardInfo()">
                                    <input type="hidden" name="age" value="<?php echo $info['age']; ?>" id="age"/>
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label"> 婚姻状况</label>
                                <div class="layui-input-block">
                                    <div class="layui-inline" style="width:190px;">
                                        <select name="cn_hy" >
                                            <option value="未婚" <?php if($info['cn_hy'] == '未婚'): ?>selected<?php endif; ?>>未婚</option>
                                            <option value="已婚" <?php if($info['cn_hy'] == '已婚'): ?>selected<?php endif; ?>>已婚</option>
                                            <option value="离异" <?php if($info['cn_hy'] == '离异'): ?>selected<?php endif; ?>>离异</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label"> 政治面貌</label>
                                <div class="layui-input-inline">
                                    <input type="tel" name="cn_zzmm" value="<?php echo $info['cn_zzmm']; ?>" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label"> 入团日期</label>
                                <div class="layui-input-inline">
                                    <input type="tel" name="cn_rutuan_time" value="<?php echo $info['cn_rutuan_time']; ?>" id="rutuan" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label"> 入党日期</label>
                                <div class="layui-input-inline">
                                    <input type="tel" name="cn_rudang_time" value="<?php echo $info['cn_rudang_time']; ?>" id="rudang" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label"> 工会会员</label>
                                <div class="layui-input-block">
                                    <div class="layui-inline" style="width:190px;">
                                        <select name="cn_ghhy" >
                                            <option value="是" <?php if($info['cn_ghhy'] == '是'): ?>selected<?php endif; ?>>是</option>
                                            <option value="否" <?php if($info['cn_ghhy'] == '否'): ?>selected<?php endif; ?>>否</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label"> 学历</label>
                                <div class="layui-input-block">
                                    <div class="layui-inline" style="width:190px;">
                                        <select name="cn_zgxl" >
                                            <option value="">请选择</option>
                                            <option value="博士后" <?php if($info['cn_zgxl'] == '博士后'): ?>selected<?php endif; ?>>博士后</option>
                                            <option value="博士" <?php if($info['cn_zgxl'] == '博士'): ?>selected<?php endif; ?>>博士</option>
                                            <option value="硕士" <?php if($info['cn_zgxl'] == '硕士'): ?>selected<?php endif; ?>>硕士</option>
                                            <option value="本科" <?php if($info['cn_zgxl'] == '本科'): ?>selected<?php endif; ?>>本科</option>
                                            <option value="大专" <?php if($info['cn_zgxl'] == '大专'): ?>selected<?php endif; ?>>大专</option>
                                            <option value="其他" <?php if($info['cn_zgxl'] == '其他'): ?>selected<?php endif; ?>>其他</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label"> 学位</label>
                                <div class="layui-input-inline">
                                    <input type="tel" name="cn_xw" value="<?php echo $info['cn_xw']; ?>" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label"> 健康状况</label>
                                <div class="layui-input-block">
                                    <div class="layui-inline" style="width:190px;">
                                        <select name="cn_jkzk" >
                                            <option value="优秀" <?php if($info['cn_jkzk'] == '优秀'): ?>selected<?php endif; ?>>优秀</option>
                                            <option value="良好" <?php if($info['cn_jkzk'] == '良好'): ?>selected<?php endif; ?>>良好</option>
                                            <option value="一般" <?php if($info['cn_jkzk'] == '一般'): ?>selected<?php endif; ?>>一般</option>
                                            <option value="较差" <?php if($info['cn_jkzk'] == '较差'): ?>selected<?php endif; ?>>较差</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label"> 身高(cm)</label>
                                <div class="layui-input-inline">
                                    <input type="tel" name="cn_height" value="<?php echo $info['cn_height']; ?>" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label"> 体重(kg)</label>
                                <div class="layui-input-inline">
                                    <input type="tel" name="cn_weight" value="<?php echo $info['cn_weight']; ?>" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label"> 现居住地</label>
                                <div class="layui-input-inline">
                                    <input type="tel" name="cn_xjzddz" value="<?php echo $info['cn_xjzddz']; ?>" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label"> 家庭联系方式</label>
                                <div class="layui-input-inline">
                                    <input type="tel" name="cn_sfzdz" value="<?php echo $info['cn_sfzdz']; ?>" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label"> 暂住证号码</label>
                                <div class="layui-input-inline">
                                    <input type="tel" name="cn_zzz_number" value="<?php echo $info['cn_zzz_number']; ?>" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                        </div>

                        <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
                            <legend>家庭情况</legend>
                        </fieldset>

                        <div class="layui-card-header" style="margin-top:-20px;"><i class="fa fa-bars"></i> 家庭情况 <span style="float: right"><i class="fa fa-plus-circle" onclick="addUser()" style="color: #07e4ef;font-size: 20px;"></i></span></div>
                        <table lay-filter="parse-table-demo" class="layui-table">
                            <thead>
                            <tr>
                                <th width="10%">成员</th>
                                <th width="10%">称谓</th>
                                <th>工作单位</th>
                                <th width="10%">职务</th>
                                <th>地址</th>
                                <th width="5%"></th>
                            </tr>
                            </thead>
                            <tbody id="about_user">
                                <?php if(is_array($UserInfo) || $UserInfo instanceof \think\Collection || $UserInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $UserInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                    <tr>
                                        <input type="hidden" name="uid[]" value="<?php echo $v['uid']; ?>">
                                        <td><input type="text" name="username[]" value="<?php echo $v['username']; ?>" class="layui-input"></td>
                                        <td><input type="text" name="nickname[]" value="<?php echo $v['nickname']; ?>" class="layui-input"></td>
                                        <td><input type="text" name="workplace[]" value="<?php echo $v['workplace']; ?>" class="layui-input"></td>
                                        <td><input type="text" name="job[]" value="<?php echo $v['job']; ?>" class="layui-input"></td>
                                        <td><input type="text" name="address[]" value="<?php echo $v['address']; ?>" class="layui-input"></td>
                                        <td><a class="layui-btn layui-btn-normal layui-btn-radius" onclick="removeUser(this,'userinfo',<?php echo $v['uid']; ?>)">移除</a></td>
                                    </tr>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </tbody>
                            <script>
                                // 个人信息添加家庭情况
                                function addUser(){
                                    $('#about_user').append('<tr>\n' +
                                        '                                    <input type="hidden" name="uid[]" value="" class="layui-input">\n' +
                                        '                                    <td><input type="text" name="username[]" class="layui-input"></td>\n' +
                                        '                                    <td><input type="text" name="nickname[]" class="layui-input"></td>\n' +
                                        '                                    <td><input type="text" name="workplace[]" class="layui-input"></td>\n' +
                                        '                                    <td><input type="text" name="job[]" class="layui-input"></td>\n' +
                                        '                                    <td><input type="text" name="address[]" class="layui-input"></td>\n' +
                                        '                                    <td><a class="layui-btn layui-btn-normal layui-btn-radius" onclick="removeUser(this)">移除</a></td>\n' +
                                        '                                </tr>');
                                }

                            </script>
                        </table>


                        <div class="layui-form-item layui-layout-admin">
                            <div class="layui-input-block">
                                <div class="layui-footer" style="left: 15px;background:#fff;">
                                    <input type="hidden" name="tab_type" value="个人信息">
                                    <button type="submit" class="layui-btn" lay-submit="" lay-filter="component-form-demo1">立即提交</button>
                                    <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                                    <a  class="layui-btn layui-btn-normal layui-btn-radius" onclick="javascript:history.go(-1);">返回</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="layui-tab-item">
        <div class="layui-fluid">
            <div class="layui-card">
                <div class="layui-card-body" style="padding: 30px;">
                    <form class="layui-form" action="" lay-filter="component-form-group" method="post" data-type="ajax">
                        <div class="layui-card-header" style="margin-top:-30px;"><i class="fa fa-bars"></i> 工作信息</div>
                        <div class="layui-form-item">
                            <div class="layui-inline">
                                <label class="layui-form-label"> 用工性质</label>
                                <div class="layui-input-block">
                                    <div class="layui-inline" style="width:190px;">
                                        <select name="cn_ygxz" >
                                            <option value="正式员工" <?php if($info['cn_ygxz'] == '正式员工'): ?>selected<?php endif; ?>>正式员工</option>
                                            <option value="兼职员工" <?php if($info['cn_ygxz'] == '兼职员工'): ?>selected<?php endif; ?>> 兼职员工</option>
                                            <option value="劳动用工" <?php if($info['cn_ygxz'] == '劳动用工'): ?>selected<?php endif; ?>>劳动用工</option>
                                            <option value="劳务用工" <?php if($info['cn_ygxz'] == '劳务用工'): ?>selected<?php endif; ?>>劳务用工</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label"> 合同开始日期</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="cn_htksrq" value="<?php echo $info['cn_htksrq']; ?>" placeholder="" autocomplete="off" class="layui-input" id="htksrq">
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label">试用期结束日期</label>
                                <div class="layui-input-inline">
                                    <input type="tel" name="cn_syqjsrq" value="<?php echo $info['cn_syqjsrq']; ?>" autocomplete="off" class="layui-input" id="syqjsrq">
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label">合同结束日期</label>
                                <div class="layui-input-inline">
                                    <input type="tel" name="cn_htjsrq" value="<?php echo $info['cn_htjsrq']; ?>" id="htjsrq" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                        </div>

                        <div class="layui-tab layui-tab-brief" lay-filter="demo">
                            <ul class="layui-tab-title">
                                <li class="layui-this" onclick="getType('one')">语言能力</li>
                                <li onclick="getType('two')">教育情况</li>
                                <li onclick="getType('three')">入职前工作简历</li>
                                <li onclick="getType('four')">入职前培训</li>
                                <li onclick="getType('five')">资格证书</li>
                                <li onclick="getType('six')">入职前奖惩</li>
                            </ul>
                            <div class="layui-tab-content">
                                <div class="layui-tab-item layui-show">
                                    <div class="layui-card-header" style="margin-top:-20px;"><i class="fa fa-bars"></i> 语言能力 <span style="float: right"><i class="fa fa-plus-circle" onclick="addUserOne()" style="color: #07e4ef;font-size: 20px;"></i></span></div>
                                    <table lay-filter="parse-table-demo" class="layui-table">
                                        <thead>
                                        <tr>
                                            <th>语言</th>
                                            <th>水平</th>
                                            <th>备注</th>
                                            <th width="5%"></th>
                                        </tr>
                                        </thead>
                                        <tbody id="user_one">
                                            <?php if(is_array($workinfoOne) || $workinfoOne instanceof \think\Collection || $workinfoOne instanceof \think\Paginator): $i = 0; $__LIST__ = $workinfoOne;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                                <tr>
                                                    <input type="hidden" name="oneid[]" value="<?php echo $v['wid']; ?>" class="layui-input">
                                                    <td><input type="text" name="one_language[]" value="<?php echo $v['one_language']; ?>" class="layui-input"></td>
                                                    <td>
                                                        <div class="layui-inline" style="width:190px;">
                                                            <select name="one_poor[]">
                                                                <option value="一般" <?php if($v['one_poor'] == '一般'): ?>selected<?php endif; ?>>一般</option>
                                                                <option value="良好" <?php if($v['one_poor'] == '良好'): ?>selected<?php endif; ?>>良好</option>
                                                                <option value="熟练" <?php if($v['one_poor'] == '熟练'): ?>selected<?php endif; ?>>熟练</option>
                                                                <option value="精通" <?php if($v['one_poor'] == '精通'): ?>selected<?php endif; ?>>精通</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td><input type="text" name="remarks[]" value="<?php echo $v['remarks']; ?>" class="layui-input"></td>
                                                    <td><a class="layui-btn layui-btn-normal layui-btn-radius" onclick="removeUser(this,'workinfo',<?php echo $v['wid']; ?>)">移除</a></td>
                                                </tr>
                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </tbody>
                                        <script>
                                            // 语言能力
                                            function addUserOne(){
                                                $('#user_one').append('<tr>\n' +
                                                    '                                            <input type="hidden" name="oneid[]" value="" class="layui-input">\n' +
                                                    '                                            <td><input type="text" name="one_language[]" class="layui-input"></td>\n' +
                                                    '                                            <td>\n' +
                                                    '                                                <div class="layui-inline" style="width:190px;">\n' +
                                                    '                                                    <select name="one_poor[]">\n' +
                                                    '                                                        <option value="一般">一般</option>\n' +
                                                    '                                                        <option value="良好">良好</option>\n' +
                                                    '                                                        <option value="熟练">熟练</option>\n' +
                                                    '                                                        <option value="精通">精通</option>\n' +
                                                    '                                                    </select>\n' +
                                                    '                                                </div>\n' +
                                                    '                                            </td>\n' +
                                                    '                                            <td><input type="text" name="one_remarks[]" class="layui-input"></td>\n' +
                                                    '                                            <td><a class="layui-btn layui-btn-normal layui-btn-radius" onclick="removeUser(this)">移除</a></td>\n' +
                                                    '                                        </tr>');
                                                renderForm();
                                            }

                                        </script>
                                    </table>
                                </div>
                                <div class="layui-tab-item">
                                    <div class="layui-card-header" style="margin-top:-20px;"><i class="fa fa-bars"></i> 教育情况 <span style="float: right"><i class="fa fa-plus-circle" onclick="addUserTwo()" style="color: #07e4ef;font-size: 20px;"></i></span></div>
                                    <table lay-filter="parse-table-demo" class="layui-table">
                                        <thead>
                                        <tr>
                                            <th>学校名称</th>
                                            <th>专业</th>
                                            <th>开始日期</th>
                                            <th>结束日期</th>
                                            <th>学历</th>
                                            <th>详细描述</th>
                                            <th width="5%"></th>
                                        </tr>
                                        </thead>
                                        <tbody id="user_two">
                                            <?php if(is_array($workinfoTwo) || $workinfoTwo instanceof \think\Collection || $workinfoTwo instanceof \think\Paginator): $i = 0; $__LIST__ = $workinfoTwo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                                <tr>
                                                    <input type="hidden" name="twoid[]" value="<?php echo $v['wid']; ?>" class="layui-input">
                                                    <td><input type="text" name="two_shcool[]" value="<?php echo $v['two_shcool']; ?>" class="layui-input"></td>
                                                    <td>
                                                        <div class="layui-inline" style="width:190px;">
                                                            <select name="two_major[]">
                                                                <option value="计算机" <?php if($v['two_major'] == '计算机'): ?>selected<?php endif; ?>>计算机</option>
                                                                <option value="金融" <?php if($v['two_major'] == '金融'): ?>selected<?php endif; ?>>金融</option>
                                                                <option value="财经" <?php if($v['two_major'] == '财经'): ?>selected<?php endif; ?>>财经</option>
                                                                <option value="审计" <?php if($v['two_major'] == '审计'): ?>selected<?php endif; ?>>审计</option>
                                                                <option value="法律" <?php if($v['two_major'] == '法律'): ?>selected<?php endif; ?>>法律</option>
                                                                <option value="贸易" <?php if($v['two_major'] == '贸易'): ?>selected<?php endif; ?>>贸易</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td class="layui-form-item"><input type="text" name="tow_start_date[]" value="<?php echo $v['tow_start_date']; ?>" class="layui-input" id="two_start_date"></td>
                                                    <td class="layui-form-item"><input type="text" name="two_end_date[]" value="<?php echo $v['two_end_date']; ?>" class="layui-input" id="two_end_date"></td>
                                                    <td>
                                                        <div class="layui-inline" style="width:190px;">
                                                            <select name="two_education[]">
                                                                <option value="其他" <?php if($v['two_education'] == '其他'): ?>selected<?php endif; ?>>其他</option>
                                                                <option value="初中" <?php if($v['two_education'] == '初中'): ?>selected<?php endif; ?>>初中</option>
                                                                <option value="高中" <?php if($v['two_education'] == '高中'): ?>selected<?php endif; ?>>高中</option>
                                                                <option value="中技" <?php if($v['two_education'] == '中技'): ?>selected<?php endif; ?>>中技</option>
                                                                <option value="中专" <?php if($v['two_education'] == '中专'): ?>selected<?php endif; ?>>中专</option>
                                                                <option value="大专" <?php if($v['two_education'] == '大专'): ?>selected<?php endif; ?>>大专</option>
                                                                <option value="本科" <?php if($v['two_education'] == '本科'): ?>selected<?php endif; ?>>本科</option>
                                                                <option value="硕士研究生" <?php if($v['two_education'] == '硕士研究生'): ?>selected<?php endif; ?>>硕士研究生</option>
                                                                <option value="博士研究生" <?php if($v['two_education'] == '博士研究生'): ?>selected<?php endif; ?>>博士研究生</option>
                                                                <option value="MBA" <?php if($v['two_education'] == 'MBA'): ?>selected<?php endif; ?>>MBA</option>
                                                                <option value="EMBA" <?php if($v['two_education'] == 'EMBA'): ?>selected<?php endif; ?>>EMBA</option>
                                                                <option value="博士后" <?php if($v['two_education'] == '博士后'): ?>selected<?php endif; ?>>博士后</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td><input type="text" name="two_remarks[]" value="<?php echo $v['remarks']; ?>" class="layui-input"></td>
                                                    <td><a class="layui-btn layui-btn-normal layui-btn-radius" onclick="removeUser(this,'workinfo',<?php echo $v['wid']; ?>)">移除</a></td>
                                                </tr>
                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </tbody>
                                        <script>
                                            // 教育情况
                                            function addUserTwo(){
                                                var idNum = parseInt(Math.random()*20);
                                                $('#user_two').append('<tr>\n' +
                                                    '                                            <input type="hidden" name="twoid[]" value="" class="layui-input">\n' +
                                                    '                                            <td><input type="text" name="two_shcool[]" class="layui-input"></td>\n' +
                                                    '                                            <td>\n' +
                                                    '                                                <div class="layui-inline" style="width:190px;">\n' +
                                                    '                                                    <select name="two_major[]">\n' +
                                                    '                                                        <option value="计算机">计算机</option>\n' +
                                                    '                                                        <option value="金融">金融</option>\n' +
                                                    '                                                        <option value="财经">财经</option>\n' +
                                                    '                                                        <option value="审计">审计</option>\n' +
                                                    '                                                        <option value="法律">法律</option>\n' +
                                                    '                                                        <option value="贸易">贸易</option>\n' +
                                                    '                                                    </select>\n' +
                                                    '                                                </div>\n' +
                                                    '                                            </td>\n' +
                                                    '                                            <td class="layui-form-item"><input type="text" name="tow_start_date[]" class="layui-input" id="two_start_date'+idNum+'"></td>\n' +
                                                    '                                            <td class="layui-form-item"><input type="text" name="two_end_date[]" class="layui-input" id="two_end_date'+idNum+'"></td>\n' +
                                                    '                                            <td>\n' +
                                                    '                                                <div class="layui-inline" style="width:190px;">\n' +
                                                    '                                                    <select name="two_education[]">\n' +
                                                    '                                                        <option value="其他">其他</option>\n' +
                                                    '                                                        <option value="初中">初中</option>\n' +
                                                    '                                                        <option value="高中">高中</option>\n' +
                                                    '                                                        <option value="中技">中技</option>\n' +
                                                    '                                                        <option value="中专">中专</option>\n' +
                                                    '                                                        <option value="大专">大专</option>\n' +
                                                    '                                                        <option value="本科">本科</option>\n' +
                                                    '                                                        <option value="硕士研究生">硕士研究生</option>\n' +
                                                    '                                                        <option value="博士研究生">博士研究生</option>\n' +
                                                    '                                                        <option value="MBA">MBA</option>\n' +
                                                    '                                                        <option value="EMBA">EMBA</option>\n' +
                                                    '                                                        <option value="博士后">博士后</option>\n' +
                                                    '                                                    </select>\n' +
                                                    '                                                </div>\n' +
                                                    '                                            </td>\n' +
                                                    '                                            <td><input type="text" name="two_remarks[]" class="layui-input"></td>\n' +
                                                    '                                            <td><a class="layui-btn layui-btn-normal layui-btn-radius" onclick="removeUser(this)">移除</a></td>\n' +
                                                    '                                        </tr>');
                                                renderForm();
                                                renderDate(idNum);
                                            }

                                        </script>
                                    </table>
                                </div>
                                <div class="layui-tab-item">
                                    <div class="layui-card-header" style="margin-top:-20px;"><i class="fa fa-bars"></i> 入职前工作简历 <span style="float: right"><i class="fa fa-plus-circle" onclick="addUserThree()" style="color: #07e4ef;font-size: 20px;"></i></span></div>
                                    <table lay-filter="parse-table-demo" class="layui-table">
                                        <thead>
                                        <tr>
                                            <th>公司名称</th>
                                            <th>开始日期</th>
                                            <th>结束日期</th>
                                            <th>职务</th>
                                            <th>工作描述</th>
                                            <th>离开原因</th>
                                            <th width="5%"></th>
                                        </tr>
                                        </thead>
                                        <tbody id="user_three">
                                            <?php if(is_array($workinfoThree) || $workinfoThree instanceof \think\Collection || $workinfoThree instanceof \think\Paginator): $i = 0; $__LIST__ = $workinfoThree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                                <tr>
                                                    <input type="hidden" name="threeid[]" value="<?php echo $v['wid']; ?>" class="layui-input">
                                                    <td><input type="text" name="three_company[]" value="<?php echo $v['three_company']; ?>" class="layui-input"></td>
                                                    <td class="layui-form-item"><input type="text" name="three_start_date[]" value="<?php echo $v['three_start_date']; ?>" class="layui-input" id="three_start_date"></td>
                                                    <td class="layui-form-item"><input type="text" name="three_end_date[]" value="<?php echo $v['three_end_date']; ?>" class="layui-input" id="three_end_date"></td>
                                                    <td><input type="text" name="three_job[]" value="<?php echo $v['three_job']; ?>" class="layui-input"></td>
                                                    <td><input type="text" name="three_remarks[]" value="<?php echo $v['remarks']; ?>" class="layui-input"></td>
                                                    <td><input type="text" name="three_leave_reason[]" value="<?php echo $v['three_leave_reason']; ?>" class="layui-input"></td>
                                                    <td><a class="layui-btn layui-btn-normal layui-btn-radius" onclick="removeUser(this,'workinfo',<?php echo $v['wid']; ?>)">移除</a></td>
                                                </tr>
                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </tbody>
                                        <script>
                                            // 入职前工作简历
                                            function addUserThree(){
                                                var idNum2 = parseInt(Math.random()*20+20);
                                                $('#user_three').append('<tr>\n' +
                                                    '                                            <input type="hidden" name="threeid[]" value="" class="layui-input">\n' +
                                                    '                                            <td><input type="text" name="three_company[]" class="layui-input"></td>\n' +
                                                    '                                            <td class="layui-form-item"><input type="text" name="three_start_date[]" class="layui-input" id="three_start_date'+idNum2+'"></td>\n' +
                                                    '                                            <td class="layui-form-item"><input type="text" name="three_end_date[]" class="layui-input" id="three_end_date'+idNum2+'"></td>\n' +
                                                    '                                            <td><input type="text" name="three_job[]" class="layui-input"></td>\n' +
                                                    '                                            <td><input type="text" name="three_remarks[]" class="layui-input"></td>\n' +
                                                    '                                            <td><input type="text" name="three_leave_reason[]" class="layui-input"></td>\n' +
                                                    '                                            <td><a class="layui-btn layui-btn-normal layui-btn-radius" onclick="removeUser(this)">移除</a></td>\n' +
                                                    '                                        </tr>');
                                                renderDate(idNum2);
                                            }

                                        </script>
                                    </table>
                                </div>
                                <div class="layui-tab-item">
                                    <div class="layui-card-header" style="margin-top:-20px;"><i class="fa fa-bars"></i> 入职前培训 <span style="float: right"><i class="fa fa-plus-circle" onclick="addUserFour()" style="color: #07e4ef;font-size: 20px;"></i></span></div>
                                    <table lay-filter="parse-table-demo" class="layui-table">
                                        <thead>
                                        <tr>
                                            <th>培训名称</th>
                                            <th>培训开始日期</th>
                                            <th>培训结束日期</th>
                                            <th>培训单位</th>
                                            <th>备注</th>
                                            <th width="5%"></th>
                                        </tr>
                                        </thead>
                                        <tbody id="user_four">
                                            <?php if(is_array($workinfoFour) || $workinfoFour instanceof \think\Collection || $workinfoFour instanceof \think\Paginator): $i = 0; $__LIST__ = $workinfoFour;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                                <tr>
                                                    <input type="hidden" name="fourid[]" value="<?php echo $v['wid']; ?>" class="layui-input">
                                                    <td><input type="text" name="four_train_name[]" value="<?php echo $v['four_train_name']; ?>" class="layui-input"></td>
                                                    <td class="layui-form-item"><input type="text" name="four_train_start_date[]" value="<?php echo $v['four_train_start_date']; ?>" class="layui-input" id="four_train_start_date"></td>
                                                    <td class="layui-form-item"><input type="text" name="four_train_end_date[]" value="<?php echo $v['four_train_end_date']; ?>" class="layui-input" id="four_train_end_date"></td>
                                                    <td><input type="text" name="four_train_company[]" value="<?php echo $v['four_train_company']; ?>" class="layui-input"></td>
                                                    <td><input type="text" name="four_remarks[]" value="<?php echo $v['remarks']; ?>" class="layui-input"></td>
                                                    <td><a class="layui-btn layui-btn-normal layui-btn-radius" onclick="removeUser(this,'workinfo',<?php echo $v['wid']; ?>)">移除</a></td>
                                                </tr>
                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </tbody>
                                        <script>
                                            // 入职前培训
                                            function addUserFour(){
                                                var idNum3 = parseInt(Math.random()*20+40);
                                                $('#user_four').append('<tr>\n' +
                                                    '                                            <input type="hidden" name="fourid[]" value="" class="layui-input">\n' +
                                                    '                                            <td><input type="text" name="four_train_name[]" class="layui-input"></td>\n' +
                                                    '                                            <td class="layui-form-item"><input type="text" name="four_train_start_date[]" class="layui-input" id="four_train_start_date'+idNum3+'"></td>\n' +
                                                    '                                            <td class="layui-form-item"><input type="text" name="four_train_end_date[]" class="layui-input" id="four_train_end_date'+idNum3+'"></td>\n' +
                                                    '                                            <td><input type="text" name="four_train_company[]" class="layui-input"></td>\n' +
                                                    '                                            <td><input type="text" name="four_remarks[]" class="layui-input"></td>\n' +
                                                    '                                            <td><a class="layui-btn layui-btn-normal layui-btn-radius" onclick="removeUser(this)">移除</a></td>\n' +
                                                    '                                        </tr>');
                                                renderDate(idNum3);
                                            }

                                        </script>
                                    </table>
                                </div>
                                <div class="layui-tab-item">
                                    <div class="layui-card-header" style="margin-top:-20px;"><i class="fa fa-bars"></i> 资格证书 <span style="float: right"><i class="fa fa-plus-circle" onclick="addUserFive()" style="color: #07e4ef;font-size: 20px;"></i></span></div>
                                    <table lay-filter="parse-table-demo" class="layui-table">
                                        <thead>
                                        <tr>
                                            <th>名称</th>
                                            <th>开始日期</th>
                                            <th>结束日期</th>
                                            <th>颁发单位</th>
                                            <th width="5%"></th>
                                        </tr>
                                        </thead>
                                        <tbody id="user_five">
                                            <?php if(is_array($workinfoFive) || $workinfoFive instanceof \think\Collection || $workinfoFive instanceof \think\Paginator): $i = 0; $__LIST__ = $workinfoFive;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                                <tr>
                                                    <input type="hidden" name="fiveid[]" value="<?php echo $v['wid']; ?>" class="layui-input">
                                                    <td><input type="text" name="five_name[]" value="<?php echo $v['five_name']; ?>" class="layui-input"></td>
                                                    <td class="layui-form-item"><input type="text" name="five_start_date[]" value="<?php echo $v['five_start_date']; ?>" class="layui-input" id="five_start_date"></td>
                                                    <td class="layui-form-item"><input type="text" name="five_end_date[]" value="<?php echo $v['five_end_date']; ?>" class="layui-input" id="five_end_date"></td>
                                                    <td><input type="text" name="five_Issuing_unit[]" value="<?php echo $v['five_Issuing_unit']; ?>" class="layui-input"></td>
                                                    <td><a class="layui-btn layui-btn-normal layui-btn-radius" onclick="removeUser(this,'workinfo',<?php echo $v['wid']; ?>)">移除</a></td>
                                                </tr>
                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </tbody>
                                        <script>
                                            // 入职前培训
                                            function addUserFive(){
                                                var idNum4 = parseInt(Math.random()*20+60);
                                                $('#user_five').append('<tr>\n' +
                                                    '                                            <input type="hidden" name="fiveid[]" value="" class="layui-input">\n' +
                                                    '                                            <td><input type="text" name="five_name[]" class="layui-input"></td>\n' +
                                                    '                                            <td class="layui-form-item"><input type="text" name="five_start_date[]" class="layui-input" id="five_start_date'+idNum4+'"></td>\n' +
                                                    '                                            <td class="layui-form-item"><input type="text" name="five_end_date[]" class="layui-input" id="five_end_date'+idNum4+'"></td>\n' +
                                                    '                                            <td><input type="text" name="five_Issuing_unit[]" class="layui-input"></td>\n' +
                                                    '                                            <td><a class="layui-btn layui-btn-normal layui-btn-radius" onclick="removeUser(this)">移除</a></td>\n' +
                                                    '                                        </tr>');
                                                renderDate(idNum4);
                                            }

                                        </script>
                                    </table>
                                </div>
                                <div class="layui-tab-item">
                                    <div class="layui-card-header" style="margin-top:-20px;"><i class="fa fa-bars"></i> 入职前奖惩 <span style="float: right"><i class="fa fa-plus-circle" onclick="addUserSix()" style="color: #07e4ef;font-size: 20px;"></i></span></div>
                                    <table lay-filter="parse-table-demo" class="layui-table">
                                        <thead>
                                        <tr>
                                            <th>奖惩名称</th>
                                            <th>奖惩日期</th>
                                            <th>备注</th>
                                            <th width="5%"></th>
                                        </tr>
                                        </thead>
                                        <tbody id="user_six">
                                            <?php if(is_array($workinfoSix) || $workinfoSix instanceof \think\Collection || $workinfoSix instanceof \think\Paginator): $i = 0; $__LIST__ = $workinfoSix;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                                <tr>
                                                    <input type="hidden" name="sixid[]" value="<?php echo $v['wid']; ?>" class="layui-input">
                                                    <td><input type="text" name="six_name[]" value="<?php echo $v['six_name']; ?>" class="layui-input"></td>
                                                    <td class="layui-form-item"><input type="text" name="six_date[]" value="<?php echo $v['six_date']; ?>" class="layui-input" id="six_date"></td>
                                                    <td><input type="text" name="six_remarks[]" value="<?php echo $v['remarks']; ?>" class="layui-input"></td>
                                                    <td><a class="layui-btn layui-btn-normal layui-btn-radius" onclick="removeUser(this,'workinfo',<?php echo $v['wid']; ?>)">移除</a></td>
                                                </tr>
                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </tbody>
                                        <script>
                                            // 入职前培训
                                            function addUserSix(){
                                                var idNum5 = parseInt(Math.random()*20+80);
                                                $('#user_six').append('<tr>\n' +
                                                    '                                            <input type="hidden" name="sixid[]" value="" class="layui-input">\n' +
                                                    '                                            <td><input type="text" name="six_name[]" class="layui-input"></td>\n' +
                                                    '                                            <td class="layui-form-item"><input type="text" name="six_date[]" class="layui-input" id="six_date'+idNum5+'"></td>\n' +
                                                    '                                            <td><input type="text" name="six_remarks[]" class="layui-input"></td>\n' +
                                                    '                                            <td><a class="layui-btn layui-btn-normal layui-btn-radius" onclick="removeUser(this)">移除</a></td>\n' +
                                                    '                                        </tr>');
                                                renderDate(idNum5);
                                            }

                                        </script>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="layui-form-item layui-layout-admin">
                            <div class="layui-input-block">
                                <div class="layui-footer" style="left: 15px;background:#fff;">
                                    <input type="hidden" name="tab_type" value="工作信息">
                                    <input type="hidden" name="type" id="type" value="one">
                                    <button type="submit" class="layui-btn" lay-submit="" lay-filter="component-form-demo1">立即提交</button>
                                    <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                                    <a  class="layui-btn layui-btn-normal layui-btn-radius" onclick="javascript:history.go(-1);">返回</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="layui-tab-item">
        <div class="layui-fluid">
            <div class="layui-card">
                <div class="layui-card-body" style="padding: 30px;">
                    <form class="layui-form" action="" lay-filter="component-form-group" method="post" data-type="ajax">
                        <div class="layui-card-header" style="margin-top:-30px;"><i class="fa fa-bars"></i> 系统信息</div>
                        <div class="layui-form-item">
                            <div class="layui-inline">
                                <label class="layui-form-label"> 登录名</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="name" value="<?php echo $info['name']; ?>" lay-verify="required|name" lay-reqtext="登录名是必填项，岂能为空？" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label"> 密码</label>
                                <div class="layui-input-inline">
                                    <input type="password" name="cn_password" value="<?php echo $info['cn_password']; ?>" lay-verify="required|password" lay-reqtext="密码是必填项，岂能为空？" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label"> 密码确认</label>
                                <div class="layui-input-inline">
                                    <input type="password" name="cn_password_confirm" value="<?php echo $info['cn_password']; ?>" lay-verify="required|password" lay-reqtext="密码确认是必填项，岂能为空？" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label"> 电子邮件</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="email" value="<?php echo $info['email']; ?>" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label"> 安全级别</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="cn_aqjb" value="<?php echo $info['cn_aqjb']; ?>" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                        </div>

                        <div class="layui-form-item layui-layout-admin">
                            <div class="layui-input-block">
                                <div class="layui-footer" style="left: 15px;background:#fff;">
                                    <input type="hidden" name="tab_type" value="系统信息">
                                    <button type="submit" class="layui-btn" lay-submit="" lay-filter="component-form-demo1">立即提交</button>
                                    <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                                    <a  class="layui-btn layui-btn-normal layui-btn-radius" onclick="javascript:history.go(-1);">返回</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
      <div class="layui-tab-item">
          <div class="layui-fluid">
              <div class="layui-card">
                  <div class="layui-card-body" style="padding: 30px;">
                      <form class="layui-form" action="" lay-filter="component-form-group" method="post" data-type="ajax">
                          <div class="layui-card-header" style="margin-top:-30px;"><i class="fa fa-bars"></i> 财务信息</div>
                          <div class="layui-form-item">
                              <div class="layui-inline">
                                  <label class="layui-form-label"> 工资账号户名</label>
                                  <div class="layui-input-inline">
                                      <input type="text" name="cn_khh" value="<?php echo $info['cn_khh']; ?>" autocomplete="off" class="layui-input">
                                  </div>
                              </div>
                              <div class="layui-inline">
                                  <label class="layui-form-label"> 工资银行</label>
                                  <div class="layui-input-inline">
                                      <input type="text" name="cn_bank" value="<?php echo $info['cn_bank']; ?>" autocomplete="off" class="layui-input">
                                  </div>
                              </div>
                              <div class="layui-inline">
                                  <label class="layui-form-label"> 工资账号</label>
                                  <div class="layui-input-inline">
                                      <input type="text" name="cn_zzkh" value="<?php echo $info['cn_zzkh']; ?>" autocomplete="off" class="layui-input">
                                  </div>
                              </div>
                              <div class="layui-inline">
                                  <label class="layui-form-label"> 公积金帐户</label>
                                  <div class="layui-input-inline">
                                      <input type="text" name="cn_gjjzh" value="<?php echo $info['cn_gjjzh']; ?>" autocomplete="off" class="layui-input">
                                  </div>
                              </div>
                          </div>

                          <div class="layui-form-item layui-layout-admin">
                              <div class="layui-input-block">
                                  <div class="layui-footer" style="left: 15px;background:#fff;">
                                      <input type="hidden" name="tab_type" value="财务信息">
                                      <button type="submit" class="layui-btn" lay-submit="" lay-filter="component-form-demo1">立即提交</button>
                                      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                                      <a  class="layui-btn layui-btn-normal layui-btn-radius" onclick="javascript:history.go(-1);">返回</a>
                                  </div>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
      <div class="layui-tab-item">
          <div class="layui-fluid">
              <div class="layui-card">
                  <div class="layui-card-body" style="padding: 30px;">
                      <form class="layui-form" action="" lay-filter="component-form-group" method="post" data-type="ajax">

                          <div class="layui-card-header" style="margin-top:-20px;"><i class="fa fa-bars"></i> 资产信息 <span style="float: right"><i class="fa fa-plus-circle" onclick="addUserzcxx()" style="color: #07e4ef;font-size: 20px;"></i></span></div>
                          <table lay-filter="parse-table-demo" class="layui-table">
                              <thead>
                              <tr>
                                  <th width="10%">名称</th>
                                  <th>使用部门</th>
                                  <th>使用人</th>
                                  <th>单独核算</th>
                                  <th>规格型号</th>
                                  <th>资产组</th>
                                  <th>状态</th>
                                  <th>折旧年限</th>
                                  <th>残值率</th>
                                  <th width="5%"></th>
                              </tr>
                              </thead>
                              <tbody id="zcxx">
                                    <?php if(is_array($property) || $property instanceof \think\Collection || $property instanceof \think\Paginator): $i = 0; $__LIST__ = $property;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                        <tr>
                                            <input type="hidden" name="pid[]" value="<?php echo $v['pid']; ?>" class="layui-input">
                                            <td><input type="text" name="name[]" value="<?php echo $v['name']; ?>" class="layui-input"></td>
                                            <td>
                                                <div class="layui-inline" style="width:190px;" id="user_department">
                                                    <select name="user_department[]" lay-filter="brickType" lay-search>
                                                        <?php if(is_array($department) || $department instanceof \think\Collection || $department instanceof \think\Paginator): $i = 0; $__LIST__ = $department;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                                            <option value="<?php echo $vo['name']; ?>" <?php if($vo['name'] == $v['user_department']): ?>selected<?php endif; ?>><?php echo $vo['name']; ?></option>
                                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                                    </select>
                                                </div>
                                            </td>
                                            <td><input type="text" name="username[]" value="<?php echo $v['username']; ?>" readonly class="layui-input"></td>
                                            <td><input type="text" name="separate_accounting[]" value="<?php echo $v['separate_accounting']; ?>" class="layui-input"></td>
                                            <td><input type="text" name="specification[]" value="<?php echo $v['specification']; ?>" class="layui-input"></td>
                                            <td><input type="text" name="asset_group[]" value="<?php echo $v['asset_group']; ?>" class="layui-input"></td>
                                            <td><input type="text" name="status[]" value="<?php echo $v['status']; ?>" class="layui-input"></td>
                                            <td><input type="text" name="period_of_depreciation[]" value="<?php echo $v['period_of_depreciation']; ?>" class="layui-input"></td>
                                            <td><input type="text" name="salvage[]" value="<?php echo $v['salvage']; ?>" class="layui-input"></td>
                                            <td><a class="layui-btn layui-btn-normal layui-btn-radius" onclick="removeUser(this,'property',<?php echo $v['pid']; ?>)">移除</a></td>
                                        </tr>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                              </tbody>
                              <script>
                                  // 个人信息添加家庭情况
                                  function addUserzcxx(){
                                      var len = parseInt(Math.random()*100+(parseInt(Math.random()*20+100)));
                                      $('#zcxx').append('<tr>\n' +
                                          '                                    <input type="hidden" name="pid[]" value="" class="layui-input">\n' +
                                          '                                    <td><input type="text" name="name[]" class="layui-input"></td>\n' +
                                          '                                    <td>\n' +
                                          '                                         <div class="layui-inline" style="width:190px;" id="user_department'+len+'">\n' +
                                          '                                         </div>\n' +
                                          '                                    </td>\n' +
                                          '                                    <td><input type="text" name="username[]" value="<?php echo $info['name']; ?>" readonly class="layui-input"></td>\n' +
                                          '                                    <td><input type="text" name="separate_accounting[]" class="layui-input"></td>\n' +
                                          '                                    <td><input type="text" name="specification[]" class="layui-input"></td>\n' +
                                          '                                    <td><input type="text" name="asset_group[]" class="layui-input"></td>\n' +
                                          '                                    <td><input type="text" name="status[]" class="layui-input"></td>\n' +
                                          '                                    <td><input type="text" name="period_of_depreciation[]" class="layui-input"></td>\n' +
                                          '                                    <td><input type="text" name="salvage[]" class="layui-input"></td>\n' +
                                          '                                    <td><a class="layui-btn layui-btn-normal layui-btn-radius" onclick="removeUser(this)">移除</a></td>\n' +
                                          '                                </tr>');
                                      renderForm(len);
                                  }

                              </script>
                          </table>

                          <div class="layui-form-item layui-layout-admin">
                              <div class="layui-input-block">
                                  <div class="layui-footer" style="left: 15px;background:#fff;">
                                      <input type="hidden" name="tab_type" value="资产信息">
                                      <button type="submit" class="layui-btn" lay-submit="" lay-filter="component-form-demo1">立即提交</button>
                                      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                                      <a  class="layui-btn layui-btn-normal layui-btn-radius" onclick="javascript:history.go(-1);">返回</a>
                                  </div>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
<!--      <div class="layui-tab-item">-->
<!--          待办事项-->
<!--      </div>-->
<!--      <div class="layui-tab-item">-->
<!--          日程安排-->
<!--      </div>-->
<!--      <div class="layui-tab-item">-->
<!--          考勤情况-->
<!--      </div>-->
      <div class="layui-tab-item">
          <div class="layui-fluid">
              <div class="layui-card">
                  <div class="layui-card-body" style="padding: 30px;">
                      <form class="layui-form" action="" lay-filter="component-form-group" method="post" data-type="ajax">

                          <div class="layui-card-header" style="margin-top:-20px;"><i class="fa fa-bars"></i> 培训记录 <span style="float: right"><i class="fa fa-plus-circle" onclick="addUserpxjl()" style="color: #07e4ef;font-size: 20px;"></i></span></div>
                          <table lay-filter="parse-table-demo" class="layui-table">
                              <thead>
                              <tr>
                                  <th>培训活动名称</th>
                                  <th>开始日期 </th>
                                  <th>结束日期 </th>
                                  <th>考核情况</th>
                                  <th>考评情况 </th>
                                  <th width="5%"></th>
                              </tr>
                              </thead>
                              <tbody id="pxjl">
                                    <?php if(is_array($train) || $train instanceof \think\Collection || $train instanceof \think\Paginator): $i = 0; $__LIST__ = $train;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                        <tr>
                                            <input type="hidden" name="tid[]" value="<?php echo $v['tid']; ?>" class="layui-input">
                                            <td><input type="text" name="title[]" value="<?php echo $v['title']; ?>" class="layui-input"></td>
                                            <td><input type="text" name="start_date[]" value="<?php echo $v['start_date']; ?>" class="layui-input" id="train_start_date"></td>
                                            <td><input type="text" name="end_date[]" value="<?php echo $v['end_date']; ?>" class="layui-input" id="train_end_date"></td>
                                            <td><input type="text" name="assessment[]" value="<?php echo $v['assessment']; ?>" class="layui-input"></td>
                                            <td><input type="text" name="evaluation[]" value="<?php echo $v['evaluation']; ?>" class="layui-input"></td>
                                            <td><a class="layui-btn layui-btn-normal layui-btn-radius" onclick="removeUser(this,'train',<?php echo $v['tid']; ?>)">移除</a></td>
                                        </tr>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                              </tbody>
                              <script>
                                  // 个人信息添加家庭情况
                                  function addUserpxjl(){
                                      var tNum = parseInt(Math.random()*20+50);
                                      $('#pxjl').append('<tr>\n' +
                                          '                                    <input type="hidden" name="tid[]" value="" class="layui-input">\n' +
                                          '                                    <td><input type="text" name="title[]" class="layui-input"></td>\n' +
                                          '                                    <td><input type="text" name="start_date[]" class="layui-input" id="train_start_date'+tNum+'"></td>\n' +
                                          '                                    <td><input type="text" name="end_date[]" class="layui-input" id="train_end_date'+tNum+'"></td>\n' +
                                          '                                    <td><input type="text" name="assessment[]" class="layui-input"></td>\n' +
                                          '                                    <td><input type="text" name="evaluation[]" class="layui-input"></td>\n' +
                                          '                                    <td><a class="layui-btn layui-btn-normal layui-btn-radius" onclick="removeUser(this)">移除</a></td>\n' +
                                          '                                </tr>');
                                      renderDate(tNum);
                                  }

                              </script>
                          </table>

                          <div class="layui-form-item layui-layout-admin">
                              <div class="layui-input-block">
                                  <div class="layui-footer" style="left: 15px;background:#fff;">
                                      <input type="hidden" name="tab_type" value="培训记录">
                                      <button type="submit" class="layui-btn" lay-submit="" lay-filter="component-form-demo1">立即提交</button>
                                      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                                      <a  class="layui-btn layui-btn-normal layui-btn-radius" onclick="javascript:history.go(-1);">返回</a>
                                  </div>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
<!--      <div class="layui-tab-item">-->
<!--          奖惩考核-->
<!--      </div>-->
<!--      <div class="layui-tab-item">-->
<!--          <div class="layui-fluid">-->
<!--              <div class="layui-card">-->
<!--                  <div class="layui-card-body" style="padding: 30px;">-->
<!--                      <form class="layui-form" action="" lay-filter="component-form-group" method="post" data-type="ajax">-->
<!--                          <div class="layui-card-header" style="margin-top:-30px;"><i class="fa fa-bars"></i> 角色设置</div>-->
<!--                          <div class="layui-form-item">-->
<!--                              <div class="layui-inline">-->
<!--                                  <label class="layui-form-label"><span style="color:red">*</span> 所属角色</label>-->
<!--                                  <div class="layui-input-inline">-->
<!--                                      <input type="text" name="code" value="" lay-verify="required|code" lay-reqtext="编号是必填项，岂能为空？" autocomplete="off" class="layui-input">-->
<!--                                  </div>-->
<!--                              </div>-->
<!--                              <div class="layui-inline">-->
<!--                                  <label class="layui-form-label"><span style="color:red">*</span> 级别</label>-->
<!--                                  <div class="layui-input-inline">-->
<!--                                      <input type="text" name="code" value="" lay-verify="required|code" lay-reqtext="编号是必填项，岂能为空？" autocomplete="off" class="layui-input">-->
<!--                                  </div>-->
<!--                              </div>-->
<!--                          </div>-->

<!--                          <div class="layui-card-header" style="margin-top:-30px;"><i class="fa fa-bars"></i> 所属角色</div>-->
<!--                          <table lay-filter="parse-table-demo" class="layui-table">-->
<!--                              <thead>-->
<!--                              <tr>-->
<!--                                  <th>角色名称</th>-->
<!--                                  <th>级别</th>-->
<!--                                  <th width="5%"></th>-->
<!--                              </tr>-->
<!--                              </thead>-->
<!--                              <tbody id="about_language">-->

<!--                              </tbody>-->
<!--                          </table>-->

<!--                          <div class="layui-form-item layui-layout-admin">-->
<!--                              <div class="layui-input-block">-->
<!--                                  <div class="layui-footer" style="left: 15px;background:#fff;">-->
<!--                                      <button type="submit" class="layui-btn" lay-submit="" lay-filter="component-form-demo1">立即提交</button>-->
<!--                                      <button type="reset" class="layui-btn layui-btn-primary">重置</button>-->
<!--                                      <a  class="layui-btn layui-btn-normal layui-btn-radius" onclick="javascript:history.go(-1);">返回</a>-->
<!--                                  </div>-->
<!--                              </div>-->
<!--                          </div>-->
<!--                      </form>-->
<!--                  </div>-->
<!--              </div>-->
<!--          </div>-->
<!--      </div>-->
  </div>
</div>



<script src="__HOME__/js/jquery.min.js"></script>
<script src="__LAYUI__/layui.js" charset="utf-8"></script>
<script src="__LAYUI__/tab/layui.js?t=1619028572570"></script>
<script src="__ADMIN__/js/plugins/layer/layer.min.js"></script>

<script src="__LAYUI__/layer_hplus.js" charset="utf-8"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
<script>

    layui.use(['layedit', 'laydate'], function(){
        var laydate = layui.laydate;

        //日期
        laydate.render({
            elem: '#birth'
        });
        // 入职日期
        laydate.render({
            elem: '#repty_date'
        });
        // 入团
        laydate.render({
            elem: '#rutuan'
        });
        // 入党
        laydate.render({
            elem: '#rudang'
        });
        // 合同开始日期
        laydate.render({
            elem: '#htksrq'
        });
        // 合同结束日期
        laydate.render({
            elem: '#htjsrq'
        });
        // 试用期结束日期
        laydate.render({
            elem: '#syqjsrq'
        });
        // 教育情况开始日期
        laydate.render({
            elem: '#two_start_date'
            , trigger: 'click'
        });
        // 教育情况结束日期
        laydate.render({
            elem:'#two_end_date'
            , trigger: 'click'
        });
        // 入职前工作简历开始日期
        laydate.render({
            elem: '#three_start_date'
            , trigger: 'click'
        });
        // 入职前工作简历结束日期
        laydate.render({
            elem:'#three_end_date'
            , trigger: 'click'
        });
        // 入职前培训开始日期
        laydate.render({
            elem: '#four_train_start_date'
            , trigger: 'click'
        });
        // 入职前培训结束日期
        laydate.render({
            elem:'#four_train_end_date'
            , trigger: 'click'
        });
        // 资格证书开始日期
        laydate.render({
            elem: '#five_start_date'
            , trigger: 'click'
        });
        // 资格证书结束日期
        laydate.render({
            elem:'#five_end_date'
            , trigger: 'click'
        });
        // 入职前奖惩日期
        laydate.render({
            elem:'#six_date'
            , trigger: 'click'
        });

        // 培训记录开始日期
        laydate.render({
            elem:'#train_start_date'
            , trigger: 'click'
        });
        // 培训记录结束日期
        laydate.render({
            elem:'#train_end_date'
            , trigger: 'click'
        });
    });

    function random(number){
        var arr = [];
        while(arr.length < number) {   //原数组长度为0，每次成功添加一个元素后长度加1，当数组添加最后一个数字之前长度为number即可
            var num = Math.floor(Math.random() * 100);   //生成一个0-300的随机整数
            if(arr.length === 0){   //如果数组长度为0则直接添加到arr数组
                arr.push(num);
            }else {
                for (var i = 0; i < arr.length; i++) {   //当新生成的数字与数组中的元素不重合时则添加到arr数组
                    if (arr.join(',').indexOf(num) < 0) {
                        arr.push(num);
                    }
                }
            }
        }

        return arr;
    }

    var arrRandom = random(1);


    // 切换工作信息里面tab类型
    function getType(name){
        $('#type').val(name);
    }

    //重新渲染表单
    function renderForm(id){
        layui.use('form', function(){
            var form = layui.form;//高版本建议把括号去掉，有的低版本，需要加()
            if(id >= 0){
                $.post('<?php echo url("getUserDepartment"); ?>',function(resule,status){
                    var htmls = '<select name="user_department[]" lay-filter="brickType" lay-verify="required" lay-reqtext="使用部门是必填项，岂能为空？" lay-search>';
                    htmls += '<option value="">--请选择--</option>';
                    var data = resule.info;
                    for(var x in data){
                        htmls += '<option value = "' + data[x].name + '">' + data[x].name + '</option>';
                    }
                    htmls += '</select>';
                    $("#user_department"+id).append(htmls);

                    form.render('select');
                },'json');
            }else{
                form.render();
            }
        });
    }

    // 重新渲染时间控件
    function renderDate(idNum){
        layui.use('laydate', function() {
            var laydate = layui.laydate;
            // 教育情况开始日期
            laydate.render({
                elem: '#two_start_date'+idNum
                , trigger: 'click'
            });

            // 教育情况结束日期
            laydate.render({
                elem:'#two_end_date'+idNum
                , trigger: 'click'
            });
            // 入职前工作简历开始日期
            laydate.render({
                elem: '#three_start_date'+idNum
                , trigger: 'click'
            });
            // 入职前工作简历结束日期
            laydate.render({
                elem:'#three_end_date'+idNum
                , trigger: 'click'
            });

            // 入职前培训开始日期
            laydate.render({
                elem: '#four_train_start_date'+idNum
                , trigger: 'click'
            });
            // 入职前培训结束日期
            laydate.render({
                elem:'#four_train_end_date'+idNum
                , trigger: 'click'
            });
            // 资格证书开始日期
            laydate.render({
                elem: '#five_start_date'+idNum
                , trigger: 'click'
            });
            // 资格证书结束日期
            laydate.render({
                elem:'#five_end_date'+idNum
                , trigger: 'click'
            });
            // 入职前奖惩日期
            laydate.render({
                elem:'#six_date'+idNum
                , trigger: 'click'
            });

            // 培训记录开始日期
            laydate.render({
                elem:'#train_start_date'+idNum
                , trigger: 'click'
            });
            // 培训记录结束日期
            laydate.render({
                elem:'#train_end_date'+idNum
                , trigger: 'click'
            });
        });
    }

    // 个人信息删除
    function removeUser(obj,type,id){
        if(type == undefined){
            $(obj).parents('tr').remove();
            return false;
        }
        layer.msg('您确定要删除吗？', {
            time: 0 //不自动关闭
            ,btn: ['确认', '取消']
            ,yes: function(index){
                layer.close(index);
                $.ajax({
                    url:'<?php echo url("delTypeInfo"); ?>',
                    data:{type:type,id:id},
                    type:'POST',
                    dataType:'json',
                    success:function(data){
                        if(data.status == 'success'){
                            layer.msg(data.msg,{icon: 1},function(){
                                setTimeout(function(){
                                    $(obj).parents('tr').remove();
                                }, 100);
                            });
                        }else{
                            layer.msg(data.msg,{icon: 2});
                        }

                    },
                    error:function(){
                        layer.msg("请求失败");
                    }
                })
            }
        });
    }

// 拼音
function ConvertName(){
    var keyword = document.getElementById('name').value;
    var full = pinyin.getFullChars(keyword); //获取全写拼音
    var simply = pinyin.getCamelChars(keyword); //获取简写拼音(提取首字母并大写)
    document.getElementById('full').value = full;
    document.getElementById('simply').value = simply;//默认大写.可通过string.toLowerCase()转成小写
}

// 获取身份信息
function getIDCardInfo(){
   //获取输入身份证号码
   var IDcard = $('#IDcard').val();
   if(IDcard != null){

       //获取年龄
       var age = "";
       var myDate = new Date();
       var month = myDate.getMonth() + 1;
       var day = myDate.getDate();
       var age = myDate.getFullYear() - IDcard.substring(6, 10) - 1;
       if (IDcard.substring(10, 12) < month || IDcard.substring(10, 12) == month && IDcard.substring(12, 14) <= day) {
          age++;
       }
       $('#age').val(age);

       //获取出生日期
       var birthday = "";
       if(IDcard.length == 15){
          birthday = "19"+IDcard.substr(6,6);
       } else if(IDcard.length == 18){
          birthday = IDcard.substr(6,4) + '-' + IDcard.substr(10,2) + '-' + IDcard.substr(12,2);
       }

      $('#birth').val(birthday);
    }
}

</script>

</body>
</html>
