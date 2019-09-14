<?php


namespace SockStack\DingTalkGroupRobot;


use GuzzleHttp\Client;
use SockStack\DingTalkGroupRobot\contracts\HttpClientContract;
use SockStack\DingTalkGroupRobot\contracts\MessageContract;
use SockStack\DingTalkGroupRobot\contracts\RobotContract;
use SockStack\DingTalkGroupRobot\entity\MessageData;
use SockStack\DingTalkGroupRobot\entity\ResponseData;
use SockStack\DingTalkGroupRobot\message\Message;

class Robot implements RobotContract
{
    /**
     * @var MessageData 需要发送的消息
     */
    private $message;

    /**
     * @var Config 机器人配置
     */
    private $config;

    /**
     * @var HttpClient
     */
    private $http_client;

    /**
     * Robot constructor.
     * @param $config
     */
    public function __construct($config)
    {
        $this->config = $config;
    }


    /**
     * 设置要发送的消息
     * @param MessageData $message
     * @return $this
     */
    public function setMessageData(MessageData $message): RobotContract
    {
        $this->message = $message;

        return $this;
    }

    /**
     * 设置要发送的消息
     * @param Message $message
     * @return $this
     */
    public function setMessage(Message $message): RobotContract
    {
        $messageData = new MessageData();
        $messageData->setMessage($messageData);
        $this->message = $messageData;

        return $this;
    }

    /**
     * 发送消息
     * @return ResponseData
     * @throws exceptions\LogicException
     * @throws exceptions\RuntimeException
     * @throws exceptions\Exception
     */
    public function send(): ResponseData
    {
        $responseData = $this->http_client
            ->setRequestUrl($this->config->getSendMessageUrl())
            ->setPostData($this->message)
            ->request();

        return $responseData;
    }

    /**
     * 设置请求客户端
     * @param HttpClientContract $httpClient
     * @return $this
     */
    public function setHttpClient(HttpClientContract $httpClient): RobotContract
    {
        $this->http_client = $httpClient;

        return $this;
    }
}