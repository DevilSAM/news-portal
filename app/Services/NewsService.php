<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class NewsService
{
    /**
     * @throws Exception
     */
    public function getNews()
    {
        $url = 'https://newsapi.org/v2/everything';
        $apiKey = env('NEWS_API_KEY');
        try {
            return Http::asJson()
                ->get($url, [
                    'q' => 'Apple',
                    'apiKey' => $apiKey,
                ])
                ->throw()
                ->json();
        } catch (\Throwable $e) {
            Log::error('[NewsApi::getNews]', [
                'trace'   => $e->getTraceAsString(),
                'message' => $e->getMessage()
            ]);
            throw new Exception("[UapApi] - service not available. {$e->getMessage()}");
        }

    }
}
