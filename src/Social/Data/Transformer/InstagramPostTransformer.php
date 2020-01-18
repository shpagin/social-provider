<?php
declare(strict_types=1);

namespace CreatorIq\Social\Data\Transformer;

use CreatorIq\Social\Model\InstagramPost;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;

class InstagramPostTransformer implements DataTransformerInterface
{
    use DenormalizerAwareTrait;

    /**
     * @param string $type
     *
     * @return bool
     */
    public function supports(string $type): bool
    {
        return InstagramPost::class === $type;
    }

    /**
     * @param array $data
     *
     * @return array
     */
    public function transform(array $data): array
    {
        // TODO: Implement data transformation for InstagramAccount.

        return $data;
    }
}
