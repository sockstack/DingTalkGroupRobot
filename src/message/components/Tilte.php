<?php


namespace SockStack\DingTalkGroupRobot\message\components;


/**
 * 设置标题
 * Class Tilte
 * @package SockStack\DingTalkGroupRobot\message\components
 */
trait Tilte
{
    /**
     * @var string
     */
    private $title;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }
}