<?php
declare(strict_types=1);

namespace CreatorIq\Social;

use CreatorIq\Social\Data\DataTransformer;
use GuzzleHttp\Client as GuzzleClient;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class ProviderFactory
{
    /**
     * @return array
     */
    public static function registered(): array
    {
        return [
            Provider\InstagramAccountProvider::class,
            Provider\InstagramPostProvider::class,
            Provider\TwitterAccountProvider::class,
            Provider\TwitterStatusProvider::class,
            // TODO: Add more providers...
        ];
    }

    /**
     * @param GuzzleClient          $guzzleClient
     * @param DataTransformer       $transformer
     * @param DenormalizerInterface $denormalizer
     *
     * @return Provider
     */
    public static function create(
        GuzzleClient $guzzleClient,
        DataTransformer $transformer,
        DenormalizerInterface $denormalizer
    ): Provider
    {
        $provider = new Provider();
        foreach (self::registered() as $type) {
            $provider->addProvider(new $type($guzzleClient, $transformer, $denormalizer));
        }

        return $provider;
    }
}
