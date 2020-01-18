<?php
declare(strict_types=1);

namespace CreatorIq\Social\Network\Client;

use CreatorIq\Social\Model\InstagramAccount;

class InstagramAccountClient implements SocialClientInterface
{
    use GuzzleAwareTrait;

    /**
     * @param string $type
     *
     * @return bool
     */
    public function supports(string $type): bool
    {
        return InstagramAccount::class === $type;
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

        return \CreatorIq\Social\Data\Fixtures::instagramAccountData();
    }
}
