<?php

namespace App\Http\Controllers;

use App\Models\News; // Assuming your News model is in the Models directory
use Illuminate\Http\Request;

class ActiveNewsController extends Controller
{
    public function index()
    {
        // Fetch active news
        $activeNews = News::where('status', 1)->get();

        return view('active_news.index', compact('activeNews'));
    }
}