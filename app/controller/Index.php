<?php
namespace app\controller;

use app\BaseController;
use app\RandChinaName;

class Index extends BaseController
{
    public function index()
    {
        $rcn_ctr = new RandChinaName();
        return $rcn_ctr->getName(0);
    }

    public function hello($name = 'ThinkPHP6')
    {
        return 'hello,' . $name;
    }
}
