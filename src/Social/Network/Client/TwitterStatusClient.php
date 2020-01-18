<?php
declare(strict_types=1);

namespace CreatorIq\Social\Network\Client;

use CreatorIq\Social\Model\TwitterStatus;

class TwitterStatusClient implements SocialClientInterface
{
    use GuzzleAwareTrait;

    /**
     * @param string $type
     *
     * @return bool
     */
    public function supports(string $type): bool
    {
        return TwitterStatus::class === $type;
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

        return \CreatorIq\Social\Data\Fixtures::twitterStatusData();
    }
}
