<?php
declare (strict_types = 1);

namespace app\model;

use app\model\BaseModel;

/**
 * @mixin \think\Model
 */
class ProvinceModel extends BaseModel
{
    protected $name = 'province';

    /**
     * [省份信息]
     * @return [type] [description]
     */
    public function getIndex()
    {
        return ProvinceModel::select()->toArray();
    }
}
