<?php


namespace SockStack\DingTalkGroupRobot\message\components;


/**
 * 是否@所有人
 * Trait IsAtAll
 * @package SockStack\DingTalkGroupRobot\message
 */
trait IsAtAll
{
    /**
     * 是否@所有人
     * @var array
     */
    private $isAtAll = false;

    /**
     * @return bool
     */
    final public function isAtAll(): bool
    {
        return $this->isAtAll;
    }

    /**
     * @param bool $isAtAll
     */
    final public function setIsAtAll(bool $isAtAll)
    {
        $this->isAtAll = $isAtAll;
    }
}