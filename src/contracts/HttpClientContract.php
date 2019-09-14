<?php


namespace SockStack\DingTalkGroupRobot\contracts;


use SockStack\DingTalkGroupRobot\entity\MessageData;
use SockStack\DingTalkGroupRobot\entity\ResponseData;
use SockStack\DingTalkGroupRobot\exceptions\LogicException;
use SockStack\DingTalkGroupRobot\exceptions\RuntimeException;

/**
 * HttpClient合约
 * Interface HttpClientContract
 * @package SockStack\DingTalkGroupRobot\contracts
 */
interface HttpClientContract
{

    /**
     * 设置发送数据
     * @param MessageData $data
     * @return $this
     */
    public function setPostData(MessageData $data) : self;

    /**
     * 设置请求地址
     * @param string $url
     * @return $this
     */
    public function setRequestUrl(string $url) : self;

    /**
     * 发送请求
     * @return ResponseData
     * @throws LogicException
     * @throws RuntimeException
     */
    public function request() : ResponseData;
}