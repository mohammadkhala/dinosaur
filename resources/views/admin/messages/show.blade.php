@extends('layouts.admin')
@section('title','تفاصيل الرسالة')
@section('page-title','✉️ تفاصيل الرسالة')
@section('topbar-actions')
  <a href="{{ route('admin.messages.index') }}" class="btn-sm btn-secondary">← رجوع</a>
@endsection
@section('content')
<div class="glass-card form-card" style="max-width:600px">
  <table style="width:100%">
    <tr><td style="color:var(--text-d);width:130px;padding:.7rem 0">الاسم</td><td style="color:var(--text);font-weight:700">{{ $message->name }}</td></tr>
    <tr><td style="color:var(--text-d)">الهاتف</td><td>{{ $message->phone ?? '—' }}</td></tr>
    <tr><td style="color:var(--text-d)">البريد</td><td>{{ $message->email ?? '—' }}</td></tr>
    <tr><td style="color:var(--text-d)">الخدمة</td><td><span class="badge-cat">{{ $message->service ?? '—' }}</span></td></tr>
    <tr><td style="color:var(--text-d)">التاريخ</td><td>{{ $message->created_at->format('Y-m-d H:i') }}</td></tr>
    <tr><td style="color:var(--text-d)">IP</td><td style="font-size:.78rem;color:var(--text-d)">{{ $message->ip_address }}</td></tr>
  </table>
  @if($message->message)
  <div style="margin-top:1.5rem;padding:1.2rem;background:rgba(26,111,168,.08);border-radius:12px;border:1px solid rgba(75,163,224,.15)">
    <div style="font-size:.78rem;color:var(--text-d);margin-bottom:.5rem">الرسالة:</div>
    <p style="line-height:1.85">{{ $message->message }}</p>
  </div>
  @endif
  <div style="margin-top:1.5rem;display:flex;gap:.75rem">
    @if($message->phone)
    <a href="https://wa.me/{{ preg_replace('/\D/','',$message->phone) }}" target="_blank" class="btn-sm btn-primary">📱 واتساب</a>
    @endif
    @if($message->email)
    <a href="mailto:{{ $message->email }}" class="btn-sm btn-secondary">✉️ إرسال بريد</a>
    @endif
    <form method="POST" action="{{ route('admin.messages.destroy', $message) }}" onsubmit="return confirm('حذف هذه الرسالة؟')" style="margin-right:auto">
      @csrf @method('DELETE')
      <button type="submit" class="btn-sm btn-danger">🗑️ حذف</button>
    </form>
  </div>
</div>
@endsection
