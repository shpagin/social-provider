<?php
declare(strict_types=1);

namespace CreatorIq\Tests\Social;

use CreatorIq\Social\Factory\ProviderFactory;
use CreatorIq\Social\Model\InstagramAccount;
use CreatorIq\Social\Model\InstagramPost;
use CreatorIq\Social\Model\TwitterAccount;
use CreatorIq\Social\Model\TwitterStatus;
use CreatorIq\Social\Provider;
use GuzzleHttp\Client as GuzzleClient;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * @covers Provider
 */
class ProviderSmokeTest extends TestCase
{
    /**
     * @var Provider
     */
    private $provider;

    /**
     * @param string $name
     * @param array  $data
     * @param string $dataName
     */
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $guzzleClient = new GuzzleClient();
        $serializer = new Serializer([new ObjectNormalizer()]);

        $this->provider = ProviderFactory::create($guzzleClient, $serializer);
    }

    /**
     * @dataProvider typeProvider
     *
     * @param string $type
     */
    public function testGet(string $type): void
    {
        $model = $this->provider->get('identifier', $type);

        $this->assertInstanceOf($type, $model);
    }

    /**
     * @return array
     */
    public function typeProvider(): array
    {
        return [
            [TwitterAccount::class],
            [TwitterStatus::class],
            [InstagramAccount::class],
            [InstagramPost::class],
        ];
    }
}
