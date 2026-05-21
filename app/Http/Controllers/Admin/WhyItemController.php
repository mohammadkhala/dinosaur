<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyItem;
use Illuminate\Http\Request;

class WhyItemController extends Controller
{
    public function index()
    {
        return view('admin.why.index', ['items' => WhyItem::orderBy('order')->get()]);
    }

    public function create()
    {
        return view('admin.why.form', ['item' => new WhyItem]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'icon'           => 'required|string|max:10',
            'title_ar'       => 'required|string|max:200',
            'title_en'       => 'required|string|max:200',
            'description_ar' => 'required|string',
            'description_en' => 'required|string',
            'order'          => 'integer',
            'is_active'      => 'boolean',
        ]);
        $data['is_active'] = $request->boolean('is_active');
        WhyItem::create($data);
        return redirect()->route('admin.why.index')->with('success', 'تم إضافة البطاقة بنجاح');
    }

    public function edit(WhyItem $why)
    {
        return view('admin.why.form', ['item' => $why]);
    }

    public function update(Request $request, WhyItem $why)
    {
        $data = $request->validate([
            'icon'           => 'required|string|max:10',
            'title_ar'       => 'required|string|max:200',
            'title_en'       => 'required|string|max:200',
            'description_ar' => 'required|string',
            'description_en' => 'required|string',
            'order'          => 'integer',
            'is_active'      => 'boolean',
        ]);
        $data['is_active'] = $request->boolean('is_active');
        $why->update($data);
        return redirect()->route('admin.why.index')->with('success', 'تم تحديث البطاقة بنجاح');
    }

    public function destroy(WhyItem $why)
    {
        $why->delete();
        return redirect()->route('admin.why.index')->with('success', 'تم حذف البطاقة');
    }

    public function show(string $id) { abort(404); }
}
