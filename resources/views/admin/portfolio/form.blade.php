@extends('layouts.admin')
@section('title', $item->id ? 'تعديل عمل' : 'إضافة عمل')
@section('page-title', $item->id ? '✏️ تعديل عمل' : '➕ إضافة عمل')
@section('topbar-actions')
  <a href="{{ route('admin.portfolio.index') }}" class="btn-sm btn-secondary">← رجوع</a>
@endsection
@section('content')
<div class="glass-card form-card">
  <form method="POST" action="{{ $item->id ? route('admin.portfolio.update', $item) : route('admin.portfolio.store') }}" enctype="multipart/form-data">
    @csrf
    @if($item->id) @method('PUT') @endif

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
    <div class="form-grid">
      <div class="form-group">
        <label>النص التوضيحي (AR)</label>
        <input type="text" name="subtitle_ar" value="{{ old('subtitle_ar', $item->subtitle_ar) }}">
      </div>
      <div class="form-group">
        <label>النص التوضيحي (EN)</label>
        <input type="text" name="subtitle_en" value="{{ old('subtitle_en', $item->subtitle_en) }}">
      </div>
    </div>
    <div class="form-grid">
      <div class="form-group">
        <label>التصنيف</label>
        <select name="category">
          <option value="identity" {{ old('category', $item->category) == 'identity' ? 'selected' : '' }}>🎨 هوية بصرية</option>
          <option value="social" {{ old('category', $item->category) == 'social' ? 'selected' : '' }}>📱 سوشيال ميديا</option>
          <option value="photo" {{ old('category', $item->category) == 'photo' ? 'selected' : '' }}>📸 تصوير</option>
        </select>
      </div>
      <div class="form-group">
        <label>الترتيب</label>
        <input type="number" name="order" value="{{ old('order', $item->order ?? 0) }}" min="0">
      </div>
    </div>

    <div class="form-group">
      <label>الصورة</label>
      @if($item->image)
        <div style="margin-bottom:.75rem">
          @if(str_starts_with($item->image, 'portfolio/'))
            <img src="{{ asset('storage/'.$item->image) }}" style="max-height:120px;border-radius:10px">
          @else
            <img src="{{ asset($item->image) }}" style="max-height:120px;border-radius:10px" onerror="this.style.display='none'">
          @endif
          <p style="font-size:.75rem;color:var(--text-d);margin-top:.3rem">الصورة الحالية: {{ $item->image }}</p>
        </div>
      @endif
      <input type="file" name="image" accept="image/*">
    </div>

    <div class="form-check">
      <input type="checkbox" name="is_active" value="1" id="is_active" {{ old('is_active', $item->is_active ?? true) ? 'checked' : '' }}>
      <label for="is_active">نشط / مرئي في الموقع</label>
    </div>

    <div class="form-actions">
      <button type="submit" class="btn-sm btn-primary">💾 حفظ</button>
      <a href="{{ route('admin.portfolio.index') }}" class="btn-sm btn-secondary">إلغاء</a>
    </div>
  </form>
</div>
@endsection
