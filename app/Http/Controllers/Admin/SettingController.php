<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = \App\Models\Setting::all()->groupBy('group');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(\Illuminate\Http\Request $request)
    {
        foreach ($request->except(['_token', '_method']) as $key => $value) {
            \App\Models\Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
        return redirect()->route('admin.settings.index')->with('success', 'تم حفظ الإعدادات بنجاح');
    }
}
