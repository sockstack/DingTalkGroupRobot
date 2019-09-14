<?php


namespace SockStack\DingTalkGroupRobot;


use SockStack\DingTalkGroupRobot\contracts\RobotContract;
use SockStack\DingTalkGroupRobot\contracts\RobotBuilderContract;

/**
 * 机器人建造器
 * Class RobotBuilder
 * @package SockStack\DingTalkGroupRobot
 */
class RobotBuilder implements RobotBuilderContract
{
    /**
     * @var RobotBuilderContract 机器人
     */
    private static $robot;

    /**
     * 构建机器人
     * @param Config $config
     * @return RobotContract
     */
    static public function build(Config $config) : RobotContract
    {
        return static::$robot ?: static::$robot = new Robot($config);
    }
}