<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    
    public function index()
    {
        $totalStudents = Product::count(); 
        return view('auth.dashboard', ['totalStudents' => $totalStudents]);
    }
    
}