<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\Post;

class IndexController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function search(Request $request)
    {
        $track_code = $request->input('track_code');
        $post = new Post();
        $post->trackerCode = $track_code;
        $detail = $post->parcelDetail();
        $events = $post->getEvents();
        return view('welcome', compact('detail', 'events'));
    }
}
