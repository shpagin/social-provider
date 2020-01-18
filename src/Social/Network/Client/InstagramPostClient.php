<?php
declare(strict_types=1);

namespace CreatorIq\Social\Network\Client;

use CreatorIq\Social\Model\InstagramPost;

class InstagramPostClient implements SocialClientInterface
{
    use GuzzleAwareTrait;

    /**
     * @param string $type
     *
     * @return bool
     */
    public function supports(string $type): bool
    {
        return InstagramPost::class === $type;
    }

    /**
     * @param string $identifier
     *
     * @return array
     */
    public function get(string $identifier): array
    {
        // TODO: implement data fetch over http
        // $this->guzzleClient->get(...);

        return \CreatorIq\Social\Data\Fixtures::instagramPostData();
    }
}
