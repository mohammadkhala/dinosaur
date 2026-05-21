<!DOCTYPE html>
<html lang="ar" dir="rtl" id="html-root">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>من نحن | {{ $settings['site_name_ar'] ?? 'ديناصور ميديا' }}</title>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;800;900&family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="/logo.png">
  <style>
    :root{--blue:#1A6FA8;--blue-l:#2A87CC;--blue-ll:#4BA3E0;--blue-d:#0F4266;--cyan:#7EC8F5;--bg:#04090E;--bg2:#060D14;--glass:rgba(26,111,168,0.1);--glass-b:rgba(75,163,224,0.25);--text:#EFF6FF;--text-m:#93C5FD;--text-d:#60A5FA;--radius:16px;--shadow:0 8px 32px rgba(26,111,168,0.4)}
    *{box-sizing:border-box;margin:0;padding:0}body{background:var(--bg);color:var(--text);font-family:'Cairo',sans-serif}a{text-decoration:none;color:inherit}ul{list-style:none}
    #nav{position:fixed;top:0;inset-inline:0;z-index:900;padding:0 clamp(1rem,4vw,3rem);transition:background .4s}
    #nav.scrolled{background:rgba(4,9,14,.92);backdrop-filter:blur(20px);box-shadow:0 1px 0 rgba(75,163,224,.25)}
    .nav-inner{max-width:1200px;margin:0 auto;display:flex;align-items:center;justify-content:space-between;height:72px}
    .nav-logo{display:flex;align-items:center;gap:.75rem}
    .nav-logo img{width:44px;height:44px;object-fit:contain}
    .nav-logo-text span:first-child{display:block;font-size:1rem;font-weight:900;color:var(--blue-ll)}
    .nav-logo-text span:last-child{display:block;font-size:.68rem;color:var(--text-m)}
    .nav-links{display:flex;gap:.2rem;align-items:center}
    .nav-links a{padding:.42rem .9rem;border-radius:8px;font-size:.9rem;font-weight:600;color:var(--text-m);transition:color .2s,background .2s}
    .nav-links a:hover{color:var(--text);background:rgba(26,111,168,.15)}
    .nav-cta{background:linear-gradient(135deg,var(--blue-d),var(--blue))!important;color:#fff!important;padding:.42rem 1.2rem!important;border-radius:10px!important}
    .lang-btn{background:rgba(26,111,168,.15);border:1px solid rgba(75,163,224,.35);color:var(--blue-ll);padding:.35rem .85rem;border-radius:8px;font-family:inherit;font-size:.82rem;font-weight:700;cursor:pointer}
    .page-hero{padding:120px clamp(1rem,4vw,3rem) 80px;background:var(--bg2);text-align:center;position:relative;overflow:hidden}
    .ab{position:absolute;border-radius:50%;filter:blur(90px);pointer-events:none}
    .ab1{width:500px;height:400px;background:rgba(26,111,168,.15);top:10%;left:0}
    .ab2{width:350px;height:350px;background:rgba(15,66,102,.2);top:30%;right:5%}
    .ph-badge{display:inline-flex;background:rgba(26,111,168,.2);border:1px solid rgba(75,163,224,.4);color:var(--blue-ll);padding:.4rem 1.1rem;border-radius:999px;font-size:.82rem;font-weight:700;margin-bottom:1.5rem}
    .ph-title{font-size:clamp(2rem,5vw,3.5rem);font-weight:900;margin-bottom:1rem}.accent{color:var(--blue-ll)}
    .ph-sub{color:var(--text-m);max-width:600px;margin:0 auto;line-height:1.85}
    section{padding:clamp(4rem,8vw,7rem) clamp(1rem,4vw,3rem);position:relative}
    .container{max-width:1200px;margin:0 auto}
    .sec-tag{font-size:.72rem;font-weight:700;letter-spacing:.15em;text-transform:uppercase;color:var(--blue-ll);margin-bottom:.5rem;display:block}
    .sec-title{font-size:clamp(1.8rem,3.5vw,2.8rem);font-weight:900;line-height:1.2;margin-bottom:1rem;background:linear-gradient(120deg,var(--text) 30%,var(--blue-ll) 50%,var(--cyan) 70%,var(--text) 90%);background-size:250% 100%;-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;animation:shimmer 6s linear infinite}
    @keyframes shimmer{to{background-position:-250% 0}}
    .scard{background:var(--glass);border:1px solid var(--glass-b);border-radius:var(--radius);padding:1.4rem 1rem;text-align:center;backdrop-filter:blur(12px)}
    .scard .n{font-size:1.9rem;font-weight:900;color:var(--blue-ll);display:block}
    .scard .l{font-size:.75rem;color:var(--text-m);margin-top:.3rem;display:block}
    .comp-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1.5rem}
    .comp-card{background:var(--glass);border:1px solid var(--glass-b);border-radius:22px;padding:2rem 1.7rem;backdrop-filter:blur(16px);transition:transform .3s,box-shadow .3s;position:relative}
    .comp-card:hover{transform:translateY(-6px);box-shadow:var(--shadow)}
    .comp-icon{font-size:2.4rem;margin-bottom:1rem}
    .comp-card h3{font-size:1.05rem;font-weight:800;margin-bottom:.7rem}
    .comp-card p{font-size:.88rem;color:var(--text-m);line-height:1.75}
    .glass-card{background:var(--glass);border:1px solid var(--glass-b);border-radius:var(--radius);backdrop-filter:blur(14px)}
    .tl{position:absolute;inset:0;border-radius:inherit;pointer-events:none;opacity:0;transition:opacity .3s}
    .cta-section{padding:4rem clamp(1rem,4vw,3rem);background:var(--bg);text-align:center}
    .cta-box{background:var(--glass);border:1px solid var(--glass-b);border-radius:28px;padding:3.5rem;backdrop-filter:blur(18px);max-width:700px;margin:0 auto}
    .cta-box h2{font-size:clamp(1.6rem,3vw,2.4rem);font-weight:900;margin-bottom:1rem}
    .cta-box p{color:var(--text-m);margin-bottom:2rem}
    .cta-actions{display:flex;gap:1rem;justify-content:center;flex-wrap:wrap}
    .btn{padding:.75rem 1.8rem;border-radius:12px;font-size:.95rem;font-weight:700;font-family:inherit;border:none;cursor:pointer;transition:all .25s;display:inline-flex;align-items:center;gap:.5rem}
    .btn-primary{background:linear-gradient(135deg,var(--blue-d),var(--blue));color:#fff;box-shadow:0 4px 24px rgba(26,111,168,.55)}
    .btn-outline{background:transparent;border:1.5px solid rgba(75,163,224,.45);color:var(--cyan)}
    footer{background:var(--bg);border-top:1px solid rgba(75,163,224,.18);padding:2.5rem clamp(1rem,4vw,3rem)}
    .foot-inner{max-width:1200px;margin:0 auto}
    .foot-bottom{display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:1rem}
    .foot-bottom p{color:var(--text-d);font-size:.8rem}
    .reveal{opacity:0;transform:translateY(40px);transition:opacity .7s,transform .7s cubic-bezier(.16,1,.3,1)}
    .reveal.visible{opacity:1;transform:translateY(0)}
    .lang-en{display:none}
    html[lang="en"] .lang-ar{display:none}html[lang="en"] .lang-en{display:block}
    html[lang="en"] body{font-family:'Inter',sans-serif}
  </style>
</head>
<body>
<nav id="nav">
  <div class="nav-inner">
    <a href="{{ route('home') }}" class="nav-logo">
      <img src="/logo.png" alt="{{ $settings['site_name_ar'] ?? 'Dinosaur Media' }}"/>
      <div class="nav-logo-text">
        <span>{{ $settings['site_name_ar'] ?? 'ديناصور ميديا' }}</span>
        <span>{{ $settings['site_name_en'] ?? 'Dinosaur Media' }} · منذ {{ $settings['founded_year'] ?? '2016' }}</span>
      </div>
    </a>
    <ul class="nav-links">
      <li><a href="{{ route('home') }}"><span class="lang-ar">الرئيسية</span><span class="lang-en">Home</span></a></li>
      <li><a href="{{ route('about') }}"><span class="lang-ar">من نحن</span><span class="lang-en">About</span></a></li>
      <li><a href="{{ route('contact') }}" class="nav-cta"><span class="lang-ar">تواصل معنا</span><span class="lang-en">Contact</span></a></li>
    </ul>
    <button class="lang-btn" id="lang-btn">EN</button>
  </div>
</nav>

<div class="page-hero">
  <div class="ab ab1"></div><div class="ab ab2"></div>
  <div class="ph-badge"><span class="lang-ar">ديناصور ميديا — منذ {{ $settings['founded_year'] ?? '2016' }}</span><span class="lang-en">Dinosaur Media — Since {{ $settings['founded_year'] ?? '2016' }}</span></div>
  <h1 class="ph-title reveal"><span class="lang-ar"><span class="accent">من نحن</span> — قصة إبداع</span><span class="lang-en"><span class="accent">About Us</span> — A Creative Story</span></h1>
  <p class="ph-sub reveal">
    <span class="lang-ar">{{ $settings['about_ar'] ?? '' }}</span>
    <span class="lang-en">{{ $settings['about_en'] ?? '' }}</span>
  </p>
</div>

<section style="background:var(--bg2)">
  <div class="ab ab2"></div>
  <div class="container">
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:4rem;align-items:center">
      <div class="reveal">
        <span class="sec-tag"><span class="lang-ar">قصتنا</span><span class="lang-en">Our Story</span></span>
        <h2 class="sec-title"><span class="lang-ar">إبداع بدأ من الشغف</span><span class="lang-en">Creativity Born from Passion</span></h2>
        <p style="color:var(--text-m);margin-bottom:1.2rem;line-height:1.9">
          <span class="lang-ar">{{ $settings['about_ar'] ?? '' }}</span>
          <span class="lang-en">{{ $settings['about_en'] ?? '' }}</span>
        </p>
        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:1rem;margin-top:2rem">
          <div class="scard reveal"><span class="n">{{ $settings['founded_year'] ?? '2016' }}</span><span class="l"><span class="lang-ar">التأسيس</span><span class="lang-en">Founded</span></span></div>
          <div class="scard reveal"><span class="n">{{ $settings['projects_count'] ?? '200' }}+</span><span class="l"><span class="lang-ar">مشروع</span><span class="lang-en">Projects</span></span></div>
          <div class="scard reveal"><span class="n">{{ $settings['clients_count'] ?? '100' }}+</span><span class="l"><span class="lang-ar">عميل</span><span class="lang-en">Clients</span></span></div>
        </div>
      </div>
      <div class="reveal" style="display:flex;justify-content:center">
        <div class="glass-card" style="width:320px;padding:3rem 2rem;text-align:center;position:relative;overflow:hidden">
          <div class="tl"></div>
          <div style="position:absolute;top:0;left:0;right:0;height:4px;background:linear-gradient(90deg,var(--blue-d),var(--blue),var(--cyan))"></div>
          <img src="/logo.png" alt="Dinosaur Media" style="width:120px;height:120px;object-fit:contain;margin:0 auto 1.5rem;filter:drop-shadow(0 0 20px rgba(75,163,224,.5));display:block"/>
          <h3 style="font-size:1.3rem;font-weight:900;color:var(--blue-ll);margin-bottom:.5rem">{{ $settings['site_name_en'] ?? 'Dinosaur Media' }}</h3>
          <p style="color:var(--text-m);font-size:.88rem;line-height:1.7"><span class="lang-ar">وكالة إبداعية متخصصة في تطوير الأعمال الرقمية</span><span class="lang-en">Creative agency for digital business development</span></p>
          <span style="display:inline-block;margin-top:1.2rem;background:rgba(26,111,168,.2);border:1px solid rgba(75,163,224,.35);color:var(--blue-ll);padding:.3rem .9rem;border-radius:999px;font-size:.78rem;font-weight:700">منذ {{ $settings['founded_year'] ?? '2016' }} · الخليل، فلسطين</span>
        </div>
      </div>
    </div>
  </div>
</section>

<section style="background:var(--bg)">
  <div class="container">
    <div style="text-align:center;margin-bottom:3rem">
      <span class="sec-tag"><span class="lang-ar">رسالتنا ورؤيتنا</span><span class="lang-en">Mission & Vision</span></span>
      <h2 class="sec-title"><span class="lang-ar">ما يميّزنا</span><span class="lang-en">What Sets Us Apart</span></h2>
    </div>
    <div class="comp-grid">
      <div class="comp-card reveal"><div class="comp-icon">🏹</div><h3><span class="lang-ar">رسالتنا</span><span class="lang-en">Our Mission</span></h3><p><span class="lang-ar">تمكين الأفراد والشركات من بناء حضور رقمي قوي بخدمات إبداعية عالية الجودة.</span><span class="lang-en">Empowering businesses to build a strong digital presence through high-quality creative services.</span></p></div>
      <div class="comp-card reveal"><div class="comp-icon">🔭</div><h3><span class="lang-ar">رؤيتنا</span><span class="lang-en">Our Vision</span></h3><p><span class="lang-ar">أن نكون الوكالة الإبداعية الأولى في فلسطين والمنطقة العربية.</span><span class="lang-en">To be the leading creative agency in Palestine and the Arab world.</span></p></div>
      <div class="comp-card reveal"><div class="comp-icon">💡</div><h3><span class="lang-ar">نهجنا</span><span class="lang-en">Our Approach</span></h3><p><span class="lang-ar">نجمع بين الإبداع والاستراتيجية لنقدم نتائج حقيقية تفوق التوقعات.</span><span class="lang-en">We combine creativity and strategy to deliver real results that exceed expectations.</span></p></div>
    </div>
  </div>
</section>

<div class="cta-section">
  <div class="cta-box reveal">
    <h2><span class="lang-ar">هل أنت جاهز لبدء مشروعك؟</span><span class="lang-en">Ready to Start Your Project?</span></h2>
    <p><span class="lang-ar">تواصل معنا الآن وسنكون سعداء بتحويل أفكارك إلى واقع رقمي مميّز.</span><span class="lang-en">Contact us now and we'll turn your ideas into a distinctive digital reality.</span></p>
    <div class="cta-actions">
      <a href="{{ route('contact') }}" class="btn btn-primary"><span class="lang-ar">ابدأ معنا الآن ←</span><span class="lang-en">Start Now →</span></a>
      @if($settings['whatsapp'] ?? null)<a href="https://wa.me/{{ $settings['whatsapp'] }}" target="_blank" class="btn btn-outline">📱 WhatsApp</a>@endif
    </div>
  </div>
</div>

<footer>
  <div class="foot-inner">
    <div class="foot-bottom">
      <p>© {{ date('Y') }} {{ $settings['site_name_ar'] ?? 'ديناصور ميديا' }} · الخليل، فلسطين · جميع الحقوق محفوظة</p>
    </div>
  </div>
</footer>

<script>
let currentLang=localStorage.getItem('dino-lang')||'ar';
function setLang(lang){currentLang=lang;document.documentElement.lang=lang;document.documentElement.dir=lang==='ar'?'rtl':'ltr';const btn=document.getElementById('lang-btn');if(btn)btn.textContent=lang==='ar'?'EN':'AR';localStorage.setItem('dino-lang',lang);}
document.getElementById('lang-btn').addEventListener('click',()=>setLang(currentLang==='ar'?'en':'ar'));
setLang(currentLang);
const nav=document.getElementById('nav');
window.addEventListener('scroll',()=>nav.classList.toggle('scrolled',scrollY>30),{passive:true});
const rObs=new IntersectionObserver(es=>{es.forEach(e=>{if(e.isIntersecting){e.target.classList.add('visible');rObs.unobserve(e.target);}});},{threshold:.1});
document.querySelectorAll('.reveal').forEach(el=>rObs.observe(el));
</script>
</body>
</html>
