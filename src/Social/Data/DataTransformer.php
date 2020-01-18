<?php
declare(strict_types=1);

namespace CreatorIq\Social\Data;

use CreatorIq\Social\Data\Transformer\DataTransformerInterface;

class DataTransformer
{
    /**
     * @var DataTransformerInterface[]
     */
    private $transformers = [];

    /**
     * @param DataTransformerInterface $transformer
     */
    public function addTransformer(DataTransformerInterface $transformer): void
    {
        $this->transformers[] = $transformer;
    }

    /**
     * @param array  $data
     * @param string $type
     *
     * @return array
     */
    public function transform(array $data, string $type): array
    {
        foreach ($this->transformers as $transformer) {
            if ($transformer->supports($type)) {
                return $transformer->transform($data);
            }
        }

        return $data;
    }
}
