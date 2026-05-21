@extends('layouts.admin')
@section('title','لماذا نحن')
@section('page-title','⭐ لماذا تختارنا')
@section('topbar-actions')
  <a href="{{ route('admin.why.create') }}" class="btn-sm btn-primary">+ إضافة بطاقة</a>
@endsection
@section('content')
<div class="glass-card">
  <div class="table-wrap">
    <table>
      <thead><tr><th>الأيقونة</th><th>العنوان (AR)</th><th>العنوان (EN)</th><th>الترتيب</th><th>الحالة</th><th>إجراءات</th></tr></thead>
      <tbody>
        @forelse($items as $item)
        <tr>
          <td style="font-size:1.5rem">{{ $item->icon }}</td>
          <td style="color:var(--text)">{{ $item->title_ar }}</td>
          <td>{{ $item->title_en }}</td>
          <td>{{ $item->order }}</td>
          <td><span class="badge-status {{ $item->is_active ? 'badge-active' : 'badge-inactive' }}">{{ $item->is_active ? 'نشط' : 'مخفي' }}</span></td>
          <td style="display:flex;gap:.5rem">
            <a href="{{ route('admin.why.edit', $item) }}" class="btn-sm btn-secondary">تعديل</a>
            <form method="POST" action="{{ route('admin.why.destroy', $item) }}" onsubmit="return confirm('حذف هذه البطاقة؟')">
              @csrf @method('DELETE')
              <button type="submit" class="btn-sm btn-danger">حذف</button>
            </form>
          </td>
        </tr>
        @empty
        <tr><td colspan="6" style="text-align:center;color:var(--text-d);padding:2rem">لا توجد بطاقات</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
