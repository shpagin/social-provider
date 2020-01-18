<?php
declare(strict_types=1);

namespace CreatorIq\Social\Factory;

use GuzzleHttp\Client as GuzzleClient;
use CreatorIq\Social\Network\Client;

class ClientFactory
{
    public static function withGuzzle(GuzzleClient $guzzleClient): Client
    {
        $client = new Client($guzzleClient);

        $client->addSocialClient(new Client\InstagramAccountClient());
        $client->addSocialClient(new Client\InstagramPostClient());

        $client->addSocialClient(new Client\TwitterAccountClient());
        $client->addSocialClient(new Client\TwitterStatusClient());

        // TODO: Add more clients...

        return $client;
    }
}
