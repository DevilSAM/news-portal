<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\User;
use App\Services\NewsService;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [];
        $newsService = new NewsService();
        $news = $newsService->getNews();
        foreach ($news['articles'] as $n) {
            $data[] = [
                'title' => $n['title'],
                'content' => $n['content'],
                'source' => $n['url'],
                'image_url' => $n['urlToImage'],
                'published_at' => Carbon::parse($n['publishedAt']),
            ];
        }
        News::upsert(
            $data,
            [ 'title' ],
            [ 'title', 'content', 'source', 'image_url' ],
        );
    }
}
