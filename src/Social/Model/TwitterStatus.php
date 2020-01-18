<?php
declare(strict_types=1);

namespace CreatorIq\Social\Model;

class TwitterStatus extends SocialModel
{
    /**
     * @var string
     */
    private $text;

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }
}
