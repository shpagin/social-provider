<?php
declare(strict_types=1);

namespace CreatorIq\Social\Model;

class InstagramPost extends SocialModel
{
    /**
     * @var string
     */
    private $caption;

    /**
     * @return string
     */
    public function getCaption(): string
    {
        return $this->caption;
    }

    /**
     * @param string $caption
     */
    public function setCaption(string $caption): void
    {
        $this->caption = $caption;
    }
}
