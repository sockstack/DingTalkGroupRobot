<?php


namespace SockStack\DingTalkGroupRobot\message\components;


/**
 * 群@人
 * Trait AtMobiles
 * @package SockStack\DingTalkGroupRobot\message
 */
trait AtMobiles
{
    /**
     * @人列表
     * @var array
     */
    private $atMobiles = [];

    /**
     * @return array
     */
    final public function getAtMobiles(): array
    {
        return $this->atMobiles;
    }

    /**
     * @param array $atMobiles
     */
    final public function setAtMobiles(array $atMobiles)
    {
        $this->atMobiles = $atMobiles;
    }
}