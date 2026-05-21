@extends('layouts.admin')
@section('title','الأعمال')
@section('page-title','🖼️ معرض الأعمال')
@section('topbar-actions')
  <a href="{{ route('admin.portfolio.create') }}" class="btn-sm btn-primary">+ إضافة عمل</a>
@endsection
@section('content')
<div class="glass-card">
  <div class="table-wrap">
    <table>
      <thead>
        <tr><th>الصورة</th><th>العنوان (AR)</th><th>التصنيف</th><th>الترتيب</th><th>الحالة</th><th>إجراءات</th></tr>
      </thead>
      <tbody>
        @forelse($items as $item)
        <tr>
          <td>
            @if($item->image)
              @if(str_starts_with($item->image, 'portfolio/'))
                <img src="{{ asset('storage/'.$item->image) }}" style="width:55px;height:45px;object-fit:cover;border-radius:8px">
              @else
                <img src="{{ asset($item->image) }}" style="width:55px;height:45px;object-fit:cover;border-radius:8px" onerror="this.style.display='none'">
              @endif
            @else
              <span style="color:var(--text-d)">—</span>
            @endif
          </td>
          <td style="color:var(--text)">{{ $item->title_ar }}</td>
          <td><span class="badge-cat">{{ ['identity'=>'هوية','social'=>'سوشيال','photo'=>'تصوير'][$item->category] ?? $item->category }}</span></td>
          <td>{{ $item->order }}</td>
          <td><span class="badge-status {{ $item->is_active ? 'badge-active' : 'badge-inactive' }}">{{ $item->is_active ? 'نشط' : 'مخفي' }}</span></td>
          <td style="display:flex;gap:.5rem">
            <a href="{{ route('admin.portfolio.edit', $item) }}" class="btn-sm btn-secondary">تعديل</a>
            <form method="POST" action="{{ route('admin.portfolio.destroy', $item) }}" onsubmit="return confirm('حذف هذا العمل؟')">
              @csrf @method('DELETE')
              <button type="submit" class="btn-sm btn-danger">حذف</button>
            </form>
          </td>
        </tr>
        @empty
        <tr><td colspan="6" style="text-align:center;color:var(--text-d);padding:2rem">لا توجد أعمال</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
