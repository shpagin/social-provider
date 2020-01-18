<?php
declare(strict_types=1);

namespace CreatorIq\Social\Provider;

use CreatorIq\Social\Data\DataTransformer;
use CreatorIq\Social\Model\ModelInterface;
use GuzzleHttp\Client as GuzzleClient;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

abstract class AbstractProvider
{
    /**
     * @var GuzzleClient
     */
    protected $guzzleClient;

    /**
     * @var DataTransformer
     */
    protected $transformer;

    /**
     * @var DenormalizerInterface
     */
    protected $denormalizer;

    /**
     * @param GuzzleClient          $guzzleClient
     * @param DataTransformer       $transformer
     * @param DenormalizerInterface $denormalizer
     */
    public function __construct(
        GuzzleClient $guzzleClient,
        DataTransformer $transformer,
        DenormalizerInterface $denormalizer
    )
    {
        $this->guzzleClient = $guzzleClient;
        $this->transformer = $transformer;
        $this->denormalizer = $denormalizer;
    }

    /**
     * @param string $type
     *
     * @return bool
     */
    abstract public function supports(string $type): bool;

    /**
     * @param string $identifier
     *
     * @return ModelInterface
     */
    abstract public function get(string $identifier): ModelInterface;

    /**
     * @param array  $data
     * @param string $type
     *
     * @return ModelInterface
     *
     * @throws ExceptionInterface
     */
    protected function createModel(array $data, string $type): ModelInterface
    {
        $data = $this->transformer->transform($data, $type);
        /** @var ModelInterface $model */
        $model = $this->denormalizer->denormalize($data, $type);

        return $model;
    }
}
