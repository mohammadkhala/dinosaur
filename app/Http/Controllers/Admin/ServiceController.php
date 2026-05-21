<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return view('admin.services.index', ['services' => Service::orderBy('order')->get()]);
    }

    public function create()
    {
        return view('admin.services.form', ['service' => new Service]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'icon'           => 'required|string|max:10',
            'title_ar'       => 'required|string|max:200',
            'title_en'       => 'required|string|max:200',
            'description_ar' => 'required|string',
            'description_en' => 'required|string',
            'tag'            => 'nullable|string|max:200',
            'link'           => 'nullable|string|max:200',
            'order'          => 'integer',
            'is_active'      => 'boolean',
        ]);
        $data['is_active'] = $request->boolean('is_active');
        Service::create($data);
        return redirect()->route('admin.services.index')->with('success', 'تم إضافة الخدمة بنجاح');
    }

    public function edit(Service $service)
    {
        return view('admin.services.form', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'icon'           => 'required|string|max:10',
            'title_ar'       => 'required|string|max:200',
            'title_en'       => 'required|string|max:200',
            'description_ar' => 'required|string',
            'description_en' => 'required|string',
            'tag'            => 'nullable|string|max:200',
            'link'           => 'nullable|string|max:200',
            'order'          => 'integer',
            'is_active'      => 'boolean',
        ]);
        $data['is_active'] = $request->boolean('is_active');
        $service->update($data);
        return redirect()->route('admin.services.index')->with('success', 'تم تحديث الخدمة بنجاح');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'تم حذف الخدمة');
    }

    public function show(string $id) { abort(404); }
}
