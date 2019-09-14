<?php


namespace SockStack\DingTalkGroupRobot\message;


use SockStack\DingTalkGroupRobot\message\components\BtnOrientation;
use SockStack\DingTalkGroupRobot\message\components\Btns;
use SockStack\DingTalkGroupRobot\message\components\HideAvatar;
use SockStack\DingTalkGroupRobot\message\components\TextContent;
use SockStack\DingTalkGroupRobot\message\components\Tilte;

/**
 * 独立跳转ActionCard消息
 * Class IndActionCardMessage
 * @package SockStack\DingTalkGroupRobot\message
 */
class IndActionCardMessage extends Message
{
    use TextContent, Tilte, HideAvatar, BtnOrientation, Btns;

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
        $data = [
            "msgtype" => $this->getMsgType(),
            "actionCard" => [
                "text" => $this->getTextContent(),
                "title" => $this->getTitle(),
                "hideAvatar" => $this->getHideAvatar(),
                "btnOrientation" => $this->getBtnOrientation(),
                "btns" => []
            ]
        ];

        $btns = $this->getBtns();
        foreach ($btns as $btn) {
            array_push($data["actionCard"]["btns"], json_decode(json_encode($btn), true));
        }

        return $data;
    }
}