<?php


namespace SockStack\DingTalkGroupRobot\message\components;


/**
 * 点击singleTitle按钮触发的URL
 * Class SingleURL
 * @package SockStack\DingTalkGroupRobot\message\components
 */
trait SingleURL
{
    private $singleUrl;

    /**
     * @return mixed
     */
    public function getSingleUrl()
    {
        return $this->singleUrl;
    }

    /**
     * @param mixed $singleUrl
     */
    public function setSingleUrl($singleUrl)
    {
        $this->singleUrl = $singleUrl;
    }

}