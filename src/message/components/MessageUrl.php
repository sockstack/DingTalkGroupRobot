<?php


namespace SockStack\DingTalkGroupRobot\message\components;


/**
 * 消息地址组件
 * Trait MessageUrl
 * @package SockStack\DingTalkGroupRobot\message\components
 */
trait MessageUrl
{
    /**
     * @var string
     */
    private $message_url;

    /**
     * @return mixed
     */
    public function getMessageUrl()
    {
        return $this->message_url;
    }

    /**
     * @param mixed $message_url
     */
    public function setMessageUrl($message_url)
    {
        $this->message_url = $message_url;
    }

}