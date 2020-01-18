<?php
declare(strict_types=1);

namespace CreatorIq\Social\Provider;

use CreatorIq\Social\Model\ModelInterface;
use CreatorIq\Social\Model\TwitterAccount;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class TwitterAccountProvider extends AbstractProvider
{
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
     * @param string $identifier
     *
     * @return ModelInterface
     *
     * @throws ExceptionInterface
     */
    public function get(string $identifier): ModelInterface
    {
        // TODO: implement data fetch over http
        // $this->guzzleClient->get(...);
        $data = \CreatorIq\Social\Data\Fixtures::twitterAccountData();

        /** @var TwitterAccount $account */
        $account = $this->createModel($data, TwitterAccount::class);

        return $account;
    }
}
