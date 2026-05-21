<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Service;
use App\Models\PortfolioItem;
use App\Models\Client;
use App\Models\WhyItem;
use App\Models\PageView;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private function trackView(string $page): void
    {
        PageView::create([
            'page' => $page,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }

    public function index()
    {
        $this->trackView('home');
        return view('home', [
            'settings'  => Setting::pluck('value', 'key'),
            'services'  => Service::active()->get(),
            'portfolio' => PortfolioItem::active()->get(),
            'clients'   => Client::active()->get(),
            'why'       => WhyItem::active()->get(),
        ]);
    }

    public function about()
    {
        $this->trackView('about');
        return view('about', ['settings' => Setting::pluck('value', 'key')]);
    }

    public function contact()
    {
        $this->trackView('contact');
        return view('contact', ['settings' => Setting::pluck('value', 'key')]);
    }

    public function service(string $slug)
    {
        $this->trackView('service-' . $slug);
        return view('service', [
            'settings' => Setting::pluck('value', 'key'),
            'slug'     => $slug,
        ]);
    }
}
