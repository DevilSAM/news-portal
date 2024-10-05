<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;


class NewsController extends Controller
{
    public function index(Request $request): Response
    {
        $perPage = $request->input('perPage', 10);
        $news = News::filter($request->all())->paginate($perPage);
        return Inertia::render('News', [
            'news' => $news,
        ]);
    }

    public function show(News $news): Response
    {
        return Inertia::render('NewsCard', [
            'news' => $news,
        ]);
    }
}
