<?php
namespace app\assessment\model;

use think\Model;
use traits\model\SoftDelete;

class KpiDepartmentQuota extends Model{

    // 设置当前模型对应的完整数据表名称
    // protected $table = 'shwap_kpi_department';

    protected $autoWriteTimestamp = 'datetime';
    protected $dateFormat = 'Y-m-d H:i:s';

    use SoftDelete;
    protected $deleteTime = 'delete_time';
}
