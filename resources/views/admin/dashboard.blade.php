@extends('layouts.admin')
@section('title', 'الإحصائيات')
@section('page-title', '📊 لوحة الإحصائيات')

@section('content')

{{-- Stats Cards --}}
<div class="grid-stats">
  <div class="glass-card stat-card">
    <div class="stat-icon">👁️</div>
    <div class="stat-info">
      <span>{{ number_format($stats['total_views']) }}</span>
      <span>إجمالي الزيارات</span>
    </div>
  </div>
  <div class="glass-card stat-card">
    <div class="stat-icon">📅</div>
    <div class="stat-info">
      <span>{{ number_format($stats['today_views']) }}</span>
      <span>زيارات اليوم</span>
    </div>
  </div>
  <div class="glass-card stat-card">
    <div class="stat-icon">✉️</div>
    <div class="stat-info">
      <span>{{ number_format($stats['total_messages']) }}</span>
      <span>رسائل التواصل</span>
    </div>
  </div>
  <div class="glass-card stat-card">
    <div class="stat-icon">🔔</div>
    <div class="stat-info">
      <span>{{ number_format($stats['unread_messages']) }}</span>
      <span>رسائل غير مقروءة</span>
    </div>
  </div>
  <div class="glass-card stat-card">
    <div class="stat-icon">🎨</div>
    <div class="stat-info">
      <span>{{ $stats['total_services'] }}</span>
      <span>الخدمات</span>
    </div>
  </div>
  <div class="glass-card stat-card">
    <div class="stat-icon">🖼️</div>
    <div class="stat-info">
      <span>{{ $stats['total_portfolio'] }}</span>
      <span>الأعمال</span>
    </div>
  </div>
  <div class="glass-card stat-card">
    <div class="stat-icon">🤝</div>
    <div class="stat-info">
      <span>{{ $stats['total_clients'] }}</span>
      <span>العملاء</span>
    </div>
  </div>
</div>

{{-- Charts Row --}}
<div class="grid-2" style="margin-bottom:1.5rem">
  <div class="glass-card chart-wrap">
    <div class="chart-title">📈 الزيارات اليومية (آخر 14 يوم)</div>
    <canvas id="dailyChart"></canvas>
  </div>
  <div class="glass-card chart-wrap">
    <div class="chart-title">📧 الرسائل حسب الخدمة</div>
    <canvas id="servicesChart"></canvas>
  </div>
</div>

{{-- Pages Stats + Recent Messages --}}
<div class="grid-2">
  <div class="glass-card" style="padding:1.5rem">
    <div class="chart-title">🔝 أكثر الصفحات زيارةً</div>
    <div class="table-wrap">
      <table>
        <thead><tr><th>الصفحة</th><th>الزيارات</th></tr></thead>
        <tbody>
          @forelse($pageStats as $p)
          <tr>
            <td>{{ $p->page }}</td>
            <td><span class="badge-cat">{{ number_format($p->count) }}</span></td>
          </tr>
          @empty
          <tr><td colspan="2" style="text-align:center;color:var(--text-d)">لا توجد بيانات بعد</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  <div class="glass-card" style="padding:1.5rem">
    <div class="chart-title" style="display:flex;justify-content:space-between;align-items:center">
      <span>📨 آخر الرسائل</span>
      <a href="{{ route('admin.messages.index') }}" class="btn-sm btn-secondary">عرض الكل</a>
    </div>
    <div class="table-wrap">
      <table>
        <thead><tr><th>الاسم</th><th>الخدمة</th><th>التاريخ</th><th></th></tr></thead>
        <tbody>
          @forelse($recentMessages as $msg)
          <tr>
            <td style="color:var(--text)">{{ $msg->name }}</td>
            <td><span class="badge-cat">{{ $msg->service ?? '—' }}</span></td>
            <td style="font-size:.78rem">{{ $msg->created_at->diffForHumans() }}</td>
            <td>
              @if(!$msg->is_read)
                <span class="badge-status badge-unread">جديد</span>
              @endif
            </td>
          </tr>
          @empty
          <tr><td colspan="4" style="text-align:center;color:var(--text-d)">لا توجد رسائل</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection

@push('head')
<script>
document.addEventListener('DOMContentLoaded', function() {
  const chartDefaults = {
    scales: {
      x: { ticks: { color: '#93C5FD', font:{size:11} }, grid: { color:'rgba(75,163,224,.1)' } },
      y: { ticks: { color: '#93C5FD', font:{size:11} }, grid: { color:'rgba(75,163,224,.1)' } }
    },
    plugins: { legend: { labels: { color:'#EFF6FF', font:{size:12} } } }
  };

  // Daily Views
  const dailyData = @json($dailyViews);
  new Chart(document.getElementById('dailyChart'), {
    type: 'line',
    data: {
      labels: dailyData.map(d => d.date),
      datasets: [{
        label: 'زيارات',
        data: dailyData.map(d => d.count),
        borderColor: '#4BA3E0',
        backgroundColor: 'rgba(75,163,224,0.1)',
        fill: true,
        tension: 0.4,
        pointBackgroundColor: '#4BA3E0',
      }]
    },
    options: { ...chartDefaults, responsive:true, maintainAspectRatio:true }
  });

  // Service Messages
  const svcData = @json($serviceMessages);
  const svcLabels = { identity:'هوية بصرية', social:'سوشيال ميديا', website:'مواقع', photography:'تصوير', print:'مطبوعات', ads:'إعلانات', package:'حزمة' };
  new Chart(document.getElementById('servicesChart'), {
    type: 'doughnut',
    data: {
      labels: svcData.map(d => svcLabels[d.service] || d.service),
      datasets: [{
        data: svcData.map(d => d.count),
        backgroundColor: ['#1A6FA8','#2A87CC','#4BA3E0','#7EC8F5','#0F4266','#0A2A40'],
        borderWidth: 0,
      }]
    },
    options: { responsive:true, plugins:{ legend:{ position:'bottom', labels:{color:'#EFF6FF',font:{size:11}} } } }
  });
});
</script>
@endpush
