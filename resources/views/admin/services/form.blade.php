@extends('layouts.admin')
@section('title', $service->id ? 'تعديل خدمة' : 'إضافة خدمة')
@section('page-title', $service->id ? '✏️ تعديل خدمة' : '➕ إضافة خدمة')
@section('topbar-actions')
  <a href="{{ route('admin.services.index') }}" class="btn-sm btn-secondary">← رجوع</a>
@endsection
@section('content')
<div class="glass-card form-card">
  <form method="POST" action="{{ $service->id ? route('admin.services.update', $service) : route('admin.services.store') }}">
    @csrf
    @if($service->id) @method('PUT') @endif

    <div class="form-grid">
      <div class="form-group">
        <label>الأيقونة (emoji)</label>
        <input type="text" name="icon" value="{{ old('icon', $service->icon) }}" required maxlength="10" placeholder="🎨">
      </div>
      <div class="form-group">
        <label>الترتيب</label>
        <input type="number" name="order" value="{{ old('order', $service->order ?? 0) }}" min="0">
      </div>
    </div>

    <div class="form-grid">
      <div class="form-group">
        <label>العنوان بالعربي</label>
        <input type="text" name="title_ar" value="{{ old('title_ar', $service->title_ar) }}" required>
      </div>
      <div class="form-group">
        <label>العنوان بالإنجليزي</label>
        <input type="text" name="title_en" value="{{ old('title_en', $service->title_en) }}" required>
      </div>
    </div>

    <div class="form-group">
      <label>الوصف بالعربي</label>
      <textarea name="description_ar" required>{{ old('description_ar', $service->description_ar) }}</textarea>
    </div>
    <div class="form-group">
      <label>الوصف بالإنجليزي</label>
      <textarea name="description_en" required>{{ old('description_en', $service->description_en) }}</textarea>
    </div>

    <div class="form-grid">
      <div class="form-group">
        <label>التاغ (اختياري)</label>
        <input type="text" name="tag" value="{{ old('tag', $service->tag) }}" placeholder="Logo · Branding">
      </div>
      <div class="form-group">
        <label>الرابط (slug)</label>
        <input type="text" name="link" value="{{ old('link', $service->link) }}" placeholder="visual-identity">
      </div>
    </div>

    <div class="form-check">
      <input type="checkbox" name="is_active" value="1" id="is_active" {{ old('is_active', $service->is_active ?? true) ? 'checked' : '' }}>
      <label for="is_active">نشط / مرئي في الموقع</label>
    </div>

    <div class="form-actions">
      <button type="submit" class="btn-sm btn-primary">💾 حفظ</button>
      <a href="{{ route('admin.services.index') }}" class="btn-sm btn-secondary">إلغاء</a>
    </div>
  </form>
</div>
@endsection
