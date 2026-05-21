@extends('layouts.admin')
@section('title', $item->id ? 'تعديل بطاقة' : 'إضافة بطاقة')
@section('page-title', $item->id ? '✏️ تعديل بطاقة' : '➕ إضافة بطاقة')
@section('topbar-actions')
  <a href="{{ route('admin.why.index') }}" class="btn-sm btn-secondary">← رجوع</a>
@endsection
@section('content')
<div class="glass-card form-card">
  <form method="POST" action="{{ $item->id ? route('admin.why.update', $item) : route('admin.why.store') }}">
    @csrf
    @if($item->id) @method('PUT') @endif

    <div class="form-grid">
      <div class="form-group">
        <label>الأيقونة (emoji)</label>
        <input type="text" name="icon" value="{{ old('icon', $item->icon) }}" required maxlength="10" placeholder="🏆">
      </div>
      <div class="form-group">
        <label>الترتيب</label>
        <input type="number" name="order" value="{{ old('order', $item->order ?? 0) }}" min="0">
      </div>
    </div>
    <div class="form-grid">
      <div class="form-group">
        <label>العنوان بالعربي</label>
        <input type="text" name="title_ar" value="{{ old('title_ar', $item->title_ar) }}" required>
      </div>
      <div class="form-group">
        <label>العنوان بالإنجليزي</label>
        <input type="text" name="title_en" value="{{ old('title_en', $item->title_en) }}" required>
      </div>
    </div>
    <div class="form-group">
      <label>الوصف بالعربي</label>
      <textarea name="description_ar" required>{{ old('description_ar', $item->description_ar) }}</textarea>
    </div>
    <div class="form-group">
      <label>الوصف بالإنجليزي</label>
      <textarea name="description_en" required>{{ old('description_en', $item->description_en) }}</textarea>
    </div>

    <div class="form-check">
      <input type="checkbox" name="is_active" value="1" id="is_active" {{ old('is_active', $item->is_active ?? true) ? 'checked' : '' }}>
      <label for="is_active">نشط / مرئي في الموقع</label>
    </div>

    <div class="form-actions">
      <button type="submit" class="btn-sm btn-primary">💾 حفظ</button>
      <a href="{{ route('admin.why.index') }}" class="btn-sm btn-secondary">إلغاء</a>
    </div>
  </form>
</div>
@endsection
