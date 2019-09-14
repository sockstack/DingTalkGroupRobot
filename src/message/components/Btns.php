<?php


namespace SockStack\DingTalkGroupRobot\message\components;


/**
 * 独立跳转ActionCard消息的按钮组
 * Trait Btns
 * @package SockStack\DingTalkGroupRobot\message\components
 */
trait Btns
{
    private $btns = [];

    /**
     * @return mixed
     */
    public function getBtns()
    {
        return $this->btns;
    }

    /**
     * @param mixed $btns
     */
    public function setBtns($btns)
    {
        $this->btns = $btns;
    }

    /**
     * 添加按钮
     * @param Btn $btn
     * @return $this
     */
    public function addBtn(Btn $btn) : self
    {
        array_push($this->btns, $btn);
        return $this;
    }

}