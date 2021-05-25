<?php

namespace app\assessment\model;

use think\Model;
use traits\model\SoftDelete;

class PersonnerlsWorkinfo extends Model
{
    protected $autoWriteTimestamp = 'datetime';
    protected $dateFormat = 'Y-m-d H:i:s';

    use SoftDelete;
    protected $deleteTime = 'delete_time';
}