<?php


namespace SockStack\DingTalkGroupRobot\message\components;


/**
 * Class FeedCardItem
 * @package SockStack\DingTalkGroupRobot\message\components
 */
class FeedCardItem
{
    public $title;

    public $messageURL;

    public $picURL;

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getMessageURL()
    {
        return $this->messageURL;
    }

    /**
     * @param mixed $messageURL
     */
    public function setMessageURL($messageURL)
    {
        $this->messageURL = $messageURL;
    }

    /**
     * @return mixed
     */
    public function getPicURL()
    {
        return $this->picURL;
    }

    /**
     * @param mixed $picURL
     */
    public function setPicURL($picURL)
    {
        $this->picURL = $picURL;
    }
}