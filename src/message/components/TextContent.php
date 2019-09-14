<?php


namespace SockStack\DingTalkGroupRobot\message\components;


trait TextContent
{
    /**
     * @var string
     */
    private $text_content;

    /**
     * @return string
     */
    final public function getTextContent(): string
    {
        return $this->text_content;
    }

    /**
     * @param string $text_content
     */
    final public function setTextContent(string $text_content)
    {
        $this->text_content = $text_content;
    }

}