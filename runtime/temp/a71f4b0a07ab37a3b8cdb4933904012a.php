<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:96:"D:\phpstudy_pro\WWW\tp5-rbac-api\tp5-rbac-api/application/assessment\view\kpi\kpiassessment.html";i:1615533979;}*/ ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>静态表格</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link rel="stylesheet" href="__LAYUI__/css/layui.css" media="all">
  <link href="__HOME__/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">

  <style>
    .layui-card-header {
      height: 30px;
      line-height: 30px;
      font-size: 20px;
      text-align: center;
      font-weight: bold;
    }

    .layui-table>thead>tr>th {
      text-align: center;
    }

    .layui-table>tbody>tr>td {
      text-align: center;
    }
    .layui-table>tbody>tr>td>input {
      text-align: center;
    }
    .kpdf{
      display: initial;
      width: 50%;
      padding-left: 0;
      height: 30px;
    }
    .layui-textarea{
        min-height: 70px;
    }
    .textArea {
      height: 120px;
    }
    .textArea::-webkit-input-value{
      height: 120px;line-height: 120px
    }    /* 使用webkit内核的浏览器 */
    .textArea:-moz-value{
      height: 120px;line-height: 120px
    }                  /* Firefox版本4-18 */
    .textArea::-moz-value{
      height: 120px;line-height: 120px
    }                  /* Firefox版本19+ */
    .textArea:-ms-input-value{
      height: 120px;line-height: 120px
    }
  </style>
</head>

