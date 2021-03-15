<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:97:"D:\phpstudy_pro\WWW\tp5-rbac-api\tp5-rbac-api/application/assessment\view\personal\saveenpty.html";i:1615534486;}*/ ?>
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
      .layui-form-label{width: 100px;}
      .layui-fluid{padding:15px}
  </style>
  <script src="__PY__/pinyin.js"></script>
</head>
<body>

  <div class="layui-fluid">
      <div class="layui-card">
        <div class="layui-card-header">员工基本信息</div>
        <div class="layui-card-body" style="padding: 15px;">
          <form class="layui-form" action="" lay-filter="component-form-group">
            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">工号</label>
                    <div class="layui-input-inline">
                        <input type="text" name="code" lay-verify="required|number" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label"><span style="color:red;">*</span>姓名</label>
                    <div class="layui-input-inline">
                        <input type="text" name="name" lay-verify="name" placeholder="" autocomplete="off" class="layui-input" id="name" oninput="ConvertName()">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">拼音</label>
                    <div class="layui-input-inline">
                        <input type="tel" name="pingyin" lay-verify="pingyin" autocomplete="off" class="layui-input" id="full">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">英文名</label>
                    <div class="layui-input-inline">
                      <input type="tel" name="en_name" lay-verify="en_name" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">是否为外籍</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="is_foreign">
                                <option value="是">是</option>
                                <option value="否" selected>否</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">身份证号码</label>
                    <div class="layui-input-inline">
                        <input type="text" name="IDcard" lay-verify="required" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">邮箱</label>
                    <div class="layui-input-inline">
                        <input type="text" name="email" lay-verify="required|number" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">手机</label>
                    <div class="layui-input-inline">
                        <input type="text" name="phone" lay-verify="required|number" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">出生日期</label>
                    <div class="layui-input-inline">
                        <input type="text" name="birth" id="LAY-component-form-group-date" lay-verify="date" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">性别</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="sex">
                                <option value="">请选择</option>
                                <option value="男">男</option>
                                <option value="女">女</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">公司</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="organization_id"  lay-search >
                                <option value="">请选择</option>
                                <?php if(is_array($organizationInfo) || $organizationInfo instanceof \think\Collection || $organizationInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $organizationInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                    <option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">部门</label>
                    <div class="layui-input-inline">
                        <input type="text" name="department" lay-verify="required|number" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">职位</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="position">
                                <option value="">请选择</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">兼职</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="part_time_job">
                                <option value="">请选择</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">兼职部门</label>
                    <div class="layui-input-inline">
                        <input type="text" name="ptj_class" lay-verify="required|number" autocomplete="off" class="layui-input">
                    </div>
                </div>
            </div>

            <div class="layui-form-item">
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
                <div class="layui-inline">
                    <label class="layui-form-label">入职日期</label>
                    <div class="layui-input-inline">
                        <input type="text" name="repty_date" id="LAY-component-form-group-date" lay-verify="date" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">员工类型</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="staff_type">
                                <option value="">请选择</option>
                                <option value="正式">正式</option>
                                <option value="劳务">劳务</option>
                                <option value="实习">实习</option>
                                <option value="外派">外派</option>
                                <option value="兼职">兼职</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">员工状态</label>
                    <div class="layui-input-inline">
                        <input type="text" name="staff_status" lay-verify="required|number" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">是否在试用期内</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="is_probation">
                                <option value="是">是</option>
                                <option value="否" selected>否</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">在通讯录中显示</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="is_directory_display">
                                <option value="是">是</option>
                                <option value="否" selected>否</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">试用期开始日期</label>
                    <div class="layui-input-inline">
                        <input type="text" name="probation_start_date" id="LAY-component-form-group-date" lay-verify="date" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">试用期结束日期</label>
                    <div class="layui-input-inline">
                        <input type="text" name="probation_end_date" id="LAY-component-form-group-date" lay-verify="date" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">试用期期限(月)</label>
                    <div class="layui-input-inline">
                        <input type="text" name="probation_term" lay-verify="required|number" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">考勤规则</label>
                    <div class="layui-input-inline">
                        <input type="text" name="attendance_rules" lay-verify="required|number" autocomplete="off" class="layui-input">
                    </div>
                </div>
            </div>

            <div class="layui-form-item">
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
                        <input type="text" name="age" lay-verify="date" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">休假额度规则</label>
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
                    <label class="layui-form-label">休假使用规则</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="vacation_use_rules">
                                <option value="">请选择</option>
                                <option value="休假规则">休假规则</option>
                                <option value="总部规则">总部规则</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">加班规则</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="work_overtime_rules">
                                <option value="">请选择</option>
                                <option value="使用班次中的加班规则">使用班次中的加班规则</option>
                                <option value="验证打卡记录与加班单">验证打卡记录与加班单</option>
                                <option value="仅验证打卡记录">仅验证打卡记录</option>
                                <option value="仅验证加班单">仅验证加班单</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">司龄(月)</label>
                    <div class="layui-input-inline">
                        <input type="text" name="driver_age" lay-verify="date" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">入职前工龄(月)</label>
                    <div class="layui-input-inline">
                        <input type="text" name="repty_first_age" lay-verify="date" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">当前工龄(月)</label>
                    <div class="layui-input-inline">
                        <input type="text" name="now_age" lay-verify="date" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">是否占编</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="is_hc_control">
                                <option value="是">是</option>
                                <option value="否" selected>否</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">休假起始类型</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="leave_entitlement_type">
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
                    <label class="layui-form-label">班次类型</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="shift_type">
                                <option value="常日班">常日班</option>
                                <option value="轮排班">轮排班</option>
                                <option value="智能班">智能班</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">发薪区域</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="cn_fxqy" lay-search>
                                <option value="">请选择</option>
                                <?php if(is_array($fxqyInfo) || $fxqyInfo instanceof \think\Collection || $fxqyInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $fxqyInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                    <option value="<?php echo $v['name']; ?>"><?php echo $v['name']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">招聘来源</label>
                    <div class="layui-input-inline">
                        <input type="text" name="cn_zply" lay-verify="date" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">最高学历</label>
                    <div class="layui-input-inline">
                        <input type="text" name="cn_zgxl" lay-verify="date" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">最高学历2</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="cn_zgxl_2" lay-search>
                                <option value="">请选择</option>
                                <option value="博士后">博士后</option>
                                <option value="博士">博士</option>
                                <option value="硕士">硕士</option>
                                <option value="本科">本科</option>
                                <option value="大专">大专</option>
                                <option value="其他">其他</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">学位</label>
                    <div class="layui-input-inline">
                        <input type="text" name="cn_xw" lay-verify="date" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">毕业院校</label>
                    <div class="layui-input-inline">
                        <input type="text" name="cn_byyx" lay-verify="date" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">所学专业</label>
                    <div class="layui-input-inline">
                        <input type="text" name="cn_sxzy" lay-verify="date" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">政治面貌</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="cn_zzmm" lay-search>
                                <option value="">请选择</option>
                                <option value="群众">群众</option>
                                <option value="党员">党员</option>
                                <option value="团员">团员</option>
                                <option value="民主党派">民主党派</option>
                                <option value="无党派人士">无党派人士</option>
                                <option value="其他">其他</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">婚姻</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="cn_hy">
                                <option value="">请选择</option>
                                <option value="已婚">已婚</option>
                                <option value="未婚">未婚</option>
                                <option value="离异">离异</option>
                                <option value="未知">未知</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">户籍</label>
                    <div class="layui-input-inline">
                        <input type="text" name="cn_hj" lay-verify="date" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">身份证详细地址</label>
                    <div class="layui-input-inline">
                        <input type="text" name="cn_sfzdz" lay-verify="date" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">现居住详细住址</label>
                    <div class="layui-input-inline">
                        <input type="text" name="cn_xjzddz" lay-verify="date" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">公积金账号</label>
                    <div class="layui-input-inline">
                        <input type="text" name="cn_gjjzh" lay-verify="date" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">开户行</label>
                    <div class="layui-input-inline">
                        <input type="text" name="cn_khh" lay-verify="date" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
            </div>

            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">工资卡号</label>
                    <div class="layui-input-inline">
                        <input type="text" name="cn_zzkh" lay-verify="date" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">紧急联系人</label>
                    <div class="layui-input-inline">
                        <input type="text" name="cn_jjlxr" lay-verify="date" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">紧急联系人电话</label>
                    <div class="layui-input-inline">
                        <input type="text" name="cn_jjlxrdh" lay-verify="date" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">职级</label>
                    <div class="layui-input-inline">
                        <input type="text" name="cn_zj" lay-verify="date" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">是否是放射人员</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="cn_is_fsry">
                                <option value="">请选择</option>
                                <option value="是">是</option>
                                <option value="否">否</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">是否有派驻假</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="cn_is_pzj">
                                <option value="">请选择</option>
                                <option value="是">是</option>
                                <option value="否">否</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">是否有补贴</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="cn_is_bt">
                                <option value="">请选择</option>
                                <option value="是">是</option>
                                <option value="否">否</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">是否有工龄工资</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="width:190px;">
                            <select name="cn_is_glgz">
                                <option value="">请选择</option>
                                <option value="是">是</option>
                                <option value="否">否</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="layui-form-item layui-layout-admin">
              <div class="layui-input-block">
                <div class="layui-footer" style="left: 15px;background:#fff;">
                  <button class="layui-btn" lay-submit="" lay-filter="component-form-demo1">立即提交</button>
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

  //日期
  laydate.render({
    elem: '#LAY-component-form-group-date'
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
    var simply = pinyin.getCamelChars(keyword); //获取简写拼音(提取首字母并大写)
    document.getElementById('full').value = full;
    document.getElementById('simply').value = simply;//默认大写.可通过string.toLowerCase()转成小写
}
</script>

</body>
</html>