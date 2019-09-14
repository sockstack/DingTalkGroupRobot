<?php


namespace SockStack\DingTalkGroupRobot;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use SockStack\DingTalkGroupRobot\contracts\HttpClientContract;
use SockStack\DingTalkGroupRobot\contracts\InstanceContract;
use SockStack\DingTalkGroupRobot\entity\MessageData;
use SockStack\DingTalkGroupRobot\entity\ResponseData;
use SockStack\DingTalkGroupRobot\exceptions\Exception;
use SockStack\DingTalkGroupRobot\exceptions\LogicException;
use SockStack\DingTalkGroupRobot\exceptions\RuntimeException;

/**
 * Class HttpClient
 * @package SockStack\DingTalkGroupRobot
 */
class HttpClient implements HttpClientContract
{
    use InstanceContract;
    /**
     * @var Client
     */
    private $http_client;

    /**
     * @var array
     */
    private $post_data;

    /**
     * 请求地址
     * @var strng
     */
    private $url;

    /**
     * HttpClient constructor.
     * @param Client $http_client
     */
    public function __construct(Client $http_client)
    {
        $this->http_client = $http_client;
    }


    /**
     * 构建post数据参数
     * @return array
     */
    private function buildRequestData() : array
    {
        return array_merge(
            $this->buildHeader(),
            [
                "json" => $this->post_data
            ]
        );
    }

    /**
     * 构建请求头
     * @return array
     */
    private function buildHeader() : array
    {
        return [
            "headers" => [
                "Content-Type" => "application/json;charset=utf-8"
            ]
        ];
    }

    /**
     * 设置发送数据
     * @param MessageData $data
     * @return $this
     */
    public function setPostData(MessageData $data): HttpClientContract
    {
        $this->post_data = $data->getMessage()->getMessageData();
        return $this;
    }

    /**
     * 设置请求地址
     * @param string $url
     * @return $this
     */
    public function setRequestUrl(string $url): HttpClientContract
    {
        $this->url = $url;

        return $this;
    }

    /**
     * 发送请求
     * @return ResponseData
     * @throws LogicException
     * @throws RuntimeException
     * @throws Exception
     */
    public function request() : ResponseData
    {
        if (!$this->url)
            throw new LogicException("调用逻辑错误，[请先设置请求地址]");

        if (!$this->post_data)
            throw new LogicException("调用逻辑错误，[请先设置发送数据]");

        try {
            //发送消息
            $response = $this->http_client->request("POST", $this->url, $this->buildRequestData());
        } catch (GuzzleException $exception) {
            throw new Exception($exception->getMessage(), $exception->getCode(), $exception);
        }

        $statusCode = $response->getStatusCode();
        $contents = $response->getBody()->getContents();
        if ($statusCode != 200)
            throw new RuntimeException("请求错误" . $contents, $statusCode, "");

        $contents = json_decode($contents, true);
        //处理结果并返回
        if (!isset($contents["errcode"])) $contents["errcode"] = 500;
        if (!isset($contents["errmsg"])) $contents["errmsg"] = "处理请求返回结果错误";

        $responseData = new ResponseData();
        $responseData->setErrCode((int) $contents["errcode"]);
        $responseData->setErrMsg($contents["errmsg"]);

        return $responseData;
    }

}