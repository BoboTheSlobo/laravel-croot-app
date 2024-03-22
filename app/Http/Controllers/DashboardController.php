<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\News;

class DashboardController extends Controller
{
    public function index()
    {
        // Count total students
        $totalStudents = Product::count();

        // Count total news
        $totalNews = News::count();

        // Count active news
        $activeNews = News::where('status', '1')->count();

        // Count inactive news
        $inactiveNews = News::where('status', '0')->count();

        // Pass the counts to the view
        return view('auth.dashboard', compact('totalStudents', 'totalNews', 'activeNews', 'inactiveNews'));
    }
}
