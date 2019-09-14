<?php


namespace SockStack\DingTalkGroupRobot\message\components;


/**
 * 0-正常发消息者头像，1-隐藏发消息者头像
 * Class HideAvatar
 * @package SockStack\DingTalkGroupRobot\message\components
 */
trait HideAvatar
{
    private $hideAvatar = 0;

    /**
     * @return mixed
     */
    public function getHideAvatar()
    {
        return $this->hideAvatar;
    }

    /**
     * @param mixed $hideAvatar
     */
    public function setHideAvatar($hideAvatar)
    {
        $this->hideAvatar = $hideAvatar;
    }

}