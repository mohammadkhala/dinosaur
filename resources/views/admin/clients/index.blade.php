@extends('layouts.admin')
@section('title','العملاء')
@section('page-title','🤝 العملاء')
@section('topbar-actions')
  <a href="{{ route('admin.clients.create') }}" class="btn-sm btn-primary">+ إضافة عميل</a>
@endsection
@section('content')
<div class="glass-card">
  <div class="table-wrap">
    <table>
      <thead><tr><th>الشعار</th><th>الاسم (AR)</th><th>الاسم (EN)</th><th>الموقع</th><th>الحالة</th><th>إجراءات</th></tr></thead>
      <tbody>
        @forelse($clients as $c)
        <tr>
          <td>
            @if($c->logo)
              @if(str_starts_with($c->logo, 'clients/'))
                <img src="{{ asset('storage/'.$c->logo) }}" style="height:45px;object-fit:contain">
              @else
                <img src="{{ asset($c->logo) }}" style="height:45px;object-fit:contain" onerror="this.style.display='none'">
              @endif
            @else <span>—</span> @endif
          </td>
          <td style="color:var(--text)">{{ $c->name_ar }}</td>
          <td>{{ $c->name_en }}</td>
          <td>{{ $c->website ? '🌐' : '—' }}</td>
          <td><span class="badge-status {{ $c->is_active ? 'badge-active' : 'badge-inactive' }}">{{ $c->is_active ? 'نشط' : 'مخفي' }}</span></td>
          <td style="display:flex;gap:.5rem">
            <a href="{{ route('admin.clients.edit', $c) }}" class="btn-sm btn-secondary">تعديل</a>
            <form method="POST" action="{{ route('admin.clients.destroy', $c) }}" onsubmit="return confirm('حذف هذا العميل؟')">
              @csrf @method('DELETE')
              <button type="submit" class="btn-sm btn-danger">حذف</button>
            </form>
          </td>
        </tr>
        @empty
        <tr><td colspan="6" style="text-align:center;color:var(--text-d);padding:2rem">لا يوجد عملاء</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
