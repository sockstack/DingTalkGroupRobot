<?php


namespace SockStack\DingTalkGroupRobot\message\components;


/**
 * 单个按钮的方案。(设置此项和singleURL后btns无效)
 * Class SingleTitle
 * @package SockStack\DingTalkGroupRobot\message\components
 */
trait SingleTitle
{
    private $singleTitle;

    /**
     * @return mixed
     */
    public function getSingleTitle()
    {
        return $this->singleTitle;
    }

    /**
     * @param mixed $singleTitle
     */
    public function setSingleTitle($singleTitle)
    {
        $this->singleTitle = $singleTitle;
    }


}