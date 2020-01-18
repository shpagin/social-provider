<?php
declare(strict_types=1);

namespace CreatorIq\Social\Provider;

use CreatorIq\Social\Model\InstagramPost;
use CreatorIq\Social\Model\ModelInterface;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class InstagramPostProvider extends AbstractProvider
{
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
        $data = \CreatorIq\Social\Data\Fixtures::instagramPostData();

        /** @var InstagramPost $post */
        $post = $this->createModel($data, InstagramPost::class);

        return $post;
    }
}
