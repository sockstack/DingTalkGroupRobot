<?php


namespace SockStack\DingTalkGroupRobot;


use SockStack\DingTalkGroupRobot\exceptions\InvalidArgumentException;

/**
 * 配置
 * Class Config
 * @package SockStack\DingTalkGroupRobot
 */
class Config
{
    /**
     * @var string 发送消息地址
     */
    private $send_message_url = "https://oapi.dingtalk.com/robot/send";
    /**
     * @var string 消息密钥
     */
    private $secret;

    /**
     * @param bool $encode
     * @return mixed
     */
    public function getSendMessageUrl($encode=false)
    {
        $url = $this->send_message_url . "?access_token=" . $this->secret;
        return !$encode ? $url : urlencode($url);
    }

    /**
     * @param string $send_message_url
     * @throws InvalidArgumentException
     */
    public function setSendMessageUrl(string $send_message_url)
    {
        //1.解析地址
        $parse_url = parse_url($send_message_url);
        if (!isset($parse_url["scheme"]) || !in_array($parse_url["scheme"], ["http", "https"]) ||
            !isset($parse_url["host"]) || !isset($parse_url["host"]) || !isset($parse_url["query"])) {
            throw new InvalidArgumentException("参数错误[发送地址错误]");
        }

        if (!isset($parse_url["host"]))
            throw new InvalidArgumentException("参数错误，发送地址错误");

        //2.构建send_message_url
        $this->send_message_url = $parse_url["scheme"] . "://" . $parse_url["host"] . $parse_url["path"];

        //3.解析路由参数
        parse_str($parse_url["query"], $parse_str);

        //4.如果没有携带认证密钥抛出异常->参数异常
        if (!isset($parse_str["access_token"]))
            throw new InvalidArgumentException("参数错误，[缺少access_token]");

        $this->secret = $parse_str["access_token"];
    }

    /**
     * @return mixed
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * @param mixed $secret
     */
    public function setSecret(string $secret)
    {
        $this->secret = $secret;
    }

}