<?php


namespace SockStack\DingTalkGroupRobot\entity;


use SockStack\DingTalkGroupRobot\message\Message;

/**
 * 发送的数据
 * Class MessageData
 * @package SockStack\DingTalkGroupRobot\entity
 */
class MessageData
{
    /**
     * 发送的消息
     * @var Message
     */
    private $message;

    /**
     * @return Message
     */
    public function getMessage(): Message
    {
        return $this->message;
    }

    /**
     * @param Message $message
     */
    public function setMessage(Message $message)
    {
        $this->message = $message;
    }
}