<?php


namespace SockStack\DingTalkGroupRobot\message\components;


/**
 * 0-按钮竖直排列，1-按钮横向排列
 * Class BtnOrientation
 * @package SockStack\DingTalkGroupRobot\message\components
 */
trait BtnOrientation
{
    private $btnOrientation = 0;

    /**
     * @return mixed
     */
    public function getBtnOrientation()
    {
        return $this->btnOrientation;
    }

    /**
     * @param mixed $btnOrientation
     */
    public function setBtnOrientation($btnOrientation)
    {
        $this->btnOrientation = $btnOrientation;
    }

}