<?php
declare(strict_types=1);

namespace CreatorIq\Social\Data\Transformer;

use CreatorIq\Social\Model\ModelInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;

interface DataTransformerInterface extends DenormalizerAwareInterface
{
    /**
     * @param string $type
     * @param array  $context
     *
     * @return bool
     */
    public function supports(string $type, array $context = []): bool;

    /**
     * @param array  $data
     * @param string $type
     *
     * @return ModelInterface
     */
    public function transform(array $data, string $type): ModelInterface;
}
