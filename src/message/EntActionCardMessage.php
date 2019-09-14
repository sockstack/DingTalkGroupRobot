<?php


namespace SockStack\DingTalkGroupRobot\message;


use SockStack\DingTalkGroupRobot\message\components\BtnOrientation;
use SockStack\DingTalkGroupRobot\message\components\HideAvatar;
use SockStack\DingTalkGroupRobot\message\components\SingleTitle;
use SockStack\DingTalkGroupRobot\message\components\SingleURL;
use SockStack\DingTalkGroupRobot\message\components\TextContent;
use SockStack\DingTalkGroupRobot\message\components\Tilte;

/**
 * 整体跳转ActionCard消息
 * Class EntActionCardMessage
 * @package SockStack\DingTalkGroupRobot\message
 */
class EntActionCardMessage extends Message
{
    use TextContent, Tilte, HideAvatar, BtnOrientation, SingleTitle, SingleURL;

    /**
     * 获取消息类型
     * @return string
     */
    protected function getMsgType(): string
    {
        return "actionCard";
    }

    /**
     * 获取传输数据
     * @return mixed
     */
    public function getMessageData(): array
    {
        return [
            "msgtype" => $this->getMsgType(),
            "actionCard" => [
                "text" => $this->getTextContent(),
                "title" => $this->getTitle(),
                "hideAvatar" => $this->getHideAvatar(),
                "btnOrientation" => $this->getBtnOrientation(),
                "singleTitle" => $this->getSingleTitle(),
                "singleURL" => $this->getSingleUrl()
            ]
        ];
    }
}