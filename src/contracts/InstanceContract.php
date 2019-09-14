<?php


namespace SockStack\DingTalkGroupRobot\contracts;


/**
 * 单例合约
 * Class InstanceContract
 * @package SockStack\DingTalkGroupRobot\contracts
 */
trait InstanceContract
{
    /**
     * 单例实例
     * @var self
     */
    private static $instance;

    /**
     * 获取实例
     * @param mixed ...$arg
     * @return self
     */
    public static function getInstance(...$arg) : self
    {
        return static::$instance ?: new static(...$arg);
    }
}