<body>


  <div class="layui-fluid">
    <div class="layui-row layui-col-space15">
      <div class="layui-col-md12">
        <form action="<?php echo url('kpiAssessmentSave'); ?>" method="post" data-type="ajax" class="layui-form">
        <div class="layui-card">
          <div class="layui-card-header" style="padding:10px">上海全景医学影像科技股份有限公司</div>
          <div class="layui-card-header">总部职能部门绩效考核表（基于KPI指标考核）</div>
          <div class="layui-card-body">
            <table class="layui-table">
              <colgroup>
                <col width="150">
                <col width="150">
                <col width="200">
                <col>
              </colgroup>
              <thead>
                <tr>
                  <th>部门</th>
                  <th colspan="2"><?php echo $info['department_name']; ?></th>
                  <th>部门负责人</th>
                  <th colspan="3"><?php echo $info['responsible']; ?></th>
                  <th>考评周期</th>
                  <th colspan="3"><?php echo $info['evaluation_cycle']; ?>-<?php echo $info['month']; ?></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td colspan="11" style="text-align:center;background: #ddfaff;">KPI指标部分（占比80％）</td>
                </tr>
                <tr>
                  <td>序号</td>
                  <td>KPI指标</td>
                  <td colspan="2">指标说明</td>
                  <td>权重</td>
                  <td colspan="2">达成情况描述</td>
                  <td>目标完成比例</td>
                  <td>中心领导评分</td>
                  <td>其他部门评分</td>
                  <td>考核委员评分</td>
                </tr>
                <?php if(!$kpiDepartmentQuotaInfo): ?>
                    <tr>
                        <td colspan="11"><span style="color:red;font-weight: 900;font-size: 20px;">KPI指标部分暂无数据，联系管理员添加KPI指标部分数据！<i class="fa fa-frown-o"></i></span></td>
                    </tr>
                <?php endif; if(is_array($kpiDepartmentQuotaInfo) || $kpiDepartmentQuotaInfo instanceof \think\Collection || $kpiDepartmentQuotaInfo instanceof \think\Paginator): $k = 0; $__LIST__ = $kpiDepartmentQuotaInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
                    <tr>
                        <td><?php echo $k; ?></td>
                        <td><?php echo $v['name']; ?></td>
                        <td colspan="2" style="text-align: left;"><?php echo $v['description']; ?></td>
                        <td><?php echo $v['weight']; ?>%</td>
                        <td colspan="2"><textarea name="quota[<?php echo $k; ?>][qkms]" placeholder="" class="layui-textarea" lay-verify="required" lay-reqtext="情况描述是必填项，岂能为空？" ><?php echo $kpiAssessmentQuotaInfo[$k]['qkms']; ?></textarea></td>
                        <td><input type="number" name="quota[<?php echo $k; ?>][mbwcbl]" autoComplete="off" class="layui-input" lay-verify="required" lay-reqtext="目标完成比例是必填项，岂能为空？" value="<?php echo $kpiAssessmentQuotaInfo[$k]['mbwcbl']; ?>" ></td>
                        <td><input type="number" name="quota[<?php echo $k; ?>][zxldpf]" autoComplete="off" class="layui-input" lay-verify="required" lay-reqtext="中心领导评分是必填项，岂能为空？" value="<?php echo $kpiAssessmentQuotaInfo[$k]['zxldpf']; ?>" ></td>
                        <td><input type="number" name="quota[<?php echo $k; ?>][qtbmpf]" autoComplete="off" class="layui-input" lay-verify="required" lay-reqtext="其他部门评分是必填项，岂能为空？" value="<?php echo $kpiAssessmentQuotaInfo[$k]['qtbmpf']; ?>" ></td>
                        <td><input type="number" name="quota[<?php echo $k; ?>][khwypf]" autoComplete="off" class="layui-input" lay-verify="required" lay-reqtext="考核委员评分是必填项，岂能为空？" value="<?php echo $kpiAssessmentQuotaInfo[$k]['khwypf']; ?>" ></td>
                    </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>

                <tr>
                  <td colspan="11" style="text-align:center;background: #ddfaff;">管理要项部分（占比20%）</td>
                </tr>
                <tr>
                  <td>序号</td>
                  <td>管理要项</td>
                  <td colspan="2" width="20%">评价标准</td>
                  <td width="5%">权重</td>
                  <td colspan="2" width="30%">达成情况描述</td>
                  <td>目标完成比例</td>
                  <td>中心领导评分</td>
                  <td>其他部门评分</td>
                  <td>考核委员评分</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>企业文化</td>
                  <td colspan="2" style="text-align: left;">认同全景企业文化，践行全景核心价值观，对企业忠诚，有责任和担当，不回避责任，积极主动地以主人翁的态度去完成工作。</td>
                  <td>40%</td>
                  <td colspan="2"><textarea name="quotaqywh[dcqk]" placeholder="" class="layui-textarea" lay-verify="required" lay-reqtext="达成情况描述是必填项，岂能为空？" ><?php echo $kpiAssessmentQuotaQYWHInfo['dcqk']; ?></textarea></td>
                  <td><input type="number" name="quotaqywh[mbwcbl]" value="<?php echo $kpiAssessmentQuotaQYWHInfo['mbwcbl']; ?>" autoComplete="off" class="layui-input" lay-verify="required" lay-reqtext="目标完成比例是必填项，岂能为空？" ></td>
                  <td><input type="number" name="quotaqywh[zxldpf]" value="<?php echo $kpiAssessmentQuotaQYWHInfo['zxldpf']; ?>" autoComplete="off" class="layui-input" lay-verify="required" lay-reqtext="中心领导评分是必填项，岂能为空？" ></td>
                  <td><input type="number" name="quotaqywh[qtbmpf]" value="<?php echo $kpiAssessmentQuotaQYWHInfo['qtbmpf']; ?>" autoComplete="off" class="layui-input" lay-verify="required" lay-reqtext="其他部门评分是必填项，岂能为空？" ></td>
                  <td><input type="number" name="quotaqywh[khwypf]" value="<?php echo $kpiAssessmentQuotaQYWHInfo['khwypf']; ?>" autoComplete="off" class="layui-input" lay-verify="required" lay-reqtext="考核委员评分是必填项，岂能为空？" ></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>团队管理</td>
                  <td colspan="2" style="text-align: left;">使团队富有成效，使员工富有成就感。带领团队交付结果，驱动与激励下属，持续提升团队专业水平、激发成员与公司共发展。</td>
                  <td>30%</td>
                  <td colspan="2"><textarea name="quotatdgl[dcqk]" placeholder="" class="layui-textarea" lay-verify="required" lay-reqtext="达成情况描述是必填项，岂能为空？" ><?php echo $kpiAssessmentQuotaTDGLInfo['dcqk']; ?></textarea></td>
                  <td><input type="number" name="quotatdgl[mbwcbl]" value="<?php echo $kpiAssessmentQuotaTDGLInfo['mbwcbl']; ?>" autoComplete="off" class="layui-input" lay-verify="required" lay-reqtext="目标完成比例是必填项，岂能为空？" ></td>
                  <td><input type="number" name="quotatdgl[zxldpf]" value="<?php echo $kpiAssessmentQuotaTDGLInfo['zxldpf']; ?>" autoComplete="off" class="layui-input" lay-verify="required" lay-reqtext="中心领导评分是必填项，岂能为空？" ></td>
                  <td><input type="number" name="quotatdgl[qtbmpf]" value="<?php echo $kpiAssessmentQuotaTDGLInfo['qtbmpf']; ?>" autoComplete="off" class="layui-input" lay-verify="required" lay-reqtext="其他部门评分是必填项，岂能为空？" ></td>
                  <td><input type="number" name="quotatdgl[khwypf]" value="<?php echo $kpiAssessmentQuotaTDGLInfo['khwypf']; ?>" autoComplete="off" class="layui-input" lay-verify="required" lay-reqtext="考核委员评分是必填项，岂能为空？" ></td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>自我学习</td>
                  <td colspan="2" style="text-align: left;">不断自我觉察或者接受别人的反馈，正确认识自己的优劣势，持续不断的反思和行动，转变心智和行为模式，提升自己素质。</td>
                  <td>30%</td>
                  <td colspan="2"><textarea name="quotazwxx[dcqk]" placeholder="" class="layui-textarea" lay-verify="required" lay-reqtext="达成情况描述是必填项，岂能为空？" ><?php echo $kpiAssessmentQuotaZWXXInfo['dcqk']; ?></textarea></td>
                  <td><input type="number" name="quotazwxx[mbwcbl]" value="<?php echo $kpiAssessmentQuotaZWXXInfo['mbwcbl']; ?>" autoComplete="off" class="layui-input" lay-verify="required" lay-reqtext="目标完成比例是必填项，岂能为空？" ></td>
                  <td><input type="number" name="quotazwxx[zxldpf]" value="<?php echo $kpiAssessmentQuotaZWXXInfo['zxldpf']; ?>" autoComplete="off" class="layui-input" lay-verify="required" lay-reqtext="中心领导评分是必填项，岂能为空？" ></td>
                  <td><input type="number" name="quotazwxx[qtbmpf]" value="<?php echo $kpiAssessmentQuotaZWXXInfo['qtbmpf']; ?>" autoComplete="off" class="layui-input" lay-verify="required" lay-reqtext="其他部门评分是必填项，岂能为空？" ></td>
                  <td><input type="number" name="quotazwxx[khwypf]" value="<?php echo $kpiAssessmentQuotaZWXXInfo['khwypf']; ?>" autoComplete="off" class="layui-input" lay-verify="required" lay-reqtext="考核委员评分是必填项，岂能为空？" ></td>
                </tr>
                <tr>
                  <td colspan="2">考评得分</td>
                  <td>考评分合计</td>
                  <td colspan="2">奖金等级</td>
                  <td colspan="2">被考核部门负责人签字：</td>
                  <td colspan="2">考评委员签字：</td>
                  <td colspan="2">总裁签字：</td>
                </tr>
                <tr>
                  <td colspan="2">KPI完成：<input type="number" name="kpiwc"  value="<?php echo $kpiAssessmentQuotaKPIWCInfo; ?>" id="kpiwc" autoComplete="off" class="layui-input kpdf" oninput="sumKpf()"> 分</td>
                  <td rowspan="3"><textarea name="kpfhj" id="kpfhj" placeholder="" class="layui-textarea textArea" style="text-align:center;height: 128px;" ><?php echo $kpiAssessmentQuotaKPFHJInfo; ?></textarea></td>
                  <td rowspan="3" colspan="2" style="text-align: left;">
                    A、优秀 得100%（≥90分）<br />
                    B、良好 得90%（80~89分）<br />
                    C、合格 得80% （70~79分）<br />
                    D、不合格 得0（＜70分）
                  </td>
                  <td rowspan="3" colspan="2"><textarea name="bkhbmfzrqz"  placeholder="" class="layui-textarea textArea" style="text-align:center;height: 128px;"><?php echo $kpiAssessmentQuotaBKHBMFZRQZInfo; ?></textarea></td>
                  <td rowspan="3" colspan="2"><textarea name="kpwyqz"  placeholder="" class="layui-textarea textArea" style="text-align:center;height: 128px;"><?php echo $kpiAssessmentQuotaKPWYQZInfo; ?></textarea></td>
                  <td rowspan="3" colspan="2"><textarea name="zcqz"  placeholder="" class="layui-textarea textArea" style="text-align:center;height: 128px;"><?php echo $kpiAssessmentQuotaZCQZInfo; ?></textarea></td>
                </tr>
                <tr>
                  <td colspan="2">管理要项：<input type="number" name="glyx"  value="<?php echo $kpiAssessmentQuotaGLYXInfo; ?>" id="glyx" autoComplete="off" class="layui-input kpdf" oninput="sumKpf()"> 分</td>
                </tr>
                <tr>
                  <td colspan="2">加减分项：<input type="number" name="jjfx"  value="<?php echo $kpiAssessmentQuotaJJFXInfo; ?>" id="zjfx" autoComplete="off" class="layui-input kpdf" oninput="sumKpf()"> 分</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="layui-table-page">
            <div class="layui-card-body">
              <div class="layui-btn-container">
                <input type="hidden" name="department" value="<?php echo $info['department_name']; ?>" />
                <input type="hidden" name="responsible" value="<?php echo $info['responsible']; ?>" />
                <input type="hidden" name="evaluation_cycle" value="<?php echo $info['evaluation_cycle']; ?>-<?php echo $info['month']; ?>" />
                <input type="hidden" name="kpi_department_id" value="<?php echo $info['kpi_department_id']; ?>" />
                <?php if($kpiDepartmentQuotaInfo): ?>
                <button type="submit" class="layui-btn layui-btn-normal" lay-submit="" lay-filter="demo1" style="margin-top: -12px;">提交</button>
                <?php endif; ?>
                <a class="layui-btn layui-btn-normal layui-btn-radius" onclick="javascript:history.go(-1);" style="margin-top: -12px;">返回</a>
              </div>
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

  <script src="__HOME__/js/jquery.min.js"></script>
  <script src="__ADMIN__/js/plugins/layer/layer.min.js"></script>
  <script src="__LAYUI__/layui.js" charset="utf-8"></script>
  <script src="__LAYUI__/layer_hplus.js" charset="utf-8"></script>
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
  function sumKpf(){
      var kpiwc = $('#kpiwc').val();
      var glyx  = $('#glyx').val();
      var zjfx  = $('#zjfx').val();

      var sum = Number(kpiwc)+Number(glyx)+Number(zjfx);
      document.getElementById("kpfhj").value = sum;
  }
  </script>
</body>

</html>
