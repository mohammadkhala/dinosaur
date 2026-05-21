<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:100',
            'phone'   => 'nullable|string|max:30',
            'email'   => 'nullable|email|max:100',
            'service' => 'nullable|string|max:50',
            'message' => 'nullable|string|max:2000',
        ]);

        ContactMessage::create([
            'name'       => $request->name,
            'phone'      => $request->phone,
            'email'      => $request->email,
            'service'    => $request->service,
            'message'    => $request->message,
            'ip_address' => $request->ip(),
        ]);

        return response()->json(['success' => true]);
    }
}
