<?php
declare(strict_types=1);

namespace CreatorIq\Social\Provider;

use CreatorIq\Social\Model\ModelInterface;
use CreatorIq\Social\Model\TwitterStatus;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class TwitterStatusProvider extends AbstractProvider
{
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
        $data = \CreatorIq\Social\Data\Fixtures::twitterStatusData();

        /** @var TwitterStatus $status */
        $status = $this->createModel($data, TwitterStatus::class);

        return $status;
    }
}
