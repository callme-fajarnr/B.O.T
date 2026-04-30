<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = Post::count();
        $categories = Category::count();

        // data chart (post per bulan)
        $chart = Post::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as total')
        )
            ->groupBy('month')
            ->pluck('total', 'month');

        return view('dashboard.index', [
            'posts' => $posts,
            'categories' => $categories,
            'chart' => $chart
        ]);
    }
}
