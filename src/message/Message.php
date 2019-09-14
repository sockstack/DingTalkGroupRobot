<?php


namespace SockStack\DingTalkGroupRobot\message;


use SockStack\DingTalkGroupRobot\contracts\MessageContract;

abstract class Message implements MessageContract
{

    /**
     * 获取消息类型
     * @return string
     */
    abstract protected function getMsgType(): string;

    /**
     * 获取传输数据
     * @return mixed
     */
    abstract public function getMessageData() : array;
}