<?php
declare(strict_types=1);

namespace CreatorIq\Social\Data\Transformer;

use CreatorIq\Social\Model\ModelInterface;
use CreatorIq\Social\Model\TwitterStatus;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;

class TwitterStatusTransformer implements DataTransformerInterface
{
    use DenormalizerAwareTrait;

    /**
     * @param string $type
     * @param array  $context
     *
     * @return bool
     */
    public function supports(string $type, array $context = []): bool
    {
        return TwitterStatus::class === $type;
    }

    /**
     * @param array  $data
     * @param string $type
     *
     * @return ModelInterface
     *
     * @throws ExceptionInterface
     */
    public function transform(array $data, string $type): ModelInterface
    {
        // TODO: Implement data transformation for TwitterStatus.

        /** @var TwitterStatus $model */
        $model = $this->denormalizer->denormalize($data, $type);

        return $model;
    }
}
