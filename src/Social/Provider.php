<?php
declare(strict_types=1);

namespace CreatorIq\Social;

use CreatorIq\Social\Data\DataTransformer;
use CreatorIq\Social\Model\ModelInterface;
use CreatorIq\Social\Network\Client;

class Provider
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var DataTransformer
     */
    private $transformer;

    /**
     * @param Client          $client
     * @param DataTransformer $transformer
     */
    public function __construct(Client $client, DataTransformer $transformer)
    {
        $this->client = $client;
        $this->transformer = $transformer;
    }

    /**
     * @param string $identifier
     * @param string $type
     *
     * @return ModelInterface
     */
    public function get(string $identifier, string $type): ModelInterface
    {
        $socialData = $this->client->get($identifier, $type);

        return $this->transformer->transform($socialData, $type);
    }
}
