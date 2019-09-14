<?php


namespace SockStack\DingTalkGroupRobot\message\components;


/**
 * 独立跳转ActionCard的按钮
 * Class Btn
 * @package SockStack\DingTalkGroupRobot\message\components
 */
class Btn
{
    /**
     * @var string 按钮名称
     */
    public $title;

    /**
     * @var string 按钮跳转地址
     */
    public $action_url;

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

    /**
     * @return string
     */
    public function getActionUrl(): string
    {
        return $this->action_url;
    }

    /**
     * @param string $action_url
     */
    public function setActionUrl(string $action_url)
    {
        $this->action_url = $action_url;
    }

}