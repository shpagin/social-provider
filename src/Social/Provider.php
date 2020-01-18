<?php
declare(strict_types=1);

namespace CreatorIq\Social;

use CreatorIq\Social\Model\ModelInterface;
use CreatorIq\Social\Provider\AbstractProvider;
use InvalidArgumentException;

class Provider
{
    /**
     * @var AbstractProvider[]
     */
    private $providers;

    /**
     * @param AbstractProvider $provider
     */
    public function addProvider(AbstractProvider $provider): void
    {
        $this->providers[] = $provider;
    }

    /**
     * @param string $identifier
     * @param string $type
     *
     * @return ModelInterface
     */
    public function get(string $identifier, string $type): ModelInterface
    {
        foreach ($this->providers as $socialProvider) {
            if ($socialProvider->supports($type)) {
                return $socialProvider->get($identifier);
            }
        }

        throw new InvalidArgumentException('Unsupported class: '.$type);
    }
}
