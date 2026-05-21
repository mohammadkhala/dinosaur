<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>تسجيل الدخول | Dinosaur Media</title>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800;900&display=swap" rel="stylesheet">
<style>
:root{--blue:#1A6FA8;--blue-ll:#4BA3E0;--cyan:#7EC8F5;--bg:#04090E;--bg2:#060D14;--glass:rgba(26,111,168,0.1);--glass-b:rgba(75,163,224,0.25);--text:#EFF6FF;--text-m:#93C5FD}
*{box-sizing:border-box;margin:0;padding:0}
body{background:var(--bg);color:var(--text);font-family:'Cairo',sans-serif;min-height:100vh;display:flex;align-items:center;justify-content:center;overflow:hidden;position:relative}

/* Grid dots */
body::before{content:'';position:fixed;inset:0;background-image:radial-gradient(rgba(75,163,224,0.12) 1px,transparent 1px);background-size:32px 32px;pointer-events:none;z-index:0}

/* Blobs */
.blob{position:fixed;border-radius:50%;filter:blur(80px);opacity:.18;pointer-events:none;z-index:0}
.blob-1{width:500px;height:500px;background:radial-gradient(circle,#1A6FA8,transparent);top:-100px;right:-100px;animation:blobMove1 12s ease-in-out infinite}
.blob-2{width:400px;height:400px;background:radial-gradient(circle,#0A3A5C,transparent);bottom:-80px;left:-80px;animation:blobMove2 15s ease-in-out infinite}
.blob-3{width:300px;height:300px;background:radial-gradient(circle,#7EC8F5,transparent);top:50%;left:50%;transform:translate(-50%,-50%);opacity:.08;animation:blobMove3 10s ease-in-out infinite}
@keyframes blobMove1{0%,100%{transform:translate(0,0)}50%{transform:translate(30px,40px)}}
@keyframes blobMove2{0%,100%{transform:translate(0,0)}50%{transform:translate(-20px,-30px)}}
@keyframes blobMove3{0%,100%{transform:translate(-50%,-50%) scale(1)}50%{transform:translate(-50%,-50%) scale(1.2)}}

/* Shooting stars */
.stars{position:fixed;inset:0;pointer-events:none;z-index:0;overflow:hidden}
.star{position:absolute;width:2px;height:2px;background:#7EC8F5;border-radius:50%;animation:shoot linear infinite;opacity:0}
.star::after{content:'';position:absolute;top:0;right:0;width:60px;height:1px;background:linear-gradient(to left,#7EC8F5,transparent);transform-origin:right center}
.star:nth-child(1){top:15%;right:10%;animation-duration:4s;animation-delay:0s}
.star:nth-child(2){top:35%;right:25%;animation-duration:5s;animation-delay:1.5s}
.star:nth-child(3){top:60%;right:5%;animation-duration:3.5s;animation-delay:3s}
.star:nth-child(4){top:80%;right:40%;animation-duration:4.5s;animation-delay:0.8s}
.star:nth-child(5){top:20%;right:60%;animation-duration:6s;animation-delay:2s}
.star:nth-child(6){top:50%;right:80%;animation-duration:4s;animation-delay:4s}
@keyframes shoot{0%{transform:translateX(0) translateY(0);opacity:0}10%{opacity:1}80%{opacity:.5}100%{transform:translateX(-400px) translateY(200px);opacity:0}}

/* Card */
.card{position:relative;z-index:10;background:var(--glass);border:1px solid var(--glass-b);border-radius:24px;padding:2.5rem 2rem;width:100%;max-width:420px;backdrop-filter:blur(20px);box-shadow:0 20px 60px rgba(0,0,0,.5),0 0 0 1px rgba(75,163,224,.1) inset}

/* Animated top bar */
.card::before{content:'';position:absolute;top:0;left:10%;right:10%;height:2px;background:linear-gradient(90deg,transparent,#4BA3E0,#7EC8F5,#4BA3E0,transparent);border-radius:2px;animation:shimmer 3s ease-in-out infinite}
@keyframes shimmer{0%,100%{opacity:.6;left:10%;right:10%}50%{opacity:1;left:5%;right:5%}}

/* Logo */
.logo-wrap{text-align:center;margin-bottom:1.5rem}
.logo-ring{display:inline-flex;align-items:center;justify-content:center;width:90px;height:90px;border-radius:50%;border:2px solid rgba(75,163,224,.4);background:rgba(26,111,168,.15);box-shadow:0 0 0 0 rgba(75,163,224,.3);animation:pulse-ring 2.5s ease-in-out infinite}
@keyframes pulse-ring{0%,100%{box-shadow:0 0 0 0 rgba(75,163,224,.3)}50%{box-shadow:0 0 0 14px rgba(75,163,224,0)}}
.logo-ring img{width:64px;height:64px;object-fit:contain;filter:drop-shadow(0 0 8px rgba(75,163,224,.5))}
.logo-title{font-size:1.4rem;font-weight:900;color:var(--blue-ll);margin-top:.6rem;letter-spacing:.5px}

/* Badge */
.badge{display:inline-flex;align-items:center;gap:.4rem;background:rgba(26,111,168,.2);border:1px solid rgba(75,163,224,.3);border-radius:20px;padding:.25rem .85rem;font-size:.75rem;color:var(--cyan);margin-bottom:1.5rem}
.badge-dot{width:6px;height:6px;border-radius:50%;background:#7EC8F5;animation:blink 1.5s ease-in-out infinite}
@keyframes blink{0%,100%{opacity:1}50%{opacity:.3}}

/* Status alert */
.alert-status{background:rgba(26,111,168,.2);border:1px solid rgba(75,163,224,.3);border-radius:10px;padding:.6rem 1rem;font-size:.85rem;color:var(--cyan);margin-bottom:1rem;text-align:center}

/* Error */
.error-msg{color:#f87171;font-size:.8rem;margin-top:.3rem;display:block}

/* Inputs */
.field{margin-bottom:1.1rem}
.field label{display:block;font-size:.85rem;font-weight:700;color:var(--text-m);margin-bottom:.4rem}
.input-wrap{position:relative}
.input-wrap .icon{position:absolute;right:.85rem;top:50%;transform:translateY(-50%);font-size:1rem;pointer-events:none;opacity:.7}
.input-wrap input{width:100%;background:rgba(4,9,14,.6);border:1px solid rgba(75,163,224,.3);border-radius:12px;padding:.75rem 2.6rem .75rem 1rem;font-size:.95rem;font-family:'Cairo',sans-serif;color:var(--text);outline:none;transition:border-color .2s,box-shadow .2s}
.input-wrap input:focus{border-color:var(--blue-ll);box-shadow:0 0 0 3px rgba(75,163,224,.15)}
.input-wrap input::placeholder{color:rgba(147,197,253,.35)}

/* Remember + forgot */
.row-extra{display:flex;align-items:center;justify-content:space-between;margin-bottom:1.4rem;font-size:.83rem}
.remember{display:flex;align-items:center;gap:.5rem;color:var(--text-m);cursor:pointer}
.remember input[type=checkbox]{width:16px;height:16px;accent-color:var(--blue-ll);cursor:pointer}
.forgot{color:var(--cyan);text-decoration:none;opacity:.8;transition:opacity .2s}
.forgot:hover{opacity:1;text-decoration:underline}

/* Submit */
.btn-submit{width:100%;padding:.85rem;border:none;border-radius:14px;background:linear-gradient(135deg,#0F4266,#1A6FA8,#4BA3E0);font-size:1rem;font-weight:800;font-family:'Cairo',sans-serif;color:#fff;cursor:pointer;transition:transform .2s,box-shadow .2s;box-shadow:0 4px 20px rgba(26,111,168,.4);letter-spacing:.5px}
.btn-submit:hover{transform:translateY(-2px);box-shadow:0 8px 30px rgba(26,111,168,.6)}
.btn-submit:active{transform:translateY(0)}

/* Back link */
.back{display:block;text-align:center;margin-top:1.2rem;color:rgba(147,197,253,.5);font-size:.8rem;text-decoration:none;transition:color .2s}
.back:hover{color:var(--cyan)}

/* Version */
.version{text-align:center;margin-top:1.5rem;font-size:.7rem;color:rgba(147,197,253,.2)}
</style>
</head>
<body>

<div class="blob blob-1"></div>
<div class="blob blob-2"></div>
<div class="blob blob-3"></div>

<div class="stars">
  <div class="star"></div><div class="star"></div><div class="star"></div>
  <div class="star"></div><div class="star"></div><div class="star"></div>
</div>

<div class="card">

  <div class="logo-wrap">
    <div class="logo-ring">
      <img src="/logo.png" alt="Dinosaur Media">
    </div>
    <div class="logo-title">Dinosaur Media</div>
  </div>

  <div style="text-align:center">
    <span class="badge"><span class="badge-dot"></span> لوحة التحكم</span>
  </div>

  @if(session('status'))
    <div class="alert-status">{{ session('status') }}</div>
  @endif

  <form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="field">
      <label for="email">البريد الإلكتروني</label>
      <div class="input-wrap">
        <span class="icon">✉️</span>
        <input type="email" id="email" name="email" value="{{ old('email') }}"
               placeholder="admin@dinosaur.ps" required autofocus autocomplete="username">
      </div>
      @error('email')<span class="error-msg">{{ $message }}</span>@enderror
    </div>

    <div class="field">
      <label for="password">كلمة المرور</label>
      <div class="input-wrap">
        <span class="icon">🔒</span>
        <input type="password" id="password" name="password"
               placeholder="••••••••" required autocomplete="current-password">
      </div>
      @error('password')<span class="error-msg">{{ $message }}</span>@enderror
    </div>

    <div class="row-extra">
      <label class="remember">
        <input type="checkbox" name="remember" id="remember_me">
        تذكرني
      </label>
      @if(Route::has('password.request'))
        <a href="{{ route('password.request') }}" class="forgot">نسيت كلمة المرور؟</a>
      @endif
    </div>

    <button type="submit" class="btn-submit">دخول ←</button>
  </form>

  <a href="{{ route('home') }}" class="back">← العودة إلى الموقع</a>
  <div class="version">Dinosaur CMS v1.0</div>
</div>

</body>
</html>
