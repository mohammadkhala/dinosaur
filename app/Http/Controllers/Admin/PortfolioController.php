<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        return view('admin.portfolio.index', ['items' => PortfolioItem::orderBy('order')->get()]);
    }

    public function create()
    {
        return view('admin.portfolio.form', ['item' => new PortfolioItem]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title_ar'    => 'required|string|max:200',
            'title_en'    => 'required|string|max:200',
            'subtitle_ar' => 'nullable|string|max:200',
            'subtitle_en' => 'nullable|string|max:200',
            'category'    => 'required|in:identity,social,photo',
            'image'       => 'nullable|image|max:5120',
            'order'       => 'integer',
            'is_active'   => 'boolean',
        ]);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('portfolio', 'public');
        }
        $data['is_active'] = $request->boolean('is_active');
        PortfolioItem::create($data);
        return redirect()->route('admin.portfolio.index')->with('success', 'تم إضافة العمل بنجاح');
    }

    public function edit(PortfolioItem $portfolio)
    {
        return view('admin.portfolio.form', ['item' => $portfolio]);
    }

    public function update(Request $request, PortfolioItem $portfolio)
    {
        $data = $request->validate([
            'title_ar'    => 'required|string|max:200',
            'title_en'    => 'required|string|max:200',
            'subtitle_ar' => 'nullable|string|max:200',
            'subtitle_en' => 'nullable|string|max:200',
            'category'    => 'required|in:identity,social,photo',
            'image'       => 'nullable|image|max:5120',
            'order'       => 'integer',
            'is_active'   => 'boolean',
        ]);
        if ($request->hasFile('image')) {
            if ($portfolio->image && !str_starts_with($portfolio->image, 'http')) {
                Storage::disk('public')->delete($portfolio->image);
            }
            $data['image'] = $request->file('image')->store('portfolio', 'public');
        }
        $data['is_active'] = $request->boolean('is_active');
        $portfolio->update($data);
        return redirect()->route('admin.portfolio.index')->with('success', 'تم تحديث العمل بنجاح');
    }

    public function destroy(PortfolioItem $portfolio)
    {
        $portfolio->delete();
        return redirect()->route('admin.portfolio.index')->with('success', 'تم حذف العمل');
    }

    public function show(string $id) { abort(404); }
}
