<?php
declare(strict_types=1);

namespace CreatorIq\Social\Data;

use CreatorIq\Social\Data\Transformer\DataTransformerInterface;
use CreatorIq\Social\Exception\UnsupportedTypeException;
use CreatorIq\Social\Model\ModelInterface;
use Symfony\Component\Serializer\Serializer;

class DataTransformer
{
    /**
     * @var DataTransformerInterface[]
     */
    private $transformers = [];

    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * @param Serializer $serializer
     */
    public function __construct(Serializer $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param DataTransformerInterface $transformer
     */
    public function addTransformer(DataTransformerInterface $transformer): void
    {
        $transformer->setDenormalizer($this->serializer);

        $this->transformers[] = $transformer;
    }

    /**
     * @param array  $data
     * @param string $type
     *
     * @return ModelInterface
     *
     * @throws UnsupportedTypeException
     */
    public function transform(array $data, string $type): ModelInterface
    {
        foreach ($this->transformers as $transformer) {
            if ($transformer->supports($type, $data)) {
                return $transformer->transform($data, $type);
            }
        }

        throw new UnsupportedTypeException($type);
    }
}
