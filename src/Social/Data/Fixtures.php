<?php
declare(strict_types=1);

namespace CreatorIq\Social\Data;

class Fixtures
{
    public static function instagramAccountData(): array
    {
        return [
            'id' => 'barvikha.77',
            'url' => 'https://www.instagram.com/barvikha.77/',
            'name' => 'Thank God I’m really V.I.P.'
        ];
    }

    public static function instagramPostData(): array
    {
        return [
            'id' => 'B7XsooBI3O3',
            'url' => 'https://www.instagram.com/p/B7XsooBI3O3/',
            'caption' => 'Instagram post text',
        ];
    }

    public static function twitterAccountData(): array
    {
        return [
            'id' => 'smstelegram',
            'url' => 'https://twitter.com/smstelegram',
            'name' => 'Telegram Login Help'
        ];
    }

    public static function twitterStatusData(): array
    {
        return [
            'id' => '864046939637256192',
            'url' => 'https://twitter.com/smstelegram/status/864046939637256192',
            'text' => 'Could you DM us more details please?',
        ];
    }
}
