<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        // Debug: pastikan data kategori ada
        $categories = Kategori::all();
        
        // Debug: uncomment untuk melihat data
        // dd($categories);
        
        return view('pages.admin.dashboard', compact('categories'));
    }
}