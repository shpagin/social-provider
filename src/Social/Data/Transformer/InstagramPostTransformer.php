<?php
declare(strict_types=1);

namespace CreatorIq\Social\Data\Transformer;

use CreatorIq\Social\Model\InstagramPost;
use CreatorIq\Social\Model\ModelInterface;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;

class InstagramPostTransformer implements DataTransformerInterface
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
        return InstagramPost::class === $type;
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
        // TODO: Implement data transformation for InstagramAccount.

        /** @var InstagramPost $model */
        $model = $this->denormalizer->denormalize($data, $type);

        return $model;
    }
}
