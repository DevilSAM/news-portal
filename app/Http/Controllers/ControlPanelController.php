<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;


class ControlPanelController extends Controller
{
    public function verified(Request $request): Response
    {
        $verifiedUsers = User::verified()->get();
        return Inertia::render('ControlPanel/VerifiedUsers', [
            'verifiedUsers' => $verifiedUsers,
        ]);
    }
    public function unverified(Request $request): Response
    {
        $unverifiedUsers = User::unverified()->get();
        return Inertia::render('ControlPanel/UnverifiedUsers', [
            'unverifiedUsers' => $unverifiedUsers,
        ]);
    }
    public function news(Request $request): Response
    {
        $perPage = $request->input('perPage', 10);
        $news = News::filter($request->all())->paginate($perPage);
        return Inertia::render('ControlPanel/News', [
            'news' => $news,
        ]);
    }

}
