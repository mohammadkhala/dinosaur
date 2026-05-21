<!DOCTYPE html>
<html lang="ar" dir="rtl"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>{{ ucfirst($slug) }} | {{ $settings['site_name_ar'] ?? 'ديناصور ميديا' }}</title>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800;900&display=swap" rel="stylesheet">
<link rel="icon" type="image/png" href="/logo.png">
<style>:root{--blue:#1A6FA8;--blue-ll:#4BA3E0;--cyan:#7EC8F5;--bg:#04090E;--bg2:#060D14;--glass:rgba(26,111,168,0.1);--glass-b:rgba(75,163,224,0.25);--text:#EFF6FF;--text-m:#93C5FD}*{box-sizing:border-box;margin:0;padding:0}body{background:var(--bg);color:var(--text);font-family:'Cairo',sans-serif;min-height:100vh;display:flex;flex-direction:column;align-items:center;justify-content:center;text-align:center;padding:2rem}
.card{background:var(--glass);border:1px solid var(--glass-b);border-radius:24px;padding:3rem;max-width:600px;backdrop-filter:blur(16px)}
.card h1{font-size:2rem;font-weight:900;color:var(--blue-ll);margin-bottom:1rem}
.card p{color:var(--text-m);line-height:1.85;margin-bottom:2rem}
.btn{padding:.75rem 1.8rem;border-radius:12px;font-size:.95rem;font-weight:700;font-family:inherit;border:none;cursor:pointer;background:linear-gradient(135deg,#0F4266,#1A6FA8);color:#fff;text-decoration:none;display:inline-block;transition:transform .2s}
.btn:hover{transform:translateY(-2px)}</style>
</head>
<body>
<div class="card">
  <div style="font-size:3rem;margin-bottom:1rem">🚧</div>
  <h1>{{ ucwords(str_replace('-',' ',$slug)) }}</h1>
  <p>هذه الصفحة قيد الإنشاء. للاستفسار عن هذه الخدمة تواصل معنا مباشرة.</p>
  <a href="{{ route('contact') }}" class="btn">تواصل معنا ←</a>
</div>
</body>
</html>
