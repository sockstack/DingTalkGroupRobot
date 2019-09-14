<?php


namespace SockStack\Test;


use GuzzleHttp\Client;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;
use SockStack\DingTalkGroupRobot\Config;
use SockStack\DingTalkGroupRobot\entity\MessageData;
use SockStack\DingTalkGroupRobot\entity\ResponseData;
use SockStack\DingTalkGroupRobot\exceptions\InvalidArgumentException;
use SockStack\DingTalkGroupRobot\HttpClient;
use SockStack\DingTalkGroupRobot\message\components\Btn;
use SockStack\DingTalkGroupRobot\message\components\FeedCardItem;
use SockStack\DingTalkGroupRobot\message\EntActionCardMessage;
use SockStack\DingTalkGroupRobot\message\FeedCardMessage;
use SockStack\DingTalkGroupRobot\message\IndActionCardMessage;
use SockStack\DingTalkGroupRobot\message\LinkMessage;
use SockStack\DingTalkGroupRobot\message\MarkdownMessage;
use SockStack\DingTalkGroupRobot\message\TextMessage;
use SockStack\DingTalkGroupRobot\RobotBuilder;

/**
 * Class MessageTest
 * @package SockStack\Test
 */
class MessageTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /**
     * @var Config
     */
    private $robot_config;
    private $send_message_url = "https://oapi.dingtalk.com/robot/send?access_token=2a48c48e4c28adcbc5d6e659dab59d6890d056ac94d9d6e995beffdef36b1a30";

    /**
     * @before
     * @throws InvalidArgumentException
     */
    public function init()
    {
        $config = new Config();
        $config->setSendMessageUrl($this->send_message_url);
        $this->robot_config = $config;
    }

    /**
     * 发送请求
     * @param MessageData $messageData
     */
    public function send(MessageData $messageData)
    {
        //模拟测试
        $client = HttpClient::getInstance(new Client());

        $response = new ResponseData();
        $response->setErrMsg("ok");
        $response->setErrCode(0);

        $client = \Mockery::mock($client);

        $client->shouldReceive("setRequestUrl")->with($this->send_message_url)->andReturn($client);
        $client->shouldReceive("setPostData")->with($messageData)->andReturn($client);
        $client->shouldReceive("request")->andReturn($response);

        //获取发送消息
        $responseData = RobotBuilder::build($this->robot_config)->setHttpClient($client)->setMessageData($messageData)->send();

        $this->assertEquals($response, $responseData);
    }

    /**
     * 测试发送文本消息
     */
    public function testSendTextMessage()
    {
        //发送的消息
        $textMessage = new TextMessage();
        $textMessage->setTextContent("大家下午好");
        $messageData = new MessageData();
        $messageData->setMessage($textMessage);

        $this->send($messageData);
    }

    /**
     * 测试发送图文消息
     */
    public function testSendLinkMessage()
    {
        //发送的消息
        $linkMessage = new LinkMessage();
        $linkMessage->setTextContent("图文介绍图文介绍");
        $linkMessage->setTitle("图文标题");
        $linkMessage->setPicUrl("http://img0.ph.126.net/WPoHgfhyqEjUG_HP2AK7ow==/6631872608210454282.jpg");
        $linkMessage->setMessageUrl("http://www.sockstack.cn");

        $messageData = new MessageData();
        $messageData->setMessage($linkMessage);

        $this->send($messageData);

    }

    /**
     * 测试发送markdown消息
     */
    public function testSendMarkdownMessage()
    {
        $markdownMessage = new MarkdownMessage();
        $markdownMessage->setTitle("今天的天气");
        $markdownMessage->setTextContent("### 天气播报
> 今天天气很好！！！！25度，偏南风
        ");
        $markdownMessage->setIsAtAll(true);

        $messageData = new MessageData();
        $messageData->setMessage($markdownMessage);

        $this->send($messageData);
    }

    /**
     * 测试整体跳转ActionCard消息
     */
    public function testSendEntActionCardMessage()
    {
        $entActionCardMessage = new EntActionCardMessage();
        $entActionCardMessage->setTitle("标题");
        $entActionCardMessage->setTextContent("描述描述描述描述描述描述描述描述描述描述描述描述描述描述描述描述");
        $entActionCardMessage->setSingleTitle("博客");
        $entActionCardMessage->setSingleUrl("http://www.sockstack.cn");

        $messageData = new MessageData();
        $messageData->setMessage($entActionCardMessage);

        $this->send($messageData);
    }

    /**
     * 测试独立跳转ActionCard消息
     */
    public function testIndActionCardMessage()
    {
        $indActionCardMessage = new IndActionCardMessage();
        $indActionCardMessage->setTitle("标题");
        $indActionCardMessage->setTextContent("描述描述描述描述描述描述描述描述描述描述描述描述描述描述描述描述");

        $btn = new Btn();
        $btn->setTitle("博客");
        $btn->setActionUrl("http://www.sockstack.cn");
        $indActionCardMessage->addBtn($btn);

        $baidu = new Btn();
        $baidu->setTitle("百度");
        $baidu->setActionUrl("http://www.baidu.com");
        $indActionCardMessage->addBtn($baidu);

        $messageData = new MessageData();
        $messageData->setMessage($indActionCardMessage);

        $this->send($messageData);
    }

    /**
     * 测试FeedCard消息
     */
    public function testFeedCardMessage()
    {
        $feedCardMessage = new FeedCardMessage();
        $feedCardItem = new FeedCardItem();
        $feedCardItem->setTitle("博客");
        $feedCardItem->setMessageURL("http://www.sockstack.cn");
        $feedCardItem->setPicURL("http://pic23.nipic.com/20120830/9686992_180336646144_2.jpg");

        $feedCardItem1 = new FeedCardItem();
        $feedCardItem1->setTitle("百度");
        $feedCardItem1->setMessageURL("http://www.baidu.com");
        $feedCardItem1->setPicURL("http://pic13.nipic.com/20110409/7119492_114440620000_2.jpg");

        $feedCardItem2 = new FeedCardItem();
        $feedCardItem2->setTitle("QQ");
        $feedCardItem2->setMessageURL("http://www.qq.com");
        $feedCardItem2->setPicURL("http://pic25.nipic.com/20121117/9252150_165726249000_2.jpg");

        $feedCardMessage->addItem($feedCardItem)->addItem($feedCardItem1)->addItem($feedCardItem2);

        $messageData = new MessageData();
        $messageData->setMessage($feedCardMessage);

        $this->send($messageData);
    }
}