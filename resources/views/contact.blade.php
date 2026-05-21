<!DOCTYPE html>
<html lang="ar" dir="rtl" id="html-root">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>تواصل معنا | {{ $settings['site_name_ar'] ?? 'ديناصور ميديا' }}</title>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;800;900&family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="/logo.png">
  <style>
    :root{--blue:#1A6FA8;--blue-l:#2A87CC;--blue-ll:#4BA3E0;--blue-d:#0F4266;--cyan:#7EC8F5;--bg:#04090E;--bg2:#060D14;--glass:rgba(26,111,168,0.1);--glass-b:rgba(75,163,224,0.25);--text:#EFF6FF;--text-m:#93C5FD;--text-d:#60A5FA;--radius:16px;--shadow:0 8px 32px rgba(26,111,168,0.4)}
    *{box-sizing:border-box;margin:0;padding:0}body{background:var(--bg);color:var(--text);font-family:'Cairo',sans-serif}a{text-decoration:none;color:inherit}
    #nav{position:fixed;top:0;inset-inline:0;z-index:900;padding:0 clamp(1rem,4vw,3rem);transition:background .4s}
    #nav.scrolled{background:rgba(4,9,14,.92);backdrop-filter:blur(20px)}
    .nav-inner{max-width:1200px;margin:0 auto;display:flex;align-items:center;justify-content:space-between;height:72px}
    .nav-logo{display:flex;align-items:center;gap:.75rem}
    .nav-logo img{width:44px;height:44px;object-fit:contain}
    .nav-logo-text span:first-child{display:block;font-size:1rem;font-weight:900;color:var(--blue-ll)}
    .nav-logo-text span:last-child{display:block;font-size:.68rem;color:var(--text-m)}
    .nav-links{display:flex;gap:.2rem;align-items:center}
    .nav-links a{padding:.42rem .9rem;border-radius:8px;font-size:.9rem;font-weight:600;color:var(--text-m);transition:all .2s}
    .nav-links a:hover{color:var(--text);background:rgba(26,111,168,.15)}
    .nav-cta{background:linear-gradient(135deg,var(--blue-d),var(--blue))!important;color:#fff!important;padding:.42rem 1.2rem!important;border-radius:10px!important}
    .lang-btn{background:rgba(26,111,168,.15);border:1px solid rgba(75,163,224,.35);color:var(--blue-ll);padding:.35rem .85rem;border-radius:8px;font-family:inherit;font-size:.82rem;font-weight:700;cursor:pointer}
    .page-hero{padding:120px clamp(1rem,4vw,3rem) 80px;background:var(--bg2);text-align:center}
    .ph-badge{display:inline-flex;background:rgba(26,111,168,.2);border:1px solid rgba(75,163,224,.4);color:var(--blue-ll);padding:.4rem 1.1rem;border-radius:999px;font-size:.82rem;font-weight:700;margin-bottom:1.5rem}
    .ph-title{font-size:clamp(2rem,5vw,3.5rem);font-weight:900;margin-bottom:1rem}.accent{color:var(--blue-ll)}
    .ph-sub{color:var(--text-m);max-width:600px;margin:0 auto}
    section{padding:clamp(4rem,8vw,7rem) clamp(1rem,4vw,3rem)}
    .container{max-width:1200px;margin:0 auto}
    .contact-grid{display:grid;grid-template-columns:1fr 1.2fr;gap:3rem;align-items:start}
    .cinfo{display:flex;flex-direction:column;gap:1.1rem}
    .cc{display:flex;align-items:center;gap:1rem;background:var(--glass);border:1px solid var(--glass-b);border-radius:var(--radius);padding:1.2rem 1.4rem;backdrop-filter:blur(14px);transition:transform .3s;position:relative;overflow:hidden}
    a.cc:hover{transform:translateX(-6px);border-color:rgba(75,163,224,.6);box-shadow:var(--shadow)}
    .cc-icon{width:46px;height:46px;border-radius:12px;flex-shrink:0;background:linear-gradient(135deg,var(--blue-d),var(--blue));display:flex;align-items:center;justify-content:center;font-size:1.2rem}
    .cc strong{display:block;font-size:.82rem;color:var(--text-m);margin-bottom:.15rem}
    .cc span{font-size:.93rem;font-weight:600}
    .social-row{display:flex;gap:.7rem;flex-wrap:wrap;margin-top:.5rem}
    .soc-btn{background:var(--glass);border:1px solid var(--glass-b);color:var(--text-m);padding:.4rem 1rem;border-radius:10px;font-size:.82rem;font-weight:700;transition:all .2s}
    .soc-btn:hover{background:var(--blue);color:#fff}
    .cform{background:var(--glass);border:1px solid var(--glass-b);border-radius:22px;padding:2rem;backdrop-filter:blur(18px)}
    .cform h3{font-size:1.2rem;font-weight:800;margin-bottom:1.4rem}
    .fg{margin-bottom:1rem}
    .fg label{display:block;font-size:.82rem;font-weight:600;color:var(--text-m);margin-bottom:.4rem}
    .fg input,.fg textarea,.fg select{width:100%;padding:.75rem 1rem;border-radius:10px;background:rgba(4,9,14,.75);border:1px solid rgba(75,163,224,.28);color:var(--text);font-family:inherit;font-size:.9rem;outline:none;transition:border-color .25s}
    .fg input:focus,.fg textarea:focus,.fg select:focus{border-color:var(--blue-ll);box-shadow:0 0 0 3px rgba(75,163,224,.2)}
    .fg textarea{min-height:110px;resize:vertical}
    .frow{display:grid;grid-template-columns:1fr 1fr;gap:1rem}
    .btn-sub{width:100%;background:linear-gradient(135deg,var(--blue-d),var(--blue));color:#fff;padding:.85rem;border-radius:12px;font-size:.95rem;font-weight:700;font-family:inherit;border:none;cursor:pointer;transition:transform .25s}
    .btn-sub:hover{transform:translateY(-2px)}
    footer{background:var(--bg);border-top:1px solid rgba(75,163,224,.18);padding:2rem clamp(1rem,4vw,3rem)}
    .foot-bottom{max-width:1200px;margin:0 auto;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:1rem}
    .foot-bottom p{color:var(--text-d);font-size:.8rem}
    .lang-en{display:none}html[lang="en"] .lang-ar{display:none}html[lang="en"] .lang-en{display:block}
    html[lang="en"] body{font-family:'Inter',sans-serif}
    @media(max-width:768px){.contact-grid{grid-template-columns:1fr}.frow{grid-template-columns:1fr}}
  </style>
</head>
<body>
<nav id="nav">
  <div class="nav-inner">
    <a href="{{ route('home') }}" class="nav-logo">
      <img src="/logo.png" alt="{{ $settings['site_name_ar'] ?? 'Dinosaur Media' }}"/>
      <div class="nav-logo-text">
        <span>{{ $settings['site_name_ar'] ?? 'ديناصور ميديا' }}</span>
        <span>{{ $settings['site_name_en'] ?? 'Dinosaur Media' }}</span>
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
  <div class="ph-badge"><span class="lang-ar">تواصل معنا</span><span class="lang-en">Contact Us</span></div>
  <h1 class="ph-title"><span class="lang-ar"><span class="accent">تواصل</span> مع فريقنا</span><span class="lang-en"><span class="accent">Contact</span> Our Team</span></h1>
  <p class="ph-sub"><span class="lang-ar">هل لديك مشروع؟ نحن جاهزون لتحويل أفكارك إلى واقع رقمي مميز.</span><span class="lang-en">Have a project? We're ready to turn your ideas into a distinctive digital reality.</span></p>
</div>

<section>
  <div class="container">
    <div class="contact-grid">
      <div class="cinfo">
        @if($settings['whatsapp'] ?? null)
        <a href="https://wa.me/{{ $settings['whatsapp'] }}" target="_blank" class="cc">
          <div class="cc-icon">📱</div>
          <div><strong><span class="lang-ar">واتساب</span><span class="lang-en">WhatsApp</span></strong><span>{{ $settings['phone'] ?? '' }}</span></div>
        </a>
        @endif
        @if($settings['email'] ?? null)
        <a href="mailto:{{ $settings['email'] }}" class="cc">
          <div class="cc-icon">✉️</div>
          <div><strong><span class="lang-ar">البريد الإلكتروني</span><span class="lang-en">Email</span></strong><span>{{ $settings['email'] }}</span></div>
        </a>
        @endif
        <div class="cc" style="cursor:default">
          <div class="cc-icon">📍</div>
          <div><strong><span class="lang-ar">العنوان</span><span class="lang-en">Address</span></strong>
            <span><span class="lang-ar">{{ $settings['address_ar'] ?? '' }}</span><span class="lang-en">{{ $settings['address_en'] ?? '' }}</span></span>
          </div>
        </div>
        <div class="cc" style="cursor:default;flex-direction:column;align-items:flex-start;gap:1rem">
          <div style="display:flex;align-items:center;gap:1rem"><div class="cc-icon">🌐</div><strong><span class="lang-ar">تابعنا</span><span class="lang-en">Follow Us</span></strong></div>
          <div class="social-row">
            @if($settings['facebook'] ?? null)<a href="{{ $settings['facebook'] }}" target="_blank" class="soc-btn">📘 Facebook</a>@endif
            @if($settings['instagram'] ?? null)<a href="{{ $settings['instagram'] }}" target="_blank" class="soc-btn">📷 Instagram</a>@endif
            @if($settings['linkedin'] ?? null)<a href="{{ $settings['linkedin'] }}" target="_blank" class="soc-btn">💼 LinkedIn</a>@endif
            @if($settings['behance'] ?? null)<a href="{{ $settings['behance'] }}" target="_blank" class="soc-btn">🎨 Behance</a>@endif
          </div>
        </div>
      </div>

      <div class="cform">
        <h3><span class="lang-ar">أرسل لنا رسالة 💬</span><span class="lang-en">Send Us a Message 💬</span></h3>
        <form id="contact-form">
          @csrf
          <div class="frow">
            <div class="fg"><label><span class="lang-ar">الاسم الكامل</span><span class="lang-en">Full Name</span></label><input type="text" name="name" required/></div>
            <div class="fg"><label><span class="lang-ar">رقم الهاتف</span><span class="lang-en">Phone</span></label><input type="tel" name="phone"/></div>
          </div>
          <div class="fg"><label><span class="lang-ar">البريد الإلكتروني</span><span class="lang-en">Email</span></label><input type="email" name="email"/></div>
          <div class="fg">
            <label><span class="lang-ar">الخدمة المطلوبة</span><span class="lang-en">Service Required</span></label>
            <select name="service">
              <option value=""><span class="lang-ar">اختر...</span><span class="lang-en">Select...</span></option>
              <option value="identity">🎨 هوية بصرية</option>
              <option value="social">📱 إدارة السوشيال ميديا</option>
              <option value="website">💻 تصميم موقع</option>
              <option value="photography">📸 تصوير منتجات</option>
              <option value="print">🖨️ مطبوعات</option>
              <option value="ads">📊 إعلانات</option>
              <option value="package">📦 حزمة متكاملة</option>
            </select>
          </div>
          <div class="fg"><label><span class="lang-ar">تفاصيل المشروع</span><span class="lang-en">Project Details</span></label><textarea name="message" rows="4"></textarea></div>
          <button type="submit" class="btn-sub"><span class="lang-ar">إرسال الرسالة ✉️</span><span class="lang-en">Send Message ✉️</span></button>
        </form>
      </div>
    </div>
  </div>
</section>

<footer>
  <div class="foot-bottom">
    <p>© {{ date('Y') }} {{ $settings['site_name_ar'] ?? 'ديناصور ميديا' }} · الخليل، فلسطين</p>
  </div>
</footer>

<script>
let currentLang=localStorage.getItem('dino-lang')||'ar';
function setLang(lang){currentLang=lang;document.documentElement.lang=lang;document.documentElement.dir=lang==='ar'?'rtl':'ltr';const btn=document.getElementById('lang-btn');if(btn)btn.textContent=lang==='ar'?'EN':'AR';localStorage.setItem('dino-lang',lang);}
document.getElementById('lang-btn').addEventListener('click',()=>setLang(currentLang==='ar'?'en':'ar'));
setLang(currentLang);
const nav=document.getElementById('nav');window.addEventListener('scroll',()=>nav.classList.toggle('scrolled',scrollY>30),{passive:true});
const form=document.getElementById('contact-form');
if(form)form.addEventListener('submit',async e=>{
  e.preventDefault();const btn=form.querySelector('.btn-sub');btn.disabled=true;
  try{const res=await fetch('{{ route("contact.store") }}',{method:'POST',headers:{'X-CSRF-TOKEN':'{{ csrf_token() }}','Accept':'application/json'},body:new FormData(form)});
  if(res.ok){btn.innerHTML='✓ تم الإرسال';btn.style.background='linear-gradient(135deg,#059669,#10b981)';form.reset();setLang(currentLang);setTimeout(()=>{btn.innerHTML='<span class="lang-ar">إرسال الرسالة ✉️</span><span class="lang-en">Send Message ✉️</span>';btn.style.background='';btn.disabled=false;},3000);}}
  catch(err){btn.disabled=false;}
});
</script>
</body>
</html>
