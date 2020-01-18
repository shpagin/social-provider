<?php
declare(strict_types=1);

namespace CreatorIq\Social\Network\Client;

use GuzzleHttp\Client as GuzzleClient;

interface SocialClientInterface
{
    /**
     * @param GuzzleClient $guzzleClient
     */
    public function setGuzzleClient(GuzzleClient $guzzleClient): void;

    /**
     * @param string $type
     *
     * @return bool
     */
    public function supports(string $type): bool;

    /**
     * @param string $identifier
     *
     * @return array
     */
    public function get(string $identifier): array;
}
