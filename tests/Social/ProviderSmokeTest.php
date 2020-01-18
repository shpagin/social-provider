<?php
declare(strict_types=1);

namespace CreatorIq\Tests\Social;

use CreatorIq\Social\Data\DataTransformerFactory;
use CreatorIq\Social\Model\InstagramAccount;
use CreatorIq\Social\Model\InstagramPost;
use CreatorIq\Social\Model\TwitterAccount;
use CreatorIq\Social\Model\TwitterStatus;
use CreatorIq\Social\Provider;
use CreatorIq\Social\ProviderFactory;
use GuzzleHttp\Client as GuzzleClient;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use Psr\Log\LoggerTrait;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * @covers Provider
 */
class ProviderSmokeTest extends TestCase implements LoggerInterface
{
    use LoggerTrait;

    /**
     * @var Provider
     */
    private $provider;

    /**
     * @before
     */
    public function before()
    {
        $guzzleClient = new GuzzleClient();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $transformer = DataTransformerFactory::create();

        $this->provider = ProviderFactory::create($guzzleClient, $transformer, $serializer, $this);
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

    /**
     * @param string $level
     * @param string $message
     * @param array  $context
     */
    public function log($level, $message, array $context = [])
    {
        printf("\n%s: %s\n", strtoupper($level), $message);
    }
}
