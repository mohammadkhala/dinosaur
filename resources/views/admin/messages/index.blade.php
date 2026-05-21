@extends('layouts.admin')
@section('title','الرسائل')
@section('page-title','✉️ رسائل التواصل')
@section('content')
<div class="glass-card">
  <div class="table-wrap">
    <table>
      <thead><tr><th>الاسم</th><th>الهاتف</th><th>الخدمة</th><th>التاريخ</th><th>الحالة</th><th>إجراءات</th></tr></thead>
      <tbody>
        @forelse($messages as $msg)
        <tr>
          <td style="color:var(--text);font-weight:{{ $msg->is_read ? '400' : '700' }}">{{ $msg->name }}</td>
          <td>{{ $msg->phone ?? '—' }}</td>
          <td><span class="badge-cat">{{ $msg->service ?? '—' }}</span></td>
          <td style="font-size:.78rem">{{ $msg->created_at->format('Y-m-d H:i') }}</td>
          <td>
            @if($msg->is_read)
              <span class="badge-status badge-active">مقروءة</span>
            @else
              <span class="badge-status badge-unread">جديدة</span>
            @endif
          </td>
          <td style="display:flex;gap:.5rem">
            <a href="{{ route('admin.messages.show', $msg) }}" class="btn-sm btn-secondary">عرض</a>
            <form method="POST" action="{{ route('admin.messages.destroy', $msg) }}" onsubmit="return confirm('حذف هذه الرسالة؟')">
              @csrf @method('DELETE')
              <button type="submit" class="btn-sm btn-danger">حذف</button>
            </form>
          </td>
        </tr>
        @empty
        <tr><td colspan="6" style="text-align:center;color:var(--text-d);padding:2rem">لا توجد رسائل</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
  <div style="padding:1rem">{{ $messages->links() }}</div>
</div>
@endsection
