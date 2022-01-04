<?php
declare (strict_types = 1);

namespace app\model;

use think\Model;

/**
 * @mixin \think\Model
 */
class BaseModel extends Model
{
    private static $instances = [];

    // protected function __construct() { }

    // protected function __clone() { }

    // public function __wakeup()
    // {
    //     throw new \Exception("Cannot unserialize a singleton.");
    // }

    public static function getInstance()
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }
}
