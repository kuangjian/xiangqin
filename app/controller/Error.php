<?php

namespace app\controller;

/**
 * 空控制器
 */
class Error
{
    function __call($method, $args)
    {
        return 'error request!';
    }
}