<?php

declare(strict_types=1);

namespace Bot\CoinDomain\Command\Infrastructure\Http;

class HttpClient
{
    public static function curl(string $url): array
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        return ['response' => $response, 'httpcode' => $httpcode];
    }
}
