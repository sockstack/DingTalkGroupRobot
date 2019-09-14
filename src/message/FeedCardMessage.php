<?php


namespace SockStack\DingTalkGroupRobot\message;


use SockStack\DingTalkGroupRobot\message\components\FeedCardItem;
use SockStack\DingTalkGroupRobot\message\components\MessageUrl;
use SockStack\DingTalkGroupRobot\message\components\PicUrl;
use SockStack\DingTalkGroupRobot\message\components\Tilte;

/**
 * FeedCard消息
 * Class FeedCardMessage
 * @package SockStack\DingTalkGroupRobot\message
 */
class FeedCardMessage extends Message
{
    private $feedCards = [];

    public function addItem(FeedCardItem $item) : self
    {
        array_push($this->feedCards, $item);

        return $this;
    }
    /**
     * 获取消息类型
     * @return string
     */
    protected function getMsgType(): string
    {
        return "feedCard";
    }

    /**
     * 获取传输数据
     * @return mixed
     */
    public function getMessageData(): array
    {
        $data = [
            "msgtype" => $this->getMsgType(),
            "feedCard" => [
                "links" => []
            ]
        ];

        foreach ($this->feedCards as $item) {
            array_push($data["feedCard"]["links"], json_decode(json_encode($item), true));
        }

        return $data;
    }
}