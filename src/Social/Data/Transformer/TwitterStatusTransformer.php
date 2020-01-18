<?php
declare(strict_types=1);

namespace CreatorIq\Social\Data\Transformer;

use CreatorIq\Social\Model\TwitterStatus;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;

class TwitterStatusTransformer implements DataTransformerInterface
{
    use DenormalizerAwareTrait;

    /**
     * @param string $type
     *
     * @return bool
     */
    public function supports(string $type): bool
    {
        return TwitterStatus::class === $type;
    }

    /**
     * @param array $data
     *
     * @return array
     */
    public function transform(array $data): array
    {
        // TODO: Implement data transformation for TwitterStatus.

        return $data;
    }
}
