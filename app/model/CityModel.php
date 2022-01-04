<?php
declare (strict_types = 1);

namespace app\model;

use app\model\BaseModel;

/**
 * @mixin \think\Model
 */
class CityModel extends BaseModel
{
    protected $name = 'city';

    public function getIndex($province_id = 0)
    {
        return CityModel::where('province_id', $province_id)->select()->toArray();
    }
}
