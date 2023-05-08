<?php

namespace App\Service;
use Illuminate\Support\Facades\Http;

class CoinGecko
{
    /**
     * @throws \Exception
     */
    public static function request(string $method, string $path, array $params): mixed {
        return Http::baseUrl(config('coingecko.api_base_url'))->acceptJson()
            ->asJson()
            ->send($method, $path, $params)->throw()->json();
    }
}
