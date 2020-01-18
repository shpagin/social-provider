<?php
declare(strict_types=1);

namespace CreatorIq\Social\Provider;

use CreatorIq\Social\Model\InstagramAccount;
use CreatorIq\Social\Model\ModelInterface;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class InstagramAccountProvider extends AbstractProvider
{
    /**
     * @param string $type
     *
     * @return bool
     */
    public function supports(string $type): bool
    {
        return InstagramAccount::class === $type;
    }

    /**
     * @param string $identifier
     *
     * @return ModelInterface
     *
     * @throws ExceptionInterface
     */
    public function get(string $identifier): ModelInterface
    {
        // TODO: implement data fetch over http
        // $data = $this->guzzleClient->get(...);
        $data = \CreatorIq\Social\Data\Fixtures::instagramAccountData();

        /** @var InstagramAccount $model */
        $model = $this->createModel($data, InstagramAccount::class);

        return $model;
    }
}
