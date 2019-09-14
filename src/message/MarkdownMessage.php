<?php


namespace SockStack\DingTalkGroupRobot\message;


use SockStack\DingTalkGroupRobot\message\components\AtMobiles;
use SockStack\DingTalkGroupRobot\message\components\IsAtAll;
use SockStack\DingTalkGroupRobot\message\components\TextContent;
use SockStack\DingTalkGroupRobot\message\components\Tilte;

/**
 * 发送markdown消息
 * Class MarkdownMessage
 * @package SockStack\DingTalkGroupRobot\message
 */
class MarkdownMessage extends Message
{
    use TextContent, Tilte, AtMobiles, IsAtAll;

    /**
     * 获取消息类型
     * @return string
     */
    protected function getMsgType(): string
    {
        return "markdown";
    }

    /**
     * 获取传输数据
     * @return mixed
     */
    public function getMessageData(): array
    {
        return [
            "msgtype" => $this->getMsgType(),
            "markdown" => [
                "text" => $this->getTextContent(),
                "title" => $this->getTitle()
            ],
            "at" => [
                "atMobiles" => $this->getAtMobiles(),
                "isAtAll" => $this->isAtAll()
            ]
        ];
    }
}