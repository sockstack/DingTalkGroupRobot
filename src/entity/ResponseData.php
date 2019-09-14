<?php


namespace SockStack\DingTalkGroupRobot\entity;


/**
 * 响应数据
 * Class ResponseData
 * @package SockStack\DingTalkGroupRobot\entity
 */
class ResponseData
{
    /**
     * @var integer
     */
    private $err_code;

    /**
     * @return int
     */
    public function getErrCode(): int
    {
        return $this->err_code;
    }

    /**
     * @param int $err_code
     */
    public function setErrCode(int $err_code)
    {
        $this->err_code = $err_code;
    }

    /**
     * @return string
     */
    public function getErrMsg(): string
    {
        return $this->err_msg;
    }

    /**
     * @param string $err_msg
     */
    public function setErrMsg(string $err_msg)
    {
        $this->err_msg = $err_msg;
    }

    /**
     * @var string
     */
    private $err_msg;
}