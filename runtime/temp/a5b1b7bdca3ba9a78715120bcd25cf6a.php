<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:102:"D:\phpstudy_pro\WWW\tp5-rbac-api\tp5-rbac-api/application/assessment\view\personnel\personnelsave.html";i:1615888870;}*/ ?>
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
  <style media="screen">
      .layui-inline{width: 345px;}
      .layui-form-label{width: 110px;}
      .layui-fluid{padding:15px}
  </style>
  <script src="__PY__/pinyin.js"></script>
</head>
<body>

  <div class="layui-fluid">
      <div class="layui-card">
        <div class="layui-card-header">员工基本信息</div>
        <div class="layui-card-body" style="padding: 15px;">
          <form class="layui-form" action="" lay-filter="component-form-group" method="post" data-type="ajax">
            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label"><span style="color:red">*</span> 工号</label>
                    <div class="layui-input-inline">
                        <input type="text" name="code" value="<?php echo $info['code']; ?>" lay-verify="required|code" lay-reqtext="工号是必填项，岂能为空？" autocomplete="off" class="layui-input">
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
                        <input type="tel" name="pingyin" value="<?php echo $info['pingyin']; ?>" lay-verify="pingyin" autocomplete="off" class="layui-input" id="full">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">英文名</label>
                    <div class="layui-input-inline">
                      <input type="tel" name="en_name" value="<?php echo $info['en_name']; ?>" lay-verify="en_name" autocomplete="off" class="layui-input">
                    </div>
                </div>

            </div>

            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label"><span style="color:red;">*</span> 是否为外籍</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="is_foreign" lay-verify="required" lay-reqtext="是否为外籍是必填项，岂能为空？">
                                <option value="是" <?php if($info['is_foreign'] == '是'): ?>selected<?php endif; ?>>是</option>
                                <option value="否" <?php if($info['is_foreign'] == '否'): ?>selected<?php endif; if(!$info['is_foreign']): ?>selected<?php endif; ?>>否</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label"><span style="color:red;">*</span> 身份证号码</label>
                    <div class="layui-input-inline">
                        <input type="text" name="IDcard" value="<?php echo $info['IDcard']; ?>" lay-verify="identity" id="IDcard" lay-reqtext="身份证号码是必填项，岂能为空？" autocomplete="off" class="layui-input" oninput="getIDCardInfo()">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">邮箱</label>
                    <div class="layui-input-inline">
                        <input type="text" name="email" value="<?php echo $info['email']; ?>" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">手机</label>
                    <div class="layui-input-inline">
                        <input type="text" name="phone" value="<?php echo $info['phone']; ?>" autocomplete="off" class="layui-input">
                    </div>
                </div>

            </div>

            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label"><span style="color:red;">*</span> 出生日期</label>
                    <div class="layui-input-inline">
                        <input type="text" name="birth" id="birth" value="<?php echo $info['birth']; ?>" lay-verify="required" lay-reqtext="出生日期是必填项，岂能为空？" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label"><span style="color:red;">*</span> 性别</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="sex" lay-verify="required" id="sex" lay-reqtext="性别是必填项，岂能为空？">
                                <option value="">请选择</option>
                                <option value="男" <?php if($info['sex'] == '男'): ?>selected<?php endif; ?>>男</option>
                                <option value="女" <?php if($info['sex'] == '女'): ?>selected<?php endif; ?>>女</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label"><span style="color:red;">*</span> 公司</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="personal_to_company_id"  lay-search lay-verify="required" lay-reqtext="公司是必填项，岂能为空？">
                                <option value="">请选择</option>
                                <?php if(is_array($personnelToCompanyInfo) || $personnelToCompanyInfo instanceof \think\Collection || $personnelToCompanyInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $personnelToCompanyInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                    <option value="<?php echo $v['id']; ?>" <?php if($info['personal_to_company_id'] == $v['id']): ?>selected<?php endif; ?>><?php echo $v['name']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label"><span style="color:red;">*</span> 部门</label>
                    <div class="layui-input-inline">
                        <input type="text" name="organization" id="organization" value="<?php echo $info['organization']; ?>" lay-verify="required" readonly style="color: gray;background-color: #ededef !important;" lay-reqtext="部门是必填项，请选择职位进行关联" autocomplete="off" class="layui-input">
                        <input type="hidden" name="organization_code" value="<?php echo $info['organization_code']; ?>" id="organization_code">
                    </div>
                </div>

            </div>

            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label"><span style="color:red;">*</span> 职位</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="position_id" lay-verify="required" lay-filter="position" lay-reqtext="职位是必填项，岂能为空？" lay-search>
                                <option value="">请选择</option>
                                <?php if(is_array($positionInfo) || $positionInfo instanceof \think\Collection || $positionInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $positionInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                    <option value="<?php echo $v['id']; ?>" <?php if($info['position_id'] == $v['id']): ?>selected<?php endif; ?>><?php echo $v['name']; ?>--<?php echo showPositionToOrganization($v['organization_code']); ?>--<?php echo showCity($v['organization_code']); ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">兼职</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="part_time_job" lay-filter="part_time_job" lay-search>
                                <option value="">请选择</option>
                                <?php if(is_array($positionInfo) || $positionInfo instanceof \think\Collection || $positionInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $positionInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                    <option value="<?php echo $v['id']; ?>" <?php if($info['part_time_job'] == $v['id']): ?>selected<?php endif; ?>><?php echo $v['name']; ?>--<?php echo showPositionToOrganization($v['organization_code']); ?>--<?php echo showCity($v['organization_code']); ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">兼职部门</label>
                    <div class="layui-input-inline">
                        <input type="text" name="ptj_class" id="ptj_class" value="<?php echo $info['ptj_class']; ?>" autocomplete="off" class="layui-input" readonly style="color: gray;background-color: #ededef !important;">
                        <input type="hidden" name="ptj_class_code" value="<?php echo $info['ptj_class_code']; ?>" id="ptj_class_code">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">汇报人</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="report_name">
                                <option value="">请选择</option>
                            </select>
                        </div>
                    </div>
                </div>

            </div>
            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label"><span style="color:red;">*</span> 入职日期</label>
                    <div class="layui-input-inline">
                        <input type="text" name="repty_date" id="repty_date" value="<?php echo $info['repty_date']; ?>" lay-verify="required" lay-reqtext="入职日期是必填项，岂能为空？" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label"> 离职日期</label>
                    <div class="layui-input-inline">
                        <input type="text" name="leave_date" id="leave_date" value="<?php echo $info['leave_date']; ?>" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label"><span style="color:red;">*</span> 员工类型</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="staff_type" lay-verify="required" lay-reqtext="员工类型是必填项，岂能为空？">
                                <option value="">请选择</option>
                                <option value="正式" <?php if($info['staff_type'] == '正式'): ?>selected<?php endif; ?>>正式</option>
                                <option value="劳务" <?php if($info['staff_type'] == '劳务'): ?>selected<?php endif; ?>>劳务</option>
                                <option value="实习" <?php if($info['staff_type'] == '实习'): ?>selected<?php endif; ?>>实习</option>
                                <option value="外派" <?php if($info['staff_type'] == '外派'): ?>selected<?php endif; ?>>外派</option>
                                <option value="兼职" <?php if($info['staff_type'] == '兼职'): ?>selected<?php endif; ?>>兼职</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label"><span style="color:red;">*</span> 员工状态</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="staff_status" lay-verify="required" lay-reqtext="员工类型是必填项，岂能为空？">
                                <option value="">请选择</option>
                                <option value="在职" <?php if($info['staff_status'] == '在职'): ?>selected<?php endif; ?>>在职</option>
                                <option value="离职" <?php if($info['staff_status'] == '离职'): ?>selected<?php endif; ?>>离职</option>
                            </select>
                        </div>
                    </div>
                </div>

            </div>

            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label"><span style="color:red;">*</span> 是否在试用期内</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="is_probation" lay-verify="required" lay-reqtext="是否在试用期内是必填项，岂能为空？">
                                <option value="是" <?php if($info['is_probation'] == '是'): ?>selected<?php endif; ?>>是</option>
                                <option value="否" <?php if($info['is_probation'] == '否'): ?>selected<?php endif; if(!$info['is_probation']): ?>selected<?php endif; ?>>否</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label"><span style="color:red;">*</span> 在通讯录中显示</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="is_directory_display">
                                <option value="是" <?php if($info['is_directory_display'] == '是'): ?>selected<?php endif; ?>>是</option>
                                <option value="否" <?php if($info['is_directory_display'] == '否'): ?>selected<?php endif; if(!$info['is_directory_display']): ?>selected<?php endif; ?>>否</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">试用期开始日期</label>
                    <div class="layui-input-inline">
                        <input type="text" name="probation_start_date" value="<?php echo $info['probation_start_date']; ?>" id="probation_start_date" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">试用期结束日期</label>
                    <div class="layui-input-inline">
                        <input type="text" name="probation_end_date" value="<?php echo $info['probation_end_date']; ?>" id="probation_end_date" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>


            </div>

            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">试用期期限(月)</label>
                    <div class="layui-input-inline">
                        <input type="text" name="probation_term" value="<?php echo $info['probation_term']; ?>" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">考勤规则</label>
                    <div class="layui-input-inline">
                        <input type="text" name="attendance_rules" value="<?php echo $info['attendance_rules']; ?>" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">试用期规则</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="probation_rules">
                                <option value="">请选择</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">年龄</label>
                    <div class="layui-input-inline">
                        <input type="text" name="age" id="age" value="<?php echo $info['age']; ?>" placeholder="" autocomplete="off" class="layui-input" readonly style="color: gray;background-color: #ededef !important;">
                    </div>
                </div>

            </div>

            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label"><span style="color:red;">*</span> 休假额度规则</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="leave_quota_rules">
                                <option value="">请选择</option>
                                <option value="有休假额度">有休假额度</option>
                                <option value="无休假额度">无休假额度</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label"><span style="color:red;">*</span> 休假使用规则</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="vacation_use_rules" lay-verify="required" lay-reqtext="休假使用规则是必填项，岂能为空？">
                                <option value="">请选择</option>
                                <option value="休假规则">休假规则</option>
                                <option value="总部规则">总部规则</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label"><span style="color:red;">*</span> 加班规则</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="work_overtime_rules" lay-verify="required" lay-reqtext="加班类型是必填项，岂能为空？">
                                <option value="">请选择</option>
                                <option value="使用班次中的加班规则">使用班次中的加班规则</option>
                                <option value="验证打卡记录与加班单">验证打卡记录与加班单</option>
                                <option value="仅验证打卡记录">仅验证打卡记录</option>
                                <option value="仅验证加班单">仅验证加班单</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">司龄(月)</label>
                    <div class="layui-input-inline">
                        <input type="text" name="driver_age" value="<?php echo $info['driver_age']; ?>" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>

            </div>

            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label"><span style="color:red;">*</span> 入职前工龄(月)</label>
                    <div class="layui-input-inline">
                        <input type="text" name="repty_first_age" value="<?php echo $info['repty_first_age']; ?>" lay-verify="required" lay-reqtext="入职前工龄（月）是必填项，岂能为空？" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">当前工龄(月)</label>
                    <div class="layui-input-inline">
                        <input type="text" name="now_age" placeholder="" value="<?php echo $info['now_age']; ?>" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label"><span style="color:red;">*</span> 是否占编</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="is_hc_control" lay-verify="required" lay-reqtext="是否占编是必填项，岂能为空？">
                                <option value="是" <?php if($info['is_hc_control'] == '是'): ?>selected<?php endif; ?>>是</option>
                                <option value="否" <?php if($info['is_hc_control'] == '否'): ?>selected<?php endif; if(!$info['is_hc_control']): ?>selected<?php endif; ?>>否</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label"><span style="color:red;">*</span> 休假起始类型</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="leave_entitlement_type" lay-verify="required" lay-reqtext="休假起始类型是必填项，岂能为空？">
                                <option value="">请选择</option>
                                <option value="按自然年计算休假额度">按自然年计算休假额度</option>
                                <option value="按入职日期计算休假额度">按入职日期计算休假额度</option>
                            </select>
                        </div>
                    </div>
                </div>

            </div>

            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label"><span style="color:red;">*</span> 班次类型</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="shift_type" lay-verify="required" lay-reqtext="班次类型是必填项，岂能为空？">
                                <option value="常日班">常日班</option>
                                <option value="轮排班">轮排班</option>
                                <option value="智能班">智能班</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label"><span style="color:red;">*</span> 发薪区域</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="cn_fxqy" lay-search lay-verify="required" lay-reqtext="发薪区域是必填项，岂能为空？">
                                <option value="">请选择</option>
                                <?php if(is_array($fxqyInfo) || $fxqyInfo instanceof \think\Collection || $fxqyInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $fxqyInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                    <option value="<?php echo $v['name']; ?>" <?php if($info['cn_fxqy'] == $v['name']): ?>selected<?php endif; ?>><?php echo $v['name']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">招聘来源</label>
                    <div class="layui-input-inline">
                        <input type="text" name="cn_zply" value="<?php echo $info['cn_zply']; ?>" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label"><span style="color:red;">*</span> 最高学历</label>
                    <div class="layui-input-inline">
                        <input type="text" name="cn_zgxl" lay-verify="required" value="<?php echo $info['cn_zgxl']; ?>" lay-reqtext="最高学历是必填项，岂能为空？" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>


            </div>

            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label"><span style="color:red;">*</span> 最高学历2</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="cn_zgxl_2" lay-search lay-verify="required" lay-reqtext="最高学历2是必填项，岂能为空？">
                                <option value="">请选择</option>
                                <option value="博士后" <?php if($info['cn_zgxl_2'] == '博士后'): ?>selected<?php endif; ?>>博士后</option>
                                <option value="博士" <?php if($info['cn_zgxl_2'] == '博士'): ?>selected<?php endif; ?>>博士</option>
                                <option value="硕士" <?php if($info['cn_zgxl_2'] == '硕士'): ?>selected<?php endif; ?>>硕士</option>
                                <option value="本科" <?php if($info['cn_zgxl_2'] == '本科'): ?>selected<?php endif; ?>>本科</option>
                                <option value="大专" <?php if($info['cn_zgxl_2'] == '大专'): ?>selected<?php endif; ?>>大专</option>
                                <option value="其他" <?php if($info['cn_zgxl_2'] == '其他'): ?>selected<?php endif; ?>>其他</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">学位</label>
                    <div class="layui-input-inline">
                        <input type="text" name="cn_xw" value="<?php echo $info['cn_xw']; ?>" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label"><span style="color:red;">*</span> 毕业院校</label>
                    <div class="layui-input-inline">
                        <input type="text" name="cn_byyx" value="<?php echo $info['cn_byyx']; ?>" lay-verify="required" lay-reqtext="毕业院校是必填项，岂能为空？" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label"><span style="color:red;">*</span> 所学专业</label>
                    <div class="layui-input-inline">
                        <input type="text" name="cn_sxzy" value="<?php echo $info['cn_sxzy']; ?>" lay-verify="required" lay-reqtext="所学专业是必填项，岂能为空？" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
            </div>

            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label"><span style="color:red;">*</span> 政治面貌</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="cn_zzmm" lay-search lay-verify="required" lay-reqtext="政治面貌是必填项，岂能为空？">
                                <option value="">请选择</option>
                                <option value="群众" <?php if($info['cn_zzmm'] == '群众'): ?>selected<?php endif; ?>>群众</option>
                                <option value="党员" <?php if($info['cn_zzmm'] == '党员'): ?>selected<?php endif; ?>>党员</option>
                                <option value="团员" <?php if($info['cn_zzmm'] == '团员'): ?>selected<?php endif; ?>>团员</option>
                                <option value="民主党派" <?php if($info['cn_zzmm'] == '民主党派'): ?>selected<?php endif; ?>>民主党派</option>
                                <option value="无党派人士" <?php if($info['cn_zzmm'] == '无党派人士'): ?>selected<?php endif; ?>>无党派人士</option>
                                <option value="其他" <?php if($info['cn_zzmm'] == '其他'): ?>selected<?php endif; ?>>其他</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label"><span style="color:red;">*</span> 婚姻</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="cn_hy" lay-verify="required" lay-reqtext="婚姻是必填项，岂能为空？">
                                <option value="">请选择</option>
                                <option value="已婚" <?php if($info['cn_hy'] == '已婚'): ?>selected<?php endif; ?>>已婚</option>
                                <option value="未婚" <?php if($info['cn_hy'] == '未婚'): ?>selected<?php endif; ?>>未婚</option>
                                <option value="离异" <?php if($info['cn_hy'] == '离异'): ?>selected<?php endif; ?>>离异</option>
                                <option value="未知" <?php if($info['cn_hy'] == '未知'): ?>selected<?php endif; ?>>未知</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">户籍</label>
                    <div class="layui-input-inline">
                        <input type="text" name="cn_hj" value="<?php echo $info['cn_hj']; ?>" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label"><span style="color:red;">*</span> 身份证详细地址</label>
                    <div class="layui-input-inline">
                        <input type="text" name="cn_sfzdz" value="<?php echo $info['cn_sfzdz']; ?>" lay-verify="required" lay-reqtext="身份证详细地址是必填项，岂能为空？" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
            </div>

            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label"><span style="color:red;">*</span> 现居住详细住址</label>
                    <div class="layui-input-inline">
                        <input type="text" name="cn_xjzddz" value="<?php echo $info['cn_xjzddz']; ?>" lay-verify="required" lay-reqtext="现居住详细地址是必填项，岂能为空？" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">公积金账号</label>
                    <div class="layui-input-inline">
                        <input type="text" name="cn_gjjzh" value="<?php echo $info['cn_gjjzh']; ?>" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">开户行</label>
                    <div class="layui-input-inline">
                        <input type="text" name="cn_khh" value="<?php echo $info['cn_khh']; ?>" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label"><span style="color:red;">*</span> 工资卡号</label>
                    <div class="layui-input-inline">
                        <input type="text" name="cn_zzkh" value="<?php echo $info['cn_zzkh']; ?>" lay-verify="required" lay-reqtext="工资卡号是必填项，岂能为空？" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
            </div>

            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">紧急联系人</label>
                    <div class="layui-input-inline">
                        <input type="text" name="cn_jjlxr" value="<?php echo $info['cn_jjlxr']; ?>" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">紧急联系人电话</label>
                    <div class="layui-input-inline">
                        <input type="text" name="cn_jjlxrdh" value="<?php echo $info['cn_jjlxrdh']; ?>" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">职级</label>
                    <div class="layui-input-inline">
                        <input type="text" name="cn_zj" value="<?php echo $info['cn_zj']; ?>" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label"><span style="color:red;">*</span> 是否是放射人员</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="cn_is_fsry" lay-verify="required" lay-reqtext="是否是放射人员是必填项，岂能为空？">
                                <option value="">请选择</option>
                                <option value="是" <?php if($info['cn_is_fsry'] == '是'): ?>selected<?php endif; ?>>是</option>
                                <option value="否" <?php if($info['cn_is_fsry'] == '否'): ?>selected<?php endif; ?>>否</option>
                            </select>
                        </div>
                    </div>
                </div>


            </div>

            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label"><span style="color:red;">*</span> 是否有派驻假</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="cn_is_pzj" lay-verify="required" lay-reqtext="是否有派驻假是必填项，岂能为空？">
                                <option value="">请选择</option>
                                <option value="是" <?php if($info['cn_is_pzj'] == '是'): ?>selected<?php endif; ?>>是</option>
                                <option value="否" <?php if($info['cn_is_pzj'] == '否'): ?>selected<?php endif; ?>>否</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label"><span style="color:red;">*</span> 是否有补贴</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="cn_is_bt" lay-verify="required" lay-reqtext="是否有补贴是必填项，岂能为空？">
                                <option value="">请选择</option>
                                <option value="是" <?php if($info['cn_is_bt'] == '是'): ?>selected<?php endif; ?>>是</option>
                                <option value="否" <?php if($info['cn_is_bt'] == '否'): ?>selected<?php endif; ?>>否</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label"><span style="color:red;">*</span> 是否有工龄工资</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="cn_is_glgz" lay-verify="required" lay-reqtext="是否有工龄工资是必填项，岂能为空？">
                                <option value="">请选择</option>
                                <option value="是" <?php if($info['cn_is_glgz'] == '是'): ?>selected<?php endif; ?>>是</option>
                                <option value="否" <?php if($info['cn_is_glgz'] == '否'): ?>selected<?php endif; ?>>否</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="layui-form-item layui-layout-admin">
              <div class="layui-input-block">
                <div class="layui-footer" style="left: 15px;background:#fff;">
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

<script src="__HOME__/js/jquery.min.js"></script>
<script src="__ADMIN__/js/plugins/layer/layer.min.js"></script>
<script src="__LAYUI__/layui.js" charset="utf-8"></script>
<script src="__LAYUI__/layer_hplus.js" charset="utf-8"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
<script>
layui.use(['form', 'layedit', 'laydate'], function(){
  var form = layui.form
  ,laydate = layui.laydate;

  //出生日期
  laydate.render({
    elem: '#birth'
  });

  //入职日期
  laydate.render({
    elem: '#repty_date'
  });

  //离职日期
  laydate.render({
    elem: '#leave_date'
  });

  //试用期开始日期
  laydate.render({
    elem: '#probation_start_date'
  });

  //试用期结束日期
  laydate.render({
    elem: '#probation_end_date'
  });

  // 部门
  form.on('select(position)', function (data) {
       $('#organization').val('');
       $('#organization_code').val('');
       var id = data.value;    // 职位id
       $.ajax({
       		url: '<?php echo url("getDepartment"); ?>',
          data: {id:id},
       		type: "post",
       		dataType : "json",
       		contentType : "application/json",
          headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
       		async: false,//这得注意是同步
       		success: function (result) {
              if(result.status == 'success'){
                  $('#organization').val(result.data.name);
                  $('#organization_code').val(result.data.organization_code);
              }
       		}
     	});

  })

  // 兼职
  form.on('select(part_time_job)', function (data) {
       $('#ptj_class').val('');
       $('#ptj_class_code').val('');
       var id = data.value;    // 职位id
       $.ajax({
       		url: '<?php echo url("getDepartment"); ?>',
          data: {id:id},
       		type: "post",
       		dataType : "json",
       		contentType : "application/json",
          headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
       		async: false,//这得注意是同步
       		success: function (result) {
              if(result.status == 'success'){
                  $('#ptj_class').val(result.data.name);
                  $('#ptj_class_code').val(result.data.organization_code);
              }
       		}
     	});

  })


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
