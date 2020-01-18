<?php
declare(strict_types=1);

namespace CreatorIq\Social\Data\Transformer;

use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;

interface DataTransformerInterface extends DenormalizerAwareInterface
{
    /**
     * @param string $type
     *
     * @return bool
     */
    public function supports(string $type): bool;

    /**
     * @param array $data
     *
     * @return array
     */
    public function transform(array $data): array;
}
