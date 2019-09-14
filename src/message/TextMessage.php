<?php


namespace SockStack\DingTalkGroupRobot\message;


use SockStack\DingTalkGroupRobot\message\components\AtMobiles;
use SockStack\DingTalkGroupRobot\message\components\IsAtAll;
use SockStack\DingTalkGroupRobot\message\components\TextContent;

class TextMessage extends Message
{
    use IsAtAll, AtMobiles, TextContent;

    /**
     * 获取消息类型
     * @return string
     */
    protected function getMsgType(): string
    {
        return "text";
    }

    /**
     * 获取传输数据
     * @return mixed
     */
    final public function getMessageData(): array
    {
        return [
            "msgtype" => $this->getMsgType(),
            "text" => [
                "content" => $this->getTextContent()
            ],
            "at" => [
                "atMobiles" => $this->getAtMobiles(),
                "isAtAll" => $this->isAtAll()
            ]
        ];
    }
}