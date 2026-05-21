<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'لوحة التحكم') — ديناصور ميديا</title>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
  <style>
    :root {
      --blue:#1A6FA8;--blue-l:#2A87CC;--blue-ll:#4BA3E0;--blue-d:#0F4266;--blue-dd:#0A2A40;
      --cyan:#7EC8F5;--white:#EFF6FF;--bg:#04090E;--bg2:#060D14;--bg3:#091219;
      --glass:rgba(26,111,168,0.1);--glass-b:rgba(75,163,224,0.25);
      --text:#EFF6FF;--text-m:#93C5FD;--text-d:#60A5FA;--radius:16px;
      --sidebar-w:260px;
    }
    *,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
    body{background:var(--bg);color:var(--text);font-family:'Cairo',sans-serif;display:flex;min-height:100vh}
    a{text-decoration:none;color:inherit}
    ul{list-style:none}

    /* Sidebar */
    .sidebar{width:var(--sidebar-w);background:var(--bg2);border-left:1px solid rgba(75,163,224,.15);display:flex;flex-direction:column;position:fixed;top:0;right:0;bottom:0;z-index:100;overflow-y:auto}
    .sidebar-logo{padding:1.5rem 1.25rem;border-bottom:1px solid rgba(75,163,224,.12);display:flex;align-items:center;gap:.75rem}
    .sidebar-logo img{width:40px;height:40px;object-fit:contain}
    .sidebar-logo div span:first-child{display:block;font-size:.95rem;font-weight:900;color:var(--blue-ll)}
    .sidebar-logo div span:last-child{display:block;font-size:.7rem;color:var(--text-m)}
    .sidebar-nav{flex:1;padding:1rem 0}
    .nav-section{padding:.5rem 1.25rem .3rem;font-size:.65rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--text-d);margin-top:.75rem}
    .nav-item a{display:flex;align-items:center;gap:.65rem;padding:.6rem 1.25rem;font-size:.88rem;font-weight:600;color:var(--text-m);border-radius:10px;margin:0 .5rem .15rem;transition:all .2s;position:relative}
    .nav-item a:hover,.nav-item a.active{background:rgba(26,111,168,.2);color:var(--text);border-right:3px solid var(--blue-ll)}
    .nav-item a .badge{margin-right:auto;background:var(--blue-d);color:var(--cyan);font-size:.68rem;padding:.15rem .5rem;border-radius:999px;font-weight:700}
    .sidebar-footer{padding:1rem 1.25rem;border-top:1px solid rgba(75,163,224,.12)}
    .sidebar-user{display:flex;align-items:center;gap:.7rem;margin-bottom:.75rem}
    .sidebar-user .avatar{width:36px;height:36px;border-radius:50%;background:var(--blue-d);display:flex;align-items:center;justify-content:center;font-size:1rem;font-weight:800;color:var(--blue-ll)}
    .sidebar-user div span:first-child{display:block;font-size:.83rem;font-weight:700}
    .sidebar-user div span:last-child{display:block;font-size:.7rem;color:var(--text-m)}

    /* Main */
    .main{margin-right:var(--sidebar-w);flex:1;display:flex;flex-direction:column;min-height:100vh}
    .topbar{background:rgba(4,9,14,.85);backdrop-filter:blur(20px);border-bottom:1px solid rgba(75,163,224,.12);padding:.9rem 2rem;display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;z-index:90}
    .topbar-title{font-size:1.1rem;font-weight:800}
    .topbar-actions{display:flex;align-items:center;gap:1rem}
    .btn-sm{padding:.35rem .9rem;border-radius:8px;font-size:.8rem;font-weight:700;font-family:inherit;cursor:pointer;border:none;transition:all .2s}
    .btn-primary{background:linear-gradient(135deg,var(--blue-d),var(--blue));color:#fff;box-shadow:0 2px 12px rgba(26,111,168,.4)}
    .btn-primary:hover{transform:translateY(-1px);box-shadow:0 4px 20px rgba(26,111,168,.6)}
    .btn-danger{background:rgba(239,68,68,.2);color:#f87171;border:1px solid rgba(239,68,68,.3)}
    .btn-danger:hover{background:rgba(239,68,68,.35)}
    .btn-secondary{background:var(--glass);border:1px solid var(--glass-b);color:var(--text-m)}
    .btn-secondary:hover{background:rgba(26,111,168,.2);color:var(--text)}
    .page-content{flex:1;padding:2rem}

    /* Cards */
    .glass-card{background:var(--glass);border:1px solid var(--glass-b);border-radius:var(--radius);backdrop-filter:blur(14px)}
    .stat-card{padding:1.5rem;display:flex;align-items:center;gap:1.2rem;transition:transform .3s,box-shadow .3s}
    .stat-card:hover{transform:translateY(-3px);box-shadow:0 12px 40px rgba(26,111,168,.3)}
    .stat-icon{width:54px;height:54px;border-radius:14px;background:linear-gradient(135deg,var(--blue-d),var(--blue));display:flex;align-items:center;justify-content:center;font-size:1.5rem;flex-shrink:0}
    .stat-info span:first-child{display:block;font-size:1.9rem;font-weight:900;color:var(--blue-ll);line-height:1}
    .stat-info span:last-child{display:block;font-size:.8rem;color:var(--text-m);margin-top:.2rem}
    .grid-stats{display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:1.2rem;margin-bottom:2rem}
    .grid-2{display:grid;grid-template-columns:1fr 1fr;gap:1.5rem}
    .grid-3{display:grid;grid-template-columns:repeat(3,1fr);gap:1.2rem}

    /* Tables */
    .table-wrap{overflow-x:auto}
    table{width:100%;border-collapse:collapse}
    th{padding:.75rem 1rem;font-size:.78rem;font-weight:700;text-transform:uppercase;letter-spacing:.05em;color:var(--text-d);background:rgba(26,111,168,.1);text-align:right}
    td{padding:.75rem 1rem;font-size:.88rem;color:var(--text-m);border-bottom:1px solid rgba(75,163,224,.08)}
    tr:hover td{background:rgba(26,111,168,.05)}
    .badge-status{padding:.25rem .7rem;border-radius:999px;font-size:.72rem;font-weight:700}
    .badge-active{background:rgba(16,185,129,.2);color:#34d399}
    .badge-inactive{background:rgba(239,68,68,.15);color:#f87171}
    .badge-unread{background:rgba(245,158,11,.2);color:#fbbf24}
    .badge-cat{background:rgba(26,111,168,.2);color:var(--blue-ll);padding:.25rem .7rem;border-radius:999px;font-size:.72rem;font-weight:700}

    /* Forms */
    .form-card{padding:2rem;max-width:800px}
    .form-group{margin-bottom:1.2rem}
    .form-group label{display:block;font-size:.83rem;font-weight:600;color:var(--text-m);margin-bottom:.4rem}
    .form-group input,.form-group textarea,.form-group select{width:100%;padding:.7rem 1rem;background:rgba(4,9,14,.75);border:1px solid rgba(75,163,224,.28);border-radius:10px;color:var(--text);font-family:inherit;font-size:.9rem;outline:none;transition:border-color .25s,box-shadow .25s}
    .form-group input:focus,.form-group textarea:focus,.form-group select:focus{border-color:var(--blue-ll);box-shadow:0 0 0 3px rgba(75,163,224,.18)}
    .form-group textarea{min-height:100px;resize:vertical}
    .form-grid{display:grid;grid-template-columns:1fr 1fr;gap:1rem}
    .form-check{display:flex;align-items:center;gap:.6rem;padding:.5rem 0}
    .form-check input[type=checkbox]{width:18px;height:18px;accent-color:var(--blue-ll)}
    .form-actions{display:flex;gap:.75rem;margin-top:1.5rem;padding-top:1.5rem;border-top:1px solid rgba(75,163,224,.12)}

    /* Alert */
    .alert{padding:.85rem 1.2rem;border-radius:12px;font-size:.88rem;font-weight:600;margin-bottom:1.5rem}
    .alert-success{background:rgba(16,185,129,.15);border:1px solid rgba(16,185,129,.3);color:#34d399}
    .alert-error{background:rgba(239,68,68,.15);border:1px solid rgba(239,68,68,.3);color:#f87171}

    /* Chart container */
    .chart-wrap{padding:1.5rem}
    .chart-title{font-size:.95rem;font-weight:800;margin-bottom:1.2rem;color:var(--text)}
    canvas{max-height:260px}

    /* Page header */
    .page-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:1.75rem}
    .page-header h1{font-size:1.4rem;font-weight:900}

    /* Mobile */
    @media(max-width:768px){
      .sidebar{transform:translateX(100%);transition:transform .3s}
      .sidebar.open{transform:translateX(0)}
      .main{margin-right:0}
      .grid-2,.grid-3{grid-template-columns:1fr}
      .form-grid{grid-template-columns:1fr}
    }
  </style>
  @stack('head')
</head>
<body>

<aside class="sidebar">
  <div class="sidebar-logo">
    <img src="/logo.png" alt="Dinosaur Media" onerror="this.style.display='none'">
    <div>
      <span>ديناصور ميديا</span>
      <span>لوحة التحكم</span>
    </div>
  </div>

  <nav class="sidebar-nav">
    <div class="nav-section">الرئيسية</div>
    <div class="nav-item">
      <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        📊 الإحصائيات
      </a>
    </div>
    <div class="nav-item">
      <a href="{{ route('home') }}" target="_blank">🌐 عرض الموقع</a>
    </div>

    <div class="nav-section">المحتوى</div>
    <div class="nav-item">
      <a href="{{ route('admin.services.index') }}" class="{{ request()->routeIs('admin.services*') ? 'active' : '' }}">
        🎨 الخدمات
      </a>
    </div>
    <div class="nav-item">
      <a href="{{ route('admin.portfolio.index') }}" class="{{ request()->routeIs('admin.portfolio*') ? 'active' : '' }}">
        🖼️ الأعمال
      </a>
    </div>
    <div class="nav-item">
      <a href="{{ route('admin.clients.index') }}" class="{{ request()->routeIs('admin.clients*') ? 'active' : '' }}">
        🤝 العملاء
      </a>
    </div>
    <div class="nav-item">
      <a href="{{ route('admin.why.index') }}" class="{{ request()->routeIs('admin.why*') ? 'active' : '' }}">
        ⭐ لماذا نحن
      </a>
    </div>

    <div class="nav-section">الرسائل</div>
    <div class="nav-item">
      <a href="{{ route('admin.messages.index') }}" class="{{ request()->routeIs('admin.messages*') ? 'active' : '' }}">
        ✉️ رسائل التواصل
        @php $unread = \App\Models\ContactMessage::where('is_read',false)->count() @endphp
        @if($unread > 0)
          <span class="badge">{{ $unread }}</span>
        @endif
      </a>
    </div>

    <div class="nav-section">الإعدادات</div>
    <div class="nav-item">
      <a href="{{ route('admin.settings.index') }}" class="{{ request()->routeIs('admin.settings*') ? 'active' : '' }}">
        ⚙️ إعدادات الموقع
      </a>
    </div>
  </nav>

  <div class="sidebar-footer">
    <div class="sidebar-user">
      <div class="avatar">{{ substr(auth()->user()->name, 0, 1) }}</div>
      <div>
        <span>{{ auth()->user()->name }}</span>
        <span>{{ auth()->user()->email }}</span>
      </div>
    </div>
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="btn-sm btn-secondary" style="width:100%">🚪 تسجيل الخروج</button>
    </form>
  </div>
</aside>

<div class="main">
  <div class="topbar">
    <span class="topbar-title">@yield('page-title', 'لوحة التحكم')</span>
    <div class="topbar-actions">
      @yield('topbar-actions')
    </div>
  </div>

  <div class="page-content">
    @if(session('success'))
      <div class="alert alert-success">✅ {{ session('success') }}</div>
    @endif
    @if($errors->any())
      <div class="alert alert-error">
        @foreach($errors->all() as $e) {{ $e }}<br> @endforeach
      </div>
    @endif

    @yield('content')
  </div>
</div>

</body>
</html>
