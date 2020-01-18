<?php
declare(strict_types=1);

namespace CreatorIq\Social\Network;

use CreatorIq\Social\Network\Client\SocialClientInterface;
use GuzzleHttp\Client as GuzzleClient;
use CreatorIq\Social\Exception\UnsupportedTypeException;

class Client
{
    /**
     * @var SocialClientInterface[]
     */
    private $socialClients = [];

    /**
     * @var GuzzleClient
     */
    private $guzzleClient;

    /**
     * @param GuzzleClient $guzzleClient
     */
    public function __construct(GuzzleClient $guzzleClient)
    {
        $this->guzzleClient = $guzzleClient;
    }

    /**
     * @param SocialClientInterface $socialClient
     */
    public function addSocialClient(SocialClientInterface $socialClient): void
    {
        $socialClient->setGuzzleClient($this->guzzleClient);

        $this->socialClients[] = $socialClient;
    }

    /**
     * @param string $identifier
     * @param string $type
     *
     * @return array
     *
     * @throws UnsupportedTypeException
     */
    public function get(string $identifier, string $type): array
    {
        foreach ($this->socialClients as $socialClient) {
            if ($socialClient->supports($type)) {
                return $socialClient->get($identifier);
            }
        }

        throw new UnsupportedTypeException($type);
    }
}
