@extends('layouts.admin')
@section('title','الخدمات')
@section('page-title','🎨 الخدمات')
@section('topbar-actions')
  <a href="{{ route('admin.services.create') }}" class="btn-sm btn-primary">+ إضافة خدمة</a>
@endsection
@section('content')
<div class="glass-card">
  <div class="table-wrap">
    <table>
      <thead>
        <tr><th>الأيقونة</th><th>العنوان (AR)</th><th>العنوان (EN)</th><th>الترتيب</th><th>الحالة</th><th>إجراءات</th></tr>
      </thead>
      <tbody>
        @forelse($services as $s)
        <tr>
          <td style="font-size:1.5rem">{{ $s->icon }}</td>
          <td style="color:var(--text)">{{ $s->title_ar }}</td>
          <td>{{ $s->title_en }}</td>
          <td>{{ $s->order }}</td>
          <td><span class="badge-status {{ $s->is_active ? 'badge-active' : 'badge-inactive' }}">{{ $s->is_active ? 'نشط' : 'مخفي' }}</span></td>
          <td style="display:flex;gap:.5rem">
            <a href="{{ route('admin.services.edit', $s) }}" class="btn-sm btn-secondary">تعديل</a>
            <form method="POST" action="{{ route('admin.services.destroy', $s) }}" onsubmit="return confirm('حذف هذه الخدمة؟')">
              @csrf @method('DELETE')
              <button type="submit" class="btn-sm btn-danger">حذف</button>
            </form>
          </td>
        </tr>
        @empty
        <tr><td colspan="6" style="text-align:center;color:var(--text-d);padding:2rem">لا توجد خدمات</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
