<?php
declare(strict_types=1);

namespace CreatorIq\Social\Network\Client;

use CreatorIq\Social\Exception\UnsupportedTypeException;
use CreatorIq\Social\Model\TwitterAccount;

class TwitterAccountClient implements SocialClientInterface
{
    use GuzzleAwareTrait;

    /**
     * @param string $type
     *
     * @return bool
     */
    public function supports(string $type): bool
    {
        return TwitterAccount::class === $type;
    }

    /**
     * @param string $identifier
     * @param string $type
     *
     * @return array
     *
     * @throws UnsupportedTypeException
     */
    public function get(string $identifier): array
    {
        // TODO: implement data fetch over http
        // $this->guzzleClient->get(...);

        return \CreatorIq\Social\Data\Fixtures::twitterAccountData();
    }
}
