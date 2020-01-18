<?php
declare(strict_types=1);

namespace CreatorIq\Social\Network\Client;

use GuzzleHttp\Client as GuzzleClient;

trait GuzzleAwareTrait
{
    /**
     * @var GuzzleClient
     */
    protected $guzzleClient;

    /**
     * @param GuzzleClient $guzzleClient
     */
    public function setGuzzleClient(GuzzleClient $guzzleClient): void
    {
        $this->guzzleClient = $guzzleClient;
    }
}
