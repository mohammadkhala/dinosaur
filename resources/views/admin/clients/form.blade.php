@extends('layouts.admin')
@section('title', $client->id ? 'تعديل عميل' : 'إضافة عميل')
@section('page-title', $client->id ? '✏️ تعديل عميل' : '➕ إضافة عميل')
@section('topbar-actions')
  <a href="{{ route('admin.clients.index') }}" class="btn-sm btn-secondary">← رجوع</a>
@endsection
@section('content')
<div class="glass-card form-card">
  <form method="POST" action="{{ $client->id ? route('admin.clients.update', $client) : route('admin.clients.store') }}" enctype="multipart/form-data">
    @csrf
    @if($client->id) @method('PUT') @endif

    <div class="form-grid">
      <div class="form-group">
        <label>الاسم بالعربي</label>
        <input type="text" name="name_ar" value="{{ old('name_ar', $client->name_ar) }}" required>
      </div>
      <div class="form-group">
        <label>الاسم بالإنجليزي</label>
        <input type="text" name="name_en" value="{{ old('name_en', $client->name_en) }}" required>
      </div>
    </div>

    <div class="form-grid">
      <div class="form-group">
        <label>رابط الموقع (اختياري)</label>
        <input type="url" name="website" value="{{ old('website', $client->website) }}" placeholder="https://...">
      </div>
      <div class="form-group">
        <label>الترتيب</label>
        <input type="number" name="order" value="{{ old('order', $client->order ?? 0) }}" min="0">
      </div>
    </div>

    <div class="form-group">
      <label>شعار العميل</label>
      @if($client->logo)
        <div style="margin-bottom:.75rem">
          @if(str_starts_with($client->logo, 'clients/'))
            <img src="{{ asset('storage/'.$client->logo) }}" style="max-height:80px;object-fit:contain">
          @else
            <img src="{{ asset($client->logo) }}" style="max-height:80px;object-fit:contain" onerror="this.style.display='none'">
          @endif
        </div>
      @endif
      <input type="file" name="logo" accept="image/*">
    </div>

    <div class="form-check">
      <input type="checkbox" name="is_active" value="1" id="is_active" {{ old('is_active', $client->is_active ?? true) ? 'checked' : '' }}>
      <label for="is_active">نشط / مرئي في الموقع</label>
    </div>

    <div class="form-actions">
      <button type="submit" class="btn-sm btn-primary">💾 حفظ</button>
      <a href="{{ route('admin.clients.index') }}" class="btn-sm btn-secondary">إلغاء</a>
    </div>
  </form>
</div>
@endsection
