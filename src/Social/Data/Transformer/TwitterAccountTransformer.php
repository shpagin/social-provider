<?php
declare(strict_types=1);

namespace CreatorIq\Social\Data\Transformer;

use CreatorIq\Social\Model\TwitterAccount;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;

class TwitterAccountTransformer implements DataTransformerInterface
{
    use DenormalizerAwareTrait;

    /**
     * @param string $type
     *
     * @return bool
     */
    public function supports(string $type): bool
    {
        return TwitterAccount::class === $type;
    }

    /**
     * @param array $data
     *
     * @return array
     */
    public function transform(array $data): array
    {
        // TODO: Implement data transformation for TwitterAccount.

        return $data;
    }
}
