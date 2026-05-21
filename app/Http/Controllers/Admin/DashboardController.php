<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_views'       => \App\Models\PageView::count(),
            'today_views'       => \App\Models\PageView::whereDate('created_at', today())->count(),
            'total_messages'    => \App\Models\ContactMessage::count(),
            'unread_messages'   => \App\Models\ContactMessage::where('is_read', false)->count(),
            'total_services'    => \App\Models\Service::count(),
            'total_portfolio'   => \App\Models\PortfolioItem::count(),
            'total_clients'     => \App\Models\Client::count(),
        ];

        // Views per page (top 10)
        $pageStats = \App\Models\PageView::selectRaw('page, COUNT(*) as count')
            ->groupBy('page')
            ->orderByDesc('count')
            ->limit(10)
            ->get();

        // Daily views last 14 days
        $dailyViews = \App\Models\PageView::selectRaw("strftime('%Y-%m-%d', created_at) as date, COUNT(*) as count")
            ->where('created_at', '>=', now()->subDays(14))
            ->groupByRaw("strftime('%Y-%m-%d', created_at)")
            ->orderBy('date')
            ->get();

        // Messages per service
        $serviceMessages = \App\Models\ContactMessage::selectRaw('service, COUNT(*) as count')
            ->whereNotNull('service')
            ->groupBy('service')
            ->orderByDesc('count')
            ->get();

        // Recent messages
        $recentMessages = \App\Models\ContactMessage::latest()->limit(5)->get();

        return view('admin.dashboard', compact('stats','pageStats','dailyViews','serviceMessages','recentMessages'));
    }
}
