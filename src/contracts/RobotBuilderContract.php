<?php


namespace SockStack\DingTalkGroupRobot\contracts;


use SockStack\DingTalkGroupRobot\Config;

/**
 * 机器人管理器
 * Interface RobotBuilderContract
 * @package SockStack\DingTalkGroupRobot\contracts
 */
interface RobotBuilderContract
{
    /**
     * 构建机器人
     * @param Config $config
     * @return RobotContract
     */
    static public function build(Config $config) : RobotContract;
}