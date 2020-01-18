<?php
declare(strict_types=1);

namespace CreatorIq\Social\Data;

use CreatorIq\Social\Data\Transformer;

class DataTransformerFactory
{
    /**
     * @return array
     */
    public static function registered(): array
    {
        return [
            Transformer\InstagramAccountTransformer::class,
            Transformer\InstagramPostTransformer::class,
            Transformer\TwitterAccountTransformer::class,
            Transformer\TwitterStatusTransformer::class,
            // TODO: Add more transformers...
        ];
    }

    /**
     * @return DataTransformer
     */
    public static function create(): DataTransformer
    {
        $transformer = new DataTransformer();
        foreach (self::registered() as $type) {
            $transformer->addTransformer(new $type());
        }

        return $transformer;
    }
}
