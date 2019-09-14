<?php


namespace SockStack\DingTalkGroupRobot\message;


use SockStack\DingTalkGroupRobot\message\components\MessageUrl;
use SockStack\DingTalkGroupRobot\message\components\PicUrl;
use SockStack\DingTalkGroupRobot\message\components\TextContent;
use SockStack\DingTalkGroupRobot\message\components\Tilte;

/**
 * 图文消息
 * Class LinkMessage
 * @package SockStack\DingTalkGroupRobot\message
 */
class LinkMessage extends Message
{

    use TextContent, PicUrl, MessageUrl, Tilte;
    /**
     * 获取消息类型
     * @return string
     */
    protected function getMsgType(): string
    {
        return "link";
    }

    /**
     * 获取传输数据
     * @return mixed
     */
    final public function getMessageData(): array
    {
        return [
            "msgtype" => $this->getMsgType(),
            "link" => [
                "text" => $this->getTextContent(),
                "title" => $this->getTitle(),
                "picUrl" => $this->getPicUrl(),
                "messageUrl" => $this->getMessageUrl()
            ]
        ];
    }
}