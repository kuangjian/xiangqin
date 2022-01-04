<?php
declare (strict_types = 1);

namespace app\controller;

use think\Request;
use app\BaseController;
use app\ReturnData;
use app\model\UserModel;

class User extends BaseController
{
    use ReturnData;
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index(Request $request)
    {
        $data = UserModel::getInstance()->getIndex($request);
        // dump($data);
        // exit();
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
        $data = UserModel::getInstance()->getRead($id);
        return $this->success($data);
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
