<?php
declare(strict_types=1);

namespace CreatorIq\Social\Factory;

use CreatorIq\Social\Provider;
use GuzzleHttp\Client as GuzzleClient;
use Symfony\Component\Serializer\Serializer;

class ProviderFactory
{
    /**
     * @param GuzzleClient $guzzleClient
     * @param Serializer   $serializer
     *
     * @return Provider
     */
    public static function create(GuzzleClient $guzzleClient, Serializer $serializer): Provider
    {
        $client = ClientFactory::withGuzzle($guzzleClient);
        $transformer = DataTransformerFactory::withSerializer($serializer);

        return new Provider($client, $transformer);
    }
}
