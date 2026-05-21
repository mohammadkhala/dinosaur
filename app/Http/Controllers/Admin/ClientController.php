<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index()
    {
        return view('admin.clients.index', ['clients' => Client::orderBy('order')->get()]);
    }

    public function create()
    {
        return view('admin.clients.form', ['client' => new Client]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name_ar'   => 'required|string|max:200',
            'name_en'   => 'required|string|max:200',
            'logo'      => 'nullable|image|max:2048',
            'website'   => 'nullable|url|max:200',
            'order'     => 'integer',
            'is_active' => 'boolean',
        ]);
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('clients', 'public');
        }
        $data['is_active'] = $request->boolean('is_active');
        Client::create($data);
        return redirect()->route('admin.clients.index')->with('success', 'تم إضافة العميل بنجاح');
    }

    public function edit(Client $client)
    {
        return view('admin.clients.form', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $data = $request->validate([
            'name_ar'   => 'required|string|max:200',
            'name_en'   => 'required|string|max:200',
            'logo'      => 'nullable|image|max:2048',
            'website'   => 'nullable|url|max:200',
            'order'     => 'integer',
            'is_active' => 'boolean',
        ]);
        if ($request->hasFile('logo')) {
            if ($client->logo) Storage::disk('public')->delete($client->logo);
            $data['logo'] = $request->file('logo')->store('clients', 'public');
        }
        $data['is_active'] = $request->boolean('is_active');
        $client->update($data);
        return redirect()->route('admin.clients.index')->with('success', 'تم تحديث العميل بنجاح');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('admin.clients.index')->with('success', 'تم حذف العميل');
    }

    public function show(string $id) { abort(404); }
}
