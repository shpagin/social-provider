<?php
declare(strict_types=1);

namespace CreatorIq\Social\Factory;

use CreatorIq\Social\Data\DataTransformer;
use CreatorIq\Social\Data\Transformer\InstagramAccountTransformer;
use CreatorIq\Social\Data\Transformer\InstagramPostTransformer;
use CreatorIq\Social\Data\Transformer\TwitterAccountTransformer;
use CreatorIq\Social\Data\Transformer\TwitterStatusTransformer;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class DataTransformerFactory
{
    /**
     * @param DenormalizerInterface $denormalizer
     *
     * @return DataTransformer
     */
    public static function withDenormalizer(DenormalizerInterface $denormalizer): DataTransformer
    {
        $transformer = new DataTransformer($denormalizer);

        $transformer->addTransformer(new InstagramAccountTransformer());
        $transformer->addTransformer(new InstagramPostTransformer());

        $transformer->addTransformer(new TwitterAccountTransformer());
        $transformer->addTransformer(new TwitterStatusTransformer());

        // TODO: Add more transformers...

        return $transformer;
    }
}
