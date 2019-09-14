<?php


namespace SockStack\DingTalkGroupRobot\contracts;


use SockStack\DingTalkGroupRobot\entity\MessageData;
use SockStack\DingTalkGroupRobot\entity\ResponseData;
use SockStack\DingTalkGroupRobot\message\Message;

/**
 * 机器人合约
 * Interface RobotContract
 * @package SockStack\DingTalkGroupRobot\contracts
 */
interface RobotContract
{
    /**
     * 设置请求客户端
     * @param HttpClientContract $httpClient
     * @return $this
     */
    public function setHttpClient(HttpClientContract $httpClient) : self;

    /**
     * 设置要发送的消息
     * @param MessageData $message
     * @return $this
     */
    public function setMessageData(MessageData $message) : self;

    /**
     * 设置要发送的消息
     * @param Message $message
     * @return $this
     */
    public function setMessage(Message $message) : self;

    /**
     * 发送消息
     * @return ResponseData
     */
    public function send() : ResponseData;
}