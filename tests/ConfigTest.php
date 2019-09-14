<?php


namespace SockStack\Test;


use PHPUnit\Framework\TestCase;
use SockStack\DingTalkGroupRobot\Config;
use SockStack\DingTalkGroupRobot\exceptions\InvalidArgumentException;

class ConfigTest extends TestCase
{
    /**
     * @var Config 配置
     */
    private $config;

    /**
     * @before
     */
    public function before() {
        $this->config = new Config();
    }

    /**
     * 测试传入参数
     */
    public function testArgument()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->config->setSendMessageUrl("https://oapi.dingtalk.com/robot/send");
    }

    /**
     * 测试是否传入access_token
     */
    public function testAccessToken() {
        $this->expectException(InvalidArgumentException::class);
        $this->config->setSendMessageUrl("https://oapi.dingtalk.com/robot/send?a=b");
    }
}