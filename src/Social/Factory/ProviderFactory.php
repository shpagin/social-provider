<?php
declare(strict_types=1);

namespace CreatorIq\Social\Factory;

use CreatorIq\Social\Provider;
use GuzzleHttp\Client as GuzzleClient;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class ProviderFactory
{
    /**
     * @param GuzzleClient          $guzzleClient
     * @param DenormalizerInterface $denormalizer
     *
     * @return Provider
     */
    public static function create(GuzzleClient $guzzleClient, DenormalizerInterface $denormalizer): Provider
    {
        $client = ClientFactory::withGuzzle($guzzleClient);
        $transformer = DataTransformerFactory::withDenormalizer($denormalizer);

        return new Provider($client, $transformer);
    }
}
