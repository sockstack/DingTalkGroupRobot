<?php


namespace SockStack\DingTalkGroupRobot\message\components;


/**
 * 图片地址组件
 * Trait PicUrl
 * @package SockStack\DingTalkGroupRobot\message\components
 */
trait PicUrl
{
    /**
     * @var string
     */
    private $pic_url;

    /**
     * @return string
     */
    public function getPicUrl(): string
    {
        return $this->pic_url;
    }

    /**
     * @param string $pic_url
     */
    public function setPicUrl(string $pic_url)
    {
        $this->pic_url = $pic_url;
    }
}