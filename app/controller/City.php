<?php
declare (strict_types = 1);

namespace app\controller;

use think\Request;
use app\BaseController;
use app\ReturnData;
use app\model\CityModel;

class City extends BaseController
{
    use ReturnData;

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index($id)
    {
        $data = CityModel::getInstance()->getIndex($id);
        return $this->success($data);
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
