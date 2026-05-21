<!DOCTYPE html>
<html lang="ar" dir="rtl" id="html-root">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ $settings['site_name_ar'] ?? 'ديناصور ميديا' }} | {{ $settings['site_name_en'] ?? 'Dinosaur Media' }}</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;800;900&family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/three@0.160.0/build/three.min.js"></script>
  <link rel="icon" type="image/png" href="/logo.png">
  <style>
    :root{--blue:#1A6FA8;--blue-l:#2A87CC;--blue-ll:#4BA3E0;--blue-d:#0F4266;--blue-dd:#0A2A40;--cyan:#7EC8F5;--white:#EFF6FF;--bg:#04090E;--bg2:#060D14;--bg3:#091219;--glass:rgba(26,111,168,0.1);--glass-b:rgba(75,163,224,0.25);--text:#EFF6FF;--text-m:#93C5FD;--text-d:#60A5FA;--radius:16px;--shadow:0 8px 32px rgba(26,111,168,0.4)}
    *,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
    html{scroll-behavior:smooth}
    body{background:var(--bg);color:var(--text);font-family:'Cairo',sans-serif;line-height:1.7;overflow-x:hidden}
    a{text-decoration:none;color:inherit}ul{list-style:none}
    @media(hover:hover){*{cursor:none!important}}
    .c-dot{position:fixed;top:0;left:0;width:8px;height:8px;background:#fff;border-radius:50%;pointer-events:none;z-index:9999;transform:translate(-50%,-50%);mix-blend-mode:difference}
    .c-ring{position:fixed;top:0;left:0;width:38px;height:38px;border:1.5px solid rgba(75,163,224,.8);border-radius:50%;pointer-events:none;z-index:9998;transform:translate(-50%,-50%);transition:width .2s,height .2s}
    .c-ring.expand{width:60px;height:60px}
    #prog{position:fixed;top:0;right:0;left:0;height:3px;z-index:1000;background:linear-gradient(90deg,var(--blue-d),var(--blue),var(--blue-ll),var(--cyan));transform-origin:right;transform:scaleX(0)}
    #nav{position:fixed;top:0;inset-inline:0;z-index:900;padding:0 clamp(1rem,4vw,3rem);transition:background .4s,box-shadow .4s}
    #nav.scrolled{background:rgba(4,9,14,.92);backdrop-filter:blur(20px) saturate(160%);box-shadow:0 1px 0 rgba(75,163,224,.25)}
    .nav-inner{max-width:1200px;margin:0 auto;display:flex;align-items:center;justify-content:space-between;height:72px}
    .nav-logo{display:flex;align-items:center;gap:.75rem}
    .nav-logo img{width:44px;height:44px;object-fit:contain}
    .nav-logo-text span:first-child{display:block;font-size:1rem;font-weight:900;color:var(--blue-ll)}
    .nav-logo-text span:last-child{display:block;font-size:.68rem;font-weight:600;color:var(--text-m);letter-spacing:.05em}
    .nav-links{display:flex;gap:.2rem;align-items:center}
    .nav-links>li{position:relative}
    .nav-links a{padding:.42rem .9rem;border-radius:8px;font-size:.9rem;font-weight:600;color:var(--text-m);transition:color .2s,background .2s;position:relative}
    .nav-links a::after{content:'';position:absolute;bottom:4px;inset-inline:12px;height:2px;background:var(--blue-ll);border-radius:2px;transform:scaleX(0);transition:transform .25s}
    .nav-links a:hover{color:var(--text);background:rgba(26,111,168,.15)}
    .nav-links a:hover::after{transform:scaleX(1)}
    .nav-cta{background:linear-gradient(135deg,var(--blue-d),var(--blue))!important;color:#fff!important;padding:.42rem 1.2rem!important;border-radius:10px!important;box-shadow:0 0 20px rgba(26,111,168,.5)!important}
    .lang-btn{background:rgba(26,111,168,.15);border:1px solid rgba(75,163,224,.35);color:var(--blue-ll);padding:.35rem .85rem;border-radius:8px;font-family:inherit;font-size:.82rem;font-weight:700;cursor:pointer;transition:background .2s,color .2s}
    .hamburger{display:none;flex-direction:column;gap:5px;background:none;border:none;padding:8px;cursor:pointer}
    .hamburger span{display:block;width:24px;height:2px;background:var(--blue-ll);border-radius:2px;transition:.3s}
    .has-drop>a{display:flex;align-items:center;gap:.3rem}
    .has-drop>a::after{content:'▾';font-size:.65rem;margin-inline-start:.2rem;border:none;background:none;height:auto;width:auto;transform:none!important;position:static;border-radius:0;display:inline}
    .drop-menu{position:absolute;top:calc(100% + 6px);inset-inline-start:0;min-width:220px;background:rgba(4,9,14,.96);backdrop-filter:blur(20px);border:1px solid rgba(75,163,224,.2);border-radius:14px;padding:.5rem;opacity:0;pointer-events:none;transform:translateY(-8px);transition:opacity .2s,transform .2s;z-index:200}
    .has-drop:hover .drop-menu{opacity:1;pointer-events:all;transform:translateY(0)}
    .drop-menu a{display:block;padding:.55rem .9rem;border-radius:8px;font-size:.85rem;color:var(--text-m);background:none}
    .drop-menu a::after{display:none!important}
    .drop-menu a:hover{background:rgba(26,111,168,.22);color:var(--text)}
    #hero{position:relative;min-height:100vh;display:flex;align-items:center;overflow:hidden;padding:80px clamp(1rem,4vw,3rem) 0}
    #hero-canvas{position:absolute;inset:0;width:100%;height:100%;pointer-events:none;z-index:0}
    .hero-overlay{position:absolute;inset:0;background:radial-gradient(ellipse at 60% 50%,rgba(26,111,168,.12) 0%,transparent 70%);z-index:1;pointer-events:none}
    .hero-inner{position:relative;z-index:2;max-width:1200px;margin:0 auto;width:100%;display:flex;align-items:center;gap:3rem;padding:4rem 0 5rem}
    .hero-text{flex:1}
    .hero-badge{display:inline-flex;align-items:center;gap:.5rem;background:rgba(26,111,168,.2);border:1px solid rgba(75,163,224,.4);color:var(--blue-ll);padding:.4rem 1.1rem;border-radius:999px;font-size:.82rem;font-weight:700;margin-bottom:1.5rem;animation:fadeUp .8s .1s both}
    .hero-badge::before{content:'';width:7px;height:7px;border-radius:50%;background:#4BA3E0;animation:pdot 2s infinite}
    @keyframes pdot{0%,100%{box-shadow:0 0 0 0 rgba(75,163,224,.7)}50%{box-shadow:0 0 0 6px rgba(75,163,224,0)}}
    .hero-name{font-size:clamp(2.2rem,5vw,4.2rem);font-weight:900;line-height:1.1;margin-bottom:.6rem;animation:fadeUp .8s .2s both}
    .hero-name .b1{color:var(--blue-ll)}.hero-name .b2{color:var(--cyan)}
    .hero-typed{font-size:clamp(1rem,2vw,1.3rem);font-weight:700;color:var(--cyan);min-height:2em;margin-bottom:.8rem;animation:fadeUp .8s .25s both}
    .typed-cursor{display:inline-block;width:2px;height:1.1em;background:var(--blue-ll);margin-inline-start:2px;animation:blink .8s infinite;vertical-align:middle}
    @keyframes blink{0%,100%{opacity:1}50%{opacity:0}}
    .hero-sub{font-size:clamp(.95rem,1.7vw,1.1rem);color:var(--text-m);max-width:540px;margin-bottom:2rem;animation:fadeUp .8s .3s both;line-height:1.9}
    .hero-actions{display:flex;gap:1rem;flex-wrap:wrap;animation:fadeUp .8s .4s both}
    .btn{padding:.75rem 1.8rem;border-radius:12px;font-size:.95rem;font-weight:700;font-family:inherit;border:none;cursor:pointer;transition:all .25s;display:inline-flex;align-items:center;gap:.5rem}
    .btn-primary{background:linear-gradient(135deg,var(--blue-d),var(--blue));color:#fff;box-shadow:0 4px 24px rgba(26,111,168,.55)}
    .btn-primary:hover{transform:translateY(-2px);box-shadow:0 8px 36px rgba(26,111,168,.75)}
    .btn-outline{background:transparent;border:1.5px solid rgba(75,163,224,.45);color:var(--cyan)}
    .btn-outline:hover{border-color:var(--blue-ll);color:#fff;background:rgba(26,111,168,.15)}
    .hero-stats{display:flex;gap:2.5rem;margin-top:2.5rem;flex-wrap:wrap;animation:fadeUp .8s .5s both}
    .hst{display:flex;flex-direction:column}
    .hst-n{font-size:2.2rem;font-weight:900;color:var(--blue-ll);line-height:1}
    .hst-l{font-size:.75rem;color:var(--text-m);margin-top:.2rem}
    .hero-visual{flex:0 0 360px;position:relative;display:flex;align-items:center;justify-content:center;animation:fadeUp .8s .35s both}
    .hero-ring{width:270px;height:270px;border-radius:50%;background:radial-gradient(circle at 40% 40%,rgba(26,111,168,.4),rgba(4,9,14,.7));border:1px solid rgba(75,163,224,.3);display:flex;align-items:center;justify-content:center;box-shadow:0 0 80px rgba(26,111,168,.5),0 0 160px rgba(26,111,168,.18);animation:rpulse 4s ease-in-out infinite}
    @keyframes rpulse{0%,100%{box-shadow:0 0 60px rgba(26,111,168,.45),0 0 120px rgba(26,111,168,.15);transform:scale(1)}50%{box-shadow:0 0 100px rgba(26,111,168,.7),0 0 200px rgba(26,111,168,.25);transform:scale(1.03)}}
    .ftag{position:absolute;background:rgba(6,13,20,.9);border:1px solid rgba(75,163,224,.4);backdrop-filter:blur(10px);padding:.5rem 1rem;border-radius:999px;font-size:.8rem;font-weight:700;color:var(--cyan);white-space:nowrap}
    .ftag-1{top:5%;inset-inline-start:-20px;animation:f1 5s ease-in-out infinite}
    .ftag-2{bottom:20%;inset-inline-end:-20px;animation:f2 6s ease-in-out infinite}
    .ftag-3{bottom:5%;inset-inline-start:0;animation:f3 4.5s ease-in-out infinite}
    @keyframes f1{0%,100%{transform:translateY(0)}50%{transform:translateY(-12px)}}
    @keyframes f2{0%,100%{transform:translateY(0)}50%{transform:translateY(10px)}}
    @keyframes f3{0%,100%{transform:translateY(0)}50%{transform:translateY(-8px)}}
    @keyframes fadeUp{from{opacity:0;transform:translateY(30px)}to{opacity:1;transform:translateY(0)}}
    .ab{position:absolute;border-radius:50%;filter:blur(90px);pointer-events:none;z-index:0}
    .ab1{width:500px;height:400px;background:rgba(26,111,168,.15);top:10%;inset-inline-start:0;animation:a1 14s ease-in-out infinite}
    .ab2{width:350px;height:350px;background:rgba(15,66,102,.2);top:30%;inset-inline-end:5%;animation:a2 17s ease-in-out infinite}
    .ab3{width:300px;height:300px;background:rgba(75,163,224,.07);bottom:5%;inset-inline-start:30%;animation:a3 11s ease-in-out infinite}
    @keyframes a1{0%,100%{transform:translate(0,0) scale(1)}50%{transform:translate(40px,50px) scale(1.1)}}
    @keyframes a2{0%,100%{transform:translate(0,0) scale(1)}50%{transform:translate(-40px,-30px) scale(1.2)}}
    @keyframes a3{0%,100%{transform:translate(0,0) scale(1)}50%{transform:translate(20px,-30px) scale(.9)}}
    section{padding:clamp(4rem,8vw,7rem) clamp(1rem,4vw,3rem);position:relative}
    .container{max-width:1200px;margin:0 auto}
    .sec-tag{font-size:.72rem;font-weight:700;letter-spacing:.15em;text-transform:uppercase;color:var(--blue-ll);margin-bottom:.5rem;display:block}
    .sec-title{font-size:clamp(1.8rem,3.5vw,2.8rem);font-weight:900;line-height:1.2;margin-bottom:1rem;background:linear-gradient(120deg,var(--text) 30%,var(--blue-ll) 50%,var(--cyan) 70%,var(--text) 90%);background-size:250% 100%;-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;animation:shimmer 6s linear infinite}
    @keyframes shimmer{to{background-position:-250% 0}}
    .sec-sub{color:var(--text-m);max-width:580px;font-size:1rem;margin-bottom:3rem;line-height:1.85}
    .center{text-align:center}.center .sec-sub{margin-inline:auto}
    #about{background:var(--bg2);overflow:hidden}
    .about-grid{display:grid;grid-template-columns:1fr 1fr;gap:4rem;align-items:center}
    .about-text p{color:var(--text-m);margin-bottom:1.2rem;font-size:1.02rem;line-height:1.9}
    .about-text strong{color:var(--cyan)}
    .stats-row{display:grid;grid-template-columns:repeat(4,1fr);gap:1.2rem;margin-top:2rem}
    .scard{background:var(--glass);border:1px solid var(--glass-b);border-radius:var(--radius);padding:1.4rem 1rem;text-align:center;backdrop-filter:blur(12px);transition:transform .3s,box-shadow .3s}
    .scard:hover{transform:translateY(-5px);box-shadow:var(--shadow)}
    .scard .n{font-size:1.9rem;font-weight:900;color:var(--blue-ll);display:block}
    .scard .l{font-size:.75rem;color:var(--text-m);margin-top:.3rem;display:block}
    .about-visual{position:relative;display:flex;justify-content:center;align-items:center}
    .acard-big{width:320px;height:380px;background:var(--glass);border:1px solid var(--glass-b);border-radius:28px;backdrop-filter:blur(20px);display:flex;flex-direction:column;align-items:center;justify-content:center;gap:1.2rem;box-shadow:0 20px 80px rgba(26,111,168,.3);position:relative;overflow:hidden}
    .acard-big::before{content:'';position:absolute;top:0;left:0;right:0;height:4px;background:linear-gradient(90deg,var(--blue-d),var(--blue),var(--cyan))}
    .acard-big h3{font-size:1.3rem;font-weight:900;color:var(--blue-ll)}
    .acard-big p{font-size:.85rem;color:var(--text-m);text-align:center;padding:0 1.5rem}
    .acard-big .since{font-size:.8rem;background:rgba(26,111,168,.25);border:1px solid rgba(75,163,224,.3);color:var(--blue-ll);padding:.3rem .9rem;border-radius:999px;font-weight:700}
    .fbadge{position:absolute;background:rgba(4,9,14,.92);border:1px solid rgba(75,163,224,.35);backdrop-filter:blur(12px);padding:.6rem 1.1rem;border-radius:14px;font-size:.78rem;font-weight:700;color:var(--cyan)}
    .fb1{top:-10px;inset-inline-end:-20px;animation:f1 5s ease-in-out infinite}
    .fb2{bottom:10px;inset-inline-start:-30px;animation:f2 6s ease-in-out infinite}
    #services{background:var(--bg);overflow:hidden}
    .srv-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1.5rem}
    .srv-card{background:var(--glass);border:1px solid var(--glass-b);border-radius:22px;padding:2rem 1.7rem;position:relative;overflow:hidden;backdrop-filter:blur(16px) saturate(160%);transition:transform .4s cubic-bezier(.34,1.56,.64,1),box-shadow .35s,border-color .3s}
    .srv-card:hover{transform:perspective(900px) rotateX(-3deg) rotateY(3deg) translateZ(14px);box-shadow:0 20px 60px rgba(26,111,168,.45);border-color:rgba(75,163,224,.6)}
    .tl{position:absolute;inset:0;border-radius:inherit;pointer-events:none;opacity:0;transition:opacity .3s}
    .srv-icon{width:60px;height:60px;border-radius:15px;background:linear-gradient(135deg,rgba(26,111,168,.45),rgba(42,135,204,.2));border:1px solid rgba(75,163,224,.3);display:flex;align-items:center;justify-content:center;font-size:1.7rem;margin-bottom:1.3rem}
    .srv-card h3{font-size:1.05rem;font-weight:800;margin-bottom:.6rem}
    .srv-card p{font-size:.88rem;color:var(--text-m);line-height:1.75}
    .srv-tag{display:inline-block;margin-top:1rem;background:rgba(26,111,168,.2);border:1px solid rgba(75,163,224,.28);color:var(--blue-ll);padding:.2rem .7rem;border-radius:999px;font-size:.73rem;font-weight:600}
    #portfolio{background:var(--bg2);overflow:hidden}
    .port-filter{display:flex;gap:.6rem;flex-wrap:wrap;margin-bottom:2.5rem}
    .filter-btn{background:var(--glass);border:1px solid var(--glass-b);color:var(--text-m);padding:.4rem 1.1rem;border-radius:999px;font-family:inherit;font-size:.83rem;font-weight:600;cursor:pointer;transition:all .2s}
    .filter-btn.active,.filter-btn:hover{background:var(--blue);border-color:var(--blue-l);color:#fff}
    .port-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1.2rem}
    .port-item{border-radius:18px;overflow:hidden;position:relative;aspect-ratio:4/3;background:var(--glass);border:1px solid var(--glass-b);cursor:pointer;transition:transform .4s cubic-bezier(.34,1.56,.64,1),box-shadow .35s}
    .port-item:hover{transform:translateY(-8px) scale(1.02);box-shadow:0 20px 60px rgba(26,111,168,.45)}
    .port-inner{width:100%;height:100%;position:relative;overflow:hidden;background:linear-gradient(135deg,rgba(26,111,168,.25),rgba(15,66,102,.15))}
    .port-inner img{width:100%;height:100%;object-fit:cover;display:block;transition:transform .5s}
    .port-item:hover .port-inner img{transform:scale(1.08)}
    .port-overlay{position:absolute;inset:0;background:linear-gradient(180deg,transparent 30%,rgba(4,9,14,.96));display:flex;flex-direction:column;justify-content:flex-end;padding:1.2rem;opacity:0;transition:opacity .35s}
    .port-item:hover .port-overlay{opacity:1}
    .port-overlay h4{font-size:.93rem;font-weight:800;margin-bottom:.3rem}
    .port-overlay span{font-size:.75rem;color:var(--blue-ll)}
    #clients{background:var(--bg);overflow:hidden}
    .clients-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1.5rem}
    .client-card{background:rgba(255,255,255,0.07);border:1px solid var(--glass-b);border-radius:var(--radius);padding:1.4rem;display:flex;align-items:center;justify-content:center;gap:.8rem;backdrop-filter:blur(12px);transition:transform .3s,box-shadow .3s,border-color .3s}
    .client-card:hover{transform:translateY(-5px);box-shadow:var(--shadow);border-color:rgba(75,163,224,.5)}
    .client-card span{font-size:.9rem;font-weight:700;color:var(--text-m)}
    #why{background:var(--bg2);overflow:hidden}
    .why-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1.5rem}
    .why-card{background:var(--glass);border:1px solid var(--glass-b);border-radius:20px;padding:2.2rem 1.8rem;backdrop-filter:blur(14px);position:relative;overflow:hidden;transition:transform .4s cubic-bezier(.34,1.56,.64,1),box-shadow .35s}
    .why-card:hover{transform:translateY(-8px);box-shadow:0 20px 60px rgba(26,111,168,.4)}
    .why-card::before{content:'';position:absolute;top:0;inset-inline-start:0;width:100%;height:3px;background:linear-gradient(90deg,var(--blue-d),var(--blue),var(--cyan))}
    .why-icon{font-size:2.4rem;margin-bottom:1rem}
    .why-card h3{font-size:1.05rem;font-weight:800;margin-bottom:.7rem}
    .why-card p{font-size:.88rem;color:var(--text-m);line-height:1.75}
    #contact{background:var(--bg);overflow:hidden}
    .contact-grid{display:grid;grid-template-columns:1fr 1.2fr;gap:3rem;align-items:start}
    .cinfo{display:flex;flex-direction:column;gap:1.1rem}
    .cc{display:flex;align-items:center;gap:1rem;background:var(--glass);border:1px solid var(--glass-b);border-radius:var(--radius);padding:1.2rem 1.4rem;backdrop-filter:blur(14px);transition:transform .3s,border-color .3s,box-shadow .3s;position:relative;overflow:hidden}
    a.cc:hover{transform:translateX(-6px);border-color:rgba(75,163,224,.6);box-shadow:var(--shadow)}
    .cc-icon{width:46px;height:46px;border-radius:12px;flex-shrink:0;background:linear-gradient(135deg,var(--blue-d),var(--blue));display:flex;align-items:center;justify-content:center;font-size:1.2rem}
    .cc strong{display:block;font-size:.82rem;color:var(--text-m);margin-bottom:.15rem}
    .cc span{font-size:.93rem;font-weight:600}
    .social-row{display:flex;gap:.7rem;flex-wrap:wrap;margin-top:.5rem}
    .soc-btn{background:var(--glass);border:1px solid var(--glass-b);color:var(--text-m);padding:.4rem 1rem;border-radius:10px;font-size:.82rem;font-weight:700;transition:all .2s;display:flex;align-items:center;gap:.4rem}
    .soc-btn:hover{background:var(--blue);color:#fff;border-color:var(--blue-l)}
    .cform{background:var(--glass);border:1px solid var(--glass-b);border-radius:22px;padding:2rem;backdrop-filter:blur(18px)}
    .cform h3{font-size:1.2rem;font-weight:800;margin-bottom:1.4rem}
    .fg{margin-bottom:1rem}
    .fg label{display:block;font-size:.82rem;font-weight:600;color:var(--text-m);margin-bottom:.4rem}
    .fg input,.fg textarea,.fg select{width:100%;padding:.75rem 1rem;border-radius:10px;background:rgba(4,9,14,.75);border:1px solid rgba(75,163,224,.28);color:var(--text);font-family:inherit;font-size:.9rem;transition:border-color .25s,box-shadow .25s;outline:none;resize:vertical}
    .fg input:focus,.fg textarea:focus,.fg select:focus{border-color:var(--blue-ll);box-shadow:0 0 0 3px rgba(75,163,224,.2)}
    .fg textarea{min-height:110px}
    .frow{display:grid;grid-template-columns:1fr 1fr;gap:1rem}
    .btn-sub{width:100%;background:linear-gradient(135deg,var(--blue-d),var(--blue));color:#fff;padding:.85rem;border-radius:12px;font-size:.95rem;font-weight:700;font-family:inherit;border:none;cursor:pointer;box-shadow:0 4px 24px rgba(26,111,168,.5);transition:transform .25s,box-shadow .25s}
    .btn-sub:hover{transform:translateY(-2px);box-shadow:0 8px 36px rgba(26,111,168,.7)}
    footer{background:var(--bg);border-top:1px solid rgba(75,163,224,.18);padding:2.5rem clamp(1rem,4vw,3rem)}
    .foot-inner{max-width:1200px;margin:0 auto}
    .foot-top{display:flex;justify-content:space-between;align-items:center;gap:2rem;flex-wrap:wrap;margin-bottom:1.5rem;padding-bottom:1.5rem;border-bottom:1px solid rgba(75,163,224,.12)}
    .foot-brand{display:flex;align-items:center;gap:.75rem}
    .foot-brand img{width:38px;height:38px;object-fit:contain}
    .foot-brand div span:first-child{display:block;font-size:.95rem;font-weight:900;color:var(--blue-ll)}
    .foot-brand div span:last-child{display:block;font-size:.72rem;color:var(--text-m)}
    .foot-links{display:flex;gap:1.5rem;flex-wrap:wrap}
    .foot-links a{color:var(--text-m);font-size:.83rem;transition:color .2s}
    .foot-links a:hover{color:var(--blue-ll)}
    .foot-bottom{display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:1rem}
    .foot-bottom p{color:var(--text-d);font-size:.8rem}
    .foot-soc{display:flex;gap:.6rem}
    .foot-soc a{width:34px;height:34px;border-radius:8px;background:var(--glass);border:1px solid var(--glass-b);display:flex;align-items:center;justify-content:center;font-size:.85rem;transition:background .2s,border-color .2s}
    .foot-soc a:hover{background:var(--blue);border-color:var(--blue-l)}
    .reveal{opacity:0;transform:translateY(40px);transition:opacity .7s,transform .7s cubic-bezier(.16,1,.3,1)}
    .reveal.visible{opacity:1;transform:translateY(0)}
    .ss{position:fixed;width:2px;height:2px;border-radius:50%;background:rgba(75,163,224,.9);pointer-events:none;z-index:1;animation:shoot linear infinite both}
    .ss::after{content:'';position:absolute;top:0;right:0;width:80px;height:1px;transform-origin:right center;background:linear-gradient(to left,rgba(75,163,224,.7),transparent)}
    @keyframes shoot{0%{opacity:0;transform:rotate(var(--a)) translate(0,0)}5%{opacity:1}100%{opacity:0;transform:rotate(var(--a)) translate(var(--dx),var(--dy))}}
    .lang-en{display:none}
    html[lang="en"] .lang-ar{display:none}
    html[lang="en"] .lang-en{display:block}
    html[lang="en"] .lang-en-i{display:inline}
    html[lang="ar"] .lang-ar-i{display:inline}
    .lang-en-i{display:none}.lang-ar-i{display:inline}
    html[lang="en"] body{font-family:'Inter',sans-serif}
    @media(max-width:1024px){.srv-grid{grid-template-columns:repeat(2,1fr)}.why-grid{grid-template-columns:repeat(2,1fr)}.clients-grid{grid-template-columns:repeat(3,1fr)}.stats-row{grid-template-columns:repeat(2,1fr)}}
    @media(max-width:768px){.hero-inner{flex-direction:column;text-align:center;padding:3rem 0 4rem}.hero-sub{margin-inline:auto}.hero-actions{justify-content:center}.hero-stats{justify-content:center}.hero-visual{flex:none}.about-grid,.contact-grid{grid-template-columns:1fr}.about-visual{display:none}.srv-grid,.why-grid,.port-grid{grid-template-columns:1fr}.clients-grid{grid-template-columns:repeat(2,1fr)}.nav-links{display:none;flex-direction:column;position:fixed;inset:72px 0 0;background:rgba(4,9,14,.97);backdrop-filter:blur(20px);padding:1.5rem;z-index:800;gap:.4rem;overflow-y:auto}.nav-links.open{display:flex}.hamburger{display:flex}.frow{grid-template-columns:1fr}.foot-top{flex-direction:column;align-items:flex-start}.drop-menu{position:static;opacity:1;pointer-events:all;transform:none;box-shadow:none;background:rgba(26,111,168,.08);margin-top:.3rem;border-radius:10px}}
  </style>
</head>
<body>
  <div id="prog"></div>
  <div class="c-dot" id="cdot"></div>
  <div class="c-ring" id="cring"></div>

  <nav id="nav">
    <div class="nav-inner">
      <a href="{{ route('home') }}" class="nav-logo">
        <img src="/logo.png" alt="{{ $settings['site_name_ar'] ?? 'Dinosaur Media' }}" />
        <div class="nav-logo-text">
          <span>{{ $settings['site_name_ar'] ?? 'ديناصور ميديا' }}</span>
          <span>{{ $settings['site_name_en'] ?? 'Dinosaur Media' }} · منذ {{ $settings['founded_year'] ?? '2016' }}</span>
        </div>
      </a>
      <ul class="nav-links" id="nav-links">
        <li><a href="{{ route('about') }}"><span class="lang-ar">من نحن</span><span class="lang-en">About</span></a></li>
        <li class="has-drop">
          <a href="#services" class="drop-tog"><span class="lang-ar">خدماتنا</span><span class="lang-en">Services</span></a>
          <div class="drop-menu">
            @foreach($services as $srv)
            <a href="{{ $srv->link ? route('service', $srv->link) : '#services' }}">
              {{ $srv->icon }} <span class="lang-ar">{{ $srv->title_ar }}</span><span class="lang-en">{{ $srv->title_en }}</span>
            </a>
            @endforeach
          </div>
        </li>
        <li><a href="#portfolio"><span class="lang-ar">أعمالنا</span><span class="lang-en">Portfolio</span></a></li>
        <li><a href="#clients"><span class="lang-ar">عملاؤنا</span><span class="lang-en">Clients</span></a></li>
        <li><a href="{{ route('contact') }}" class="nav-cta"><span class="lang-ar">تواصل معنا</span><span class="lang-en">Contact</span></a></li>
      </ul>
      <div style="display:flex;align-items:center;gap:.75rem">
        <button class="lang-btn" id="lang-btn">EN</button>
        <button class="hamburger" id="hbg"><span></span><span></span><span></span></button>
      </div>
    </div>
  </nav>

  <!-- Hero -->
  <section id="hero">
    <canvas id="hero-canvas"></canvas>
    <div class="hero-overlay"></div>
    <div class="ab ab1"></div><div class="ab ab2"></div>
    <div class="hero-inner">
      <div class="hero-text">
        <div class="hero-badge">
          <span class="lang-ar">{{ $settings['hero_badge_ar'] ?? 'وكالة إبداعية رائدة · الخليل، فلسطين · منذ 2016' }}</span>
          <span class="lang-en">{{ $settings['hero_badge_en'] ?? 'Leading Creative Agency · Hebron, Palestine · Since 2016' }}</span>
        </div>
        <h1 class="hero-name">
          <span class="b1 lang-ar">{{ $settings['site_name_ar'] ?? 'ديناصور ميديا' }}</span>
          <span class="b1 lang-en">{{ $settings['site_name_en'] ?? 'Dinosaur Media' }}</span><br/>
          <span class="lang-ar">{{ $settings['site_tagline_ar'] ?? 'نُطوّر أعمالكم رقمياً' }}</span>
          <span class="lang-en">{{ $settings['site_tagline_en'] ?? 'We Digitally Elevate Your Business' }}</span>
        </h1>
        <p class="hero-typed" id="hero-typed"><span class="typed-cursor"></span></p>
        <p class="hero-sub">
          <span class="lang-ar">{{ $settings['about_ar'] ?? '' }}</span>
          <span class="lang-en">{{ $settings['about_en'] ?? '' }}</span>
        </p>
        <div class="hero-actions">
          <a href="#services" class="btn btn-primary"><span class="lang-ar">اكتشف خدماتنا ←</span><span class="lang-en">Explore Services →</span></a>
          <a href="#portfolio" class="btn btn-outline"><span class="lang-ar">شاهد أعمالنا</span><span class="lang-en">View Our Work</span></a>
        </div>
        <div class="hero-stats">
          <div class="hst"><span class="hst-n" data-target="{{ $settings['experience_years'] ?? 8 }}" data-suffix="+">0</span><span class="hst-l"><span class="lang-ar">سنوات خبرة</span><span class="lang-en">Years Experience</span></span></div>
          <div class="hst"><span class="hst-n" data-target="{{ $settings['projects_count'] ?? 200 }}" data-suffix="+">0</span><span class="hst-l"><span class="lang-ar">مشروع منجز</span><span class="lang-en">Projects Done</span></span></div>
          <div class="hst"><span class="hst-n" data-target="{{ $settings['clients_count'] ?? 100 }}" data-suffix="+">0</span><span class="hst-l"><span class="lang-ar">عميل راضٍ</span><span class="lang-en">Happy Clients</span></span></div>
          <div class="hst"><span class="hst-n" data-target="{{ $settings['services_count'] ?? 5 }}">0</span><span class="hst-l"><span class="lang-ar">خدمات متخصصة</span><span class="lang-en">Specialized Services</span></span></div>
        </div>
      </div>
      <div class="hero-visual">
        <div class="hero-ring"><img src="/logo.png" alt="Dinosaur Media" style="width:160px;height:160px;object-fit:contain;filter:drop-shadow(0 0 20px rgba(75,163,224,.5));"/></div>
        @foreach($services->take(3) as $i => $srv)
        <div class="ftag ftag-{{ $i+1 }}">{{ $srv->icon }} <span class="lang-ar">{{ $srv->title_ar }}</span><span class="lang-en">{{ $srv->title_en }}</span></div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- About -->
  <section id="about">
    <div class="ab ab1"></div>
    <div class="container">
      <div class="about-grid">
        <div class="about-text reveal">
          <span class="sec-tag"><span class="lang-ar">من نحن</span><span class="lang-en">About Us</span></span>
          <h2 class="sec-title"><span class="lang-ar">إبداع بأداء استثنائي</span><span class="lang-en">Creativity with Exceptional Performance</span></h2>
          <p><span class="lang-ar">{{ $settings['about_ar'] ?? '' }}</span><span class="lang-en">{{ $settings['about_en'] ?? '' }}</span></p>
          <div class="stats-row">
            <div class="scard reveal"><span class="n">{{ $settings['founded_year'] ?? '2016' }}</span><span class="l"><span class="lang-ar">سنة التأسيس</span><span class="lang-en">Founded</span></span></div>
            <div class="scard reveal"><span class="n" data-target="{{ $settings['projects_count'] ?? 200 }}" data-suffix="+">0</span><span class="l"><span class="lang-ar">مشروع منجز</span><span class="lang-en">Projects Done</span></span></div>
            <div class="scard reveal"><span class="n" data-target="{{ $settings['clients_count'] ?? 100 }}" data-suffix="+">0</span><span class="l"><span class="lang-ar">عميل راضٍ</span><span class="lang-en">Happy Clients</span></span></div>
            <div class="scard reveal"><span class="n" data-target="{{ $settings['services_count'] ?? 5 }}">0</span><span class="l"><span class="lang-ar">خدمات متخصصة</span><span class="lang-en">Services</span></span></div>
          </div>
        </div>
        <div class="about-visual reveal">
          <div class="acard-big">
            <img src="/logo.png" alt="Dinosaur Media" style="width:110px;height:110px;object-fit:contain;"/>
            <h3>{{ $settings['site_name_en'] ?? 'Dinosaur Media' }}</h3>
            <p><span class="lang-ar">وكالة إبداعية متخصصة في تطوير الأعمال الرقمية</span><span class="lang-en">Creative agency for digital business development</span></p>
            <span class="since"><span class="lang-ar">منذ {{ $settings['founded_year'] ?? '2016' }} · الخليل، فلسطين</span><span class="lang-en">Since {{ $settings['founded_year'] ?? '2016' }} · Hebron, Palestine</span></span>
          </div>
          <div class="fbadge fb1">⭐ <span class="lang-ar">جودة استثنائية</span><span class="lang-en">Exceptional Quality</span></div>
          <div class="fbadge fb2">🚀 <span class="lang-ar">دعم غير محدود</span><span class="lang-en">Unlimited Support</span></div>
        </div>
      </div>
    </div>
  </section>

  <!-- Services -->
  <section id="services">
    <div class="ab ab2"></div>
    <div class="container">
      <div class="center" style="margin-bottom:3rem">
        <span class="sec-tag"><span class="lang-ar">ما نقدمه</span><span class="lang-en">What We Offer</span></span>
        <h2 class="sec-title"><span class="lang-ar">خدماتنا المتخصصة</span><span class="lang-en">Our Specialized Services</span></h2>
      </div>
      <div class="srv-grid">
        @foreach($services as $srv)
        <a href="{{ $srv->link ? route('service', $srv->link) : '#' }}" class="srv-card reveal" style="text-decoration:none">
          <div class="tl"></div>
          <div class="srv-icon">{{ $srv->icon }}</div>
          <h3><span class="lang-ar">{{ $srv->title_ar }}</span><span class="lang-en">{{ $srv->title_en }}</span></h3>
          <p><span class="lang-ar">{{ $srv->description_ar }}</span><span class="lang-en">{{ $srv->description_en }}</span></p>
          @if($srv->tag)<span class="srv-tag">{{ $srv->tag }}</span>@endif
        </a>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Portfolio -->
  <section id="portfolio">
    <div class="ab ab3"></div>
    <div class="container">
      <div class="center" style="margin-bottom:2rem">
        <span class="sec-tag"><span class="lang-ar">معرض الأعمال</span><span class="lang-en">Our Portfolio</span></span>
        <h2 class="sec-title"><span class="lang-ar">أعمال نفخر بها</span><span class="lang-en">Work We're Proud Of</span></h2>
      </div>
      <div class="port-filter">
        <button class="filter-btn active" data-filter="all"><span class="lang-ar">الكل</span><span class="lang-en">All</span></button>
        <button class="filter-btn" data-filter="identity"><span class="lang-ar">هوية بصرية</span><span class="lang-en">Visual Identity</span></button>
        <button class="filter-btn" data-filter="social"><span class="lang-ar">سوشيال ميديا</span><span class="lang-en">Social Media</span></button>
        <button class="filter-btn" data-filter="photo"><span class="lang-ar">تصوير</span><span class="lang-en">Photography</span></button>
      </div>
      <div class="port-grid" id="port-grid">
        @foreach($portfolio as $item)
        <div class="port-item reveal" data-cat="{{ $item->category }}">
          <div class="port-inner">
            @if($item->image)
              @if(str_starts_with($item->image, 'portfolio/'))
                <img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->title_ar }}" loading="lazy"/>
              @else
                <img src="{{ asset($item->image) }}" alt="{{ $item->title_ar }}" loading="lazy"/>
              @endif
            @endif
          </div>
          <div class="port-overlay">
            <h4><span class="lang-ar">{{ $item->title_ar }}</span><span class="lang-en">{{ $item->title_en }}</span></h4>
            <span><span class="lang-ar">{{ $item->subtitle_ar }}</span><span class="lang-en">{{ $item->subtitle_en }}</span></span>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Clients -->
  <section id="clients">
    <div class="ab ab1"></div>
    <div class="container">
      <div class="center" style="margin-bottom:2.5rem">
        <span class="sec-tag"><span class="lang-ar">ثقتهم شرف لنا</span><span class="lang-en">Their Trust is Our Honor</span></span>
        <h2 class="sec-title"><span class="lang-ar">عملاؤنا</span><span class="lang-en">Our Clients</span></h2>
      </div>
      <div class="clients-grid">
        @foreach($clients as $client)
        <div class="client-card reveal">
          @if($client->logo)
            @if(str_starts_with($client->logo, 'clients/'))
              <img src="{{ asset('storage/'.$client->logo) }}" alt="{{ $client->name_ar }}" style="height:55px;object-fit:contain;max-width:130px;" loading="lazy"/>
            @else
              <img src="{{ asset($client->logo) }}" alt="{{ $client->name_ar }}" style="height:55px;object-fit:contain;max-width:130px;" loading="lazy"/>
            @endif
          @endif
          <span><span class="lang-ar">{{ $client->name_ar }}</span><span class="lang-en">{{ $client->name_en }}</span></span>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Why Us -->
  <section id="why">
    <div class="ab ab2"></div>
    <div class="container">
      <div class="center" style="margin-bottom:3rem">
        <span class="sec-tag"><span class="lang-ar">مميزاتنا</span><span class="lang-en">Why Choose Us</span></span>
        <h2 class="sec-title"><span class="lang-ar">لماذا تختار ديناصور ميديا؟</span><span class="lang-en">Why Choose Dinosaur Media?</span></h2>
      </div>
      <div class="why-grid">
        @foreach($why as $w)
        <div class="why-card reveal">
          <div class="why-icon">{{ $w->icon }}</div>
          <h3><span class="lang-ar">{{ $w->title_ar }}</span><span class="lang-en">{{ $w->title_en }}</span></h3>
          <p><span class="lang-ar">{{ $w->description_ar }}</span><span class="lang-en">{{ $w->description_en }}</span></p>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Contact -->
  <section id="contact">
    <div class="ab ab3"></div>
    <div class="container">
      <div class="center" style="margin-bottom:3rem">
        <span class="sec-tag"><span class="lang-ar">ابدأ معنا</span><span class="lang-en">Start With Us</span></span>
        <h2 class="sec-title"><span class="lang-ar">تواصل مع فريقنا</span><span class="lang-en">Contact Our Team</span></h2>
      </div>
      <div class="contact-grid">
        <div class="cinfo">
          @if($settings['whatsapp'] ?? null)
          <a href="https://wa.me/{{ $settings['whatsapp'] }}" target="_blank" rel="noopener" class="cc reveal">
            <div class="tl"></div><div class="cc-icon">📱</div>
            <div><strong><span class="lang-ar">واتساب</span><span class="lang-en">WhatsApp</span></strong><span>{{ $settings['phone'] ?? '' }}</span></div>
          </a>
          @endif
          @if($settings['email'] ?? null)
          <a href="mailto:{{ $settings['email'] }}" class="cc reveal">
            <div class="tl"></div><div class="cc-icon">✉️</div>
            <div><strong><span class="lang-ar">البريد الإلكتروني</span><span class="lang-en">Email</span></strong><span>{{ $settings['email'] }}</span></div>
          </a>
          @endif
          <div class="cc reveal" style="cursor:default">
            <div class="cc-icon">📍</div>
            <div><strong><span class="lang-ar">العنوان</span><span class="lang-en">Address</span></strong>
              <span><span class="lang-ar">{{ $settings['address_ar'] ?? '' }}</span><span class="lang-en">{{ $settings['address_en'] ?? '' }}</span></span>
            </div>
          </div>
          <div class="cc reveal" style="cursor:default;flex-direction:column;align-items:flex-start;gap:1rem">
            <div style="display:flex;align-items:center;gap:1rem"><div class="cc-icon">🌐</div><strong><span class="lang-ar">تابعنا على</span><span class="lang-en">Follow Us</span></strong></div>
            <div class="social-row">
              @if($settings['facebook'] ?? null)<a href="{{ $settings['facebook'] }}" target="_blank" rel="noopener" class="soc-btn">📘 Facebook</a>@endif
              @if($settings['instagram'] ?? null)<a href="{{ $settings['instagram'] }}" target="_blank" rel="noopener" class="soc-btn">📷 Instagram</a>@endif
              @if($settings['linkedin'] ?? null)<a href="{{ $settings['linkedin'] }}" target="_blank" rel="noopener" class="soc-btn">💼 LinkedIn</a>@endif
              @if($settings['behance'] ?? null)<a href="{{ $settings['behance'] }}" target="_blank" rel="noopener" class="soc-btn">🎨 Behance</a>@endif
            </div>
          </div>
        </div>
        <div class="cform reveal">
          <h3><span class="lang-ar">أرسل لنا رسالة 💬</span><span class="lang-en">Send Us a Message 💬</span></h3>
          <form id="contact-form">
            @csrf
            <div class="frow">
              <div class="fg"><label><span class="lang-ar">الاسم الكامل</span><span class="lang-en">Full Name</span></label><input type="text" name="name" required /></div>
              <div class="fg"><label><span class="lang-ar">رقم الهاتف</span><span class="lang-en">Phone</span></label><input type="tel" name="phone" /></div>
            </div>
            <div class="fg"><label><span class="lang-ar">البريد الإلكتروني</span><span class="lang-en">Email</span></label><input type="email" name="email" /></div>
            <div class="fg">
              <label><span class="lang-ar">الخدمة المطلوبة</span><span class="lang-en">Service Required</span></label>
              <select name="service">
                <option value=""><span class="lang-ar">اختر الخدمة...</span><span class="lang-en">Select service...</span></option>
                @foreach($services as $srv)
                <option value="{{ $srv->link ?? strtolower($srv->title_en) }}">{{ $srv->icon }} {{ $srv->title_ar }}</option>
                @endforeach
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
    <div class="foot-inner">
      <div class="foot-top">
        <div class="foot-brand">
          <img src="/logo.png" alt="Dinosaur Media"/>
          <div>
            <span>{{ $settings['site_name_ar'] ?? 'ديناصور ميديا' }}</span>
            <span>{{ $settings['site_name_en'] ?? 'Dinosaur Media' }} — خدمات تطوير الأعمال</span>
          </div>
        </div>
        <div class="foot-links">
          <a href="#about"><span class="lang-ar">من نحن</span><span class="lang-en">About</span></a>
          <a href="#services"><span class="lang-ar">خدماتنا</span><span class="lang-en">Services</span></a>
          <a href="#portfolio"><span class="lang-ar">أعمالنا</span><span class="lang-en">Portfolio</span></a>
          <a href="#clients"><span class="lang-ar">عملاؤنا</span><span class="lang-en">Clients</span></a>
          <a href="{{ route('contact') }}"><span class="lang-ar">تواصل معنا</span><span class="lang-en">Contact</span></a>
        </div>
      </div>
      <div class="foot-bottom">
        <p>© {{ date('Y') }} {{ $settings['site_name_ar'] ?? 'ديناصور ميديا' }} · الخليل، فلسطين · جميع الحقوق محفوظة</p>
        <div class="foot-soc">
          @if($settings['facebook'] ?? null)<a href="{{ $settings['facebook'] }}" target="_blank" rel="noopener">📘</a>@endif
          @if($settings['instagram'] ?? null)<a href="{{ $settings['instagram'] }}" target="_blank" rel="noopener">📷</a>@endif
          @if($settings['linkedin'] ?? null)<a href="{{ $settings['linkedin'] }}" target="_blank" rel="noopener">💼</a>@endif
          @if($settings['behance'] ?? null)<a href="{{ $settings['behance'] }}" target="_blank" rel="noopener">🎨</a>@endif
          @if($settings['whatsapp'] ?? null)<a href="https://wa.me/{{ $settings['whatsapp'] }}" target="_blank" rel="noopener">📱</a>@endif
        </div>
      </div>
    </div>
  </footer>

  <script>
  // Language
  let currentLang=localStorage.getItem('dino-lang')||'ar';
  function setLang(lang){currentLang=lang;document.documentElement.lang=lang;document.documentElement.dir=lang==='ar'?'rtl':'ltr';const btn=document.getElementById('lang-btn');if(btn)btn.textContent=lang==='ar'?'EN':'AR';localStorage.setItem('dino-lang',lang);}
  document.getElementById('lang-btn').addEventListener('click',()=>setLang(currentLang==='ar'?'en':'ar'));
  setLang(currentLang);
  // Scroll Progress
  const prog=document.getElementById('prog');
  window.addEventListener('scroll',()=>{prog.style.transform='scaleX('+(scrollY/(document.documentElement.scrollHeight-innerHeight))+')';},{passive:true});
  // Navbar
  const nav=document.getElementById('nav');
  window.addEventListener('scroll',()=>nav.classList.toggle('scrolled',scrollY>30),{passive:true});
  // Mobile menu
  const ham=document.getElementById('hbg'),nls=document.getElementById('nav-links');
  if(ham&&nls){ham.addEventListener('click',()=>nls.classList.toggle('open'));nls.querySelectorAll('a:not(.drop-tog)').forEach(l=>l.addEventListener('click',()=>nls.classList.remove('open')));}
  // Cursor
  (function(){if(!window.matchMedia('(hover:hover)').matches)return;const dot=document.getElementById('cdot'),ring=document.getElementById('cring');let mx=0,my=0,rx=0,ry=0;document.addEventListener('mousemove',e=>{mx=e.clientX;my=e.clientY;dot.style.left=mx+'px';dot.style.top=my+'px';});document.querySelectorAll('a,button,.srv-card,.port-item,.client-card,.why-card,.scard').forEach(el=>{el.addEventListener('mouseenter',()=>ring.classList.add('expand'));el.addEventListener('mouseleave',()=>ring.classList.remove('expand'));});(function loop(){rx+=(mx-rx)*.11;ry+=(my-ry)*.11;ring.style.left=rx+'px';ring.style.top=ry+'px';requestAnimationFrame(loop);})();})();
  // Shooting Stars
  for(let i=0;i<5;i++){const s=document.createElement('div');s.className='ss';Object.assign(s.style,{top:Math.random()*65+'%',left:Math.random()*70+'%','--a':(20+Math.random()*30)+'deg','--dx':(350+Math.random()*400)+'px','--dy':(150+Math.random()*300)+'px',animationDuration:(6+Math.random()*8)+'s',animationDelay:(Math.random()*15)+'s'});document.body.appendChild(s);}
  // Typing
  (function(){const el=document.getElementById('hero-typed');if(!el)return;const rolesAr=['هوية بصرية تُميّزكم','مواقع تبهر زوّاركم','محتوى يصنع الفارق','إعلانات تُحقق النتائج','تصوير يبيع المنتجات'];const rolesEn=['Visual Identity that Stands Out','Websites that Impress','Content that Makes a Difference','Ads that Get Results','Photography that Sells'];const cur=el.querySelector('.typed-cursor')||document.createElement('span');cur.className='typed-cursor';let ri=0,ci=0,del=false;function getRoles(){return currentLang==='en'?rolesEn:rolesAr;}function tick(){const w=getRoles()[ri];if(del){ci--;el.textContent=w.slice(0,ci);el.appendChild(cur);if(ci===0){del=false;ri=(ri+1)%rolesAr.length;setTimeout(tick,400);}else setTimeout(tick,40);}else{ci++;el.textContent=w.slice(0,ci);el.appendChild(cur);if(ci===w.length)setTimeout(()=>{del=true;tick();},2500);else setTimeout(tick,80);}}el.textContent='';el.appendChild(cur);setTimeout(tick,1200);})();
  // Three.js
  (function(){if(!window.THREE)return;const canvas=document.getElementById('hero-canvas');const isMob=innerWidth<768;const renderer=new THREE.WebGLRenderer({canvas,alpha:true,antialias:!isMob});renderer.setPixelRatio(Math.min(devicePixelRatio,2));renderer.setSize(innerWidth,innerHeight);const scene=new THREE.Scene();const cam=new THREE.PerspectiveCamera(60,innerWidth/innerHeight,0.1,100);cam.position.set(0,6,10);cam.lookAt(0,0,0);const GW=isMob?25:45,GH=isMob?18:32,COUNT=GW*GH;const pGeo=new THREE.BufferGeometry();const positions=new Float32Array(COUNT*3);const baseX=new Float32Array(COUNT),baseZ=new Float32Array(COUNT);for(let i=0;i<GH;i++)for(let j=0;j<GW;j++){const idx=i*GW+j;baseX[idx]=(j/(GW-1)-.5)*22;baseZ[idx]=(i/(GH-1)-.5)*16;positions[idx*3]=baseX[idx];positions[idx*3+1]=0;positions[idx*3+2]=baseZ[idx];}pGeo.setAttribute('position',new THREE.BufferAttribute(positions,3));const pMat=new THREE.PointsMaterial({color:0x4BA3E0,size:isMob?.12:.09,transparent:true,opacity:.85,sizeAttenuation:true});scene.add(new THREE.Points(pGeo,pMat));const linesH=[],linesV=[];for(let i=0;i<GH;i++)for(let j=0;j<GW-1;j++)linesH.push(i*GW+j,i*GW+j+1);for(let i=0;i<GH-1;i++)for(let j=0;j<GW;j++)linesV.push(i*GW+j,(i+1)*GW+j);const allLines=[...linesH,...linesV];const lGeo=new THREE.BufferGeometry();const lPos=new Float32Array(allLines.length*3);lGeo.setAttribute('position',new THREE.BufferAttribute(lPos,3));const lMat=new THREE.LineBasicMaterial({color:0x1A6FA8,transparent:true,opacity:.28});scene.add(new THREE.LineSegments(lGeo,lMat));const mkW=(g,c,op,x,y,z)=>{const m=new THREE.Mesh(g,new THREE.MeshBasicMaterial({color:c,wireframe:true,transparent:true,opacity:op}));m.position.set(x,y,z);scene.add(m);return m;};const ico=mkW(new THREE.IcosahedronGeometry(1.2,1),0x4BA3E0,0.18,-6,3,-3);const torus=mkW(new THREE.TorusKnotGeometry(.7,.18,70,10),0x7EC8F5,0.12,6,3.5,-2);const oct=mkW(new THREE.OctahedronGeometry(1.0),0x2A87CC,0.15,0,5,-5);const sfGeo=new THREE.BufferGeometry(),sfPos=new Float32Array(400*3);for(let i=0;i<400;i++){sfPos[i*3]=(Math.random()-.5)*50;sfPos[i*3+1]=(Math.random()-.5)*30+5;sfPos[i*3+2]=(Math.random()-.5)*40-5;}sfGeo.setAttribute('position',new THREE.BufferAttribute(sfPos,3));scene.add(new THREE.Points(sfGeo,new THREE.PointsMaterial({color:0x7EC8F5,size:.05,transparent:true,opacity:.4,sizeAttenuation:true})));let mx=0,my=0,cx=0,cy=0,t=0;document.addEventListener('mousemove',e=>{mx=(e.clientX/innerWidth-.5)*2;my=-(e.clientY/innerHeight-.5)*2;});window.addEventListener('resize',()=>{renderer.setSize(innerWidth,innerHeight);cam.aspect=innerWidth/innerHeight;cam.updateProjectionMatrix();});window.addEventListener('scroll',()=>{canvas.style.opacity=String(1-Math.min(scrollY/innerHeight,1)*.75);},{passive:true});(function animate(){requestAnimationFrame(animate);t+=0.012;for(let i=0;i<COUNT;i++){const x=baseX[i],z=baseZ[i];positions[i*3+1]=Math.sin(t+x*.45)*Math.cos(t*.7+z*.35)*1.8+Math.sin(t*1.3+z*.3)*0.5;}pGeo.attributes.position.needsUpdate=true;for(let k=0;k<allLines.length;k++){const idx=allLines[k];lPos[k*3]=positions[idx*3];lPos[k*3+1]=positions[idx*3+1];lPos[k*3+2]=positions[idx*3+2];}lGeo.attributes.position.needsUpdate=true;ico.rotation.x+=.006;ico.rotation.y+=.009;torus.rotation.x+=.005;torus.rotation.y+=.004;oct.rotation.x-=.007;oct.rotation.z+=.005;ico.position.y=3+Math.sin(t*.8)*0.4;torus.position.y=3.5+Math.sin(t*.6+1)*0.5;oct.position.y=5+Math.sin(t*.5+2)*0.35;cx+=(mx-cx)*.03;cy+=(my-cy)*.03;cam.position.x=cx*1.5;cam.position.y=6+cy*1.2;cam.lookAt(cx*.3,cy*.3,0);renderer.render(scene,cam);})();})();
  // 3D Tilt
  document.querySelectorAll('.srv-card,.port-item,.why-card,.client-card').forEach(card=>{const light=card.querySelector('.tl');card.addEventListener('mousemove',e=>{const r=card.getBoundingClientRect(),x=e.clientX-r.left,y=e.clientY-r.top;const rx=((y-r.height/2)/r.height)*-10,ry=((x-r.width/2)/r.width)*10;card.style.transition='none';card.style.transform=`perspective(900px) rotateX(${rx}deg) rotateY(${ry}deg) translateZ(14px)`;if(light){light.style.background=`radial-gradient(circle at ${(x/r.width*100).toFixed(1)}% ${(y/r.height*100).toFixed(1)}%,rgba(26,111,168,0.3) 0%,transparent 65%)`;light.style.opacity='1';}});card.addEventListener('mouseleave',()=>{card.style.transition='transform .6s cubic-bezier(.34,1.56,.64,1),border-color .35s,box-shadow .35s';card.style.transform='perspective(900px) rotateX(0) rotateY(0) translateZ(0)';if(light)light.style.opacity='0';});});
  // Counters
  function animCnt(el,target,suffix=''){const dur=1600,start=performance.now();(function tick(now){const t=Math.min((now-start)/dur,1);el.textContent=Math.round((1-Math.pow(1-t,3))*target)+suffix;if(t<1)requestAnimationFrame(tick);})(start);}
  const rObs=new IntersectionObserver(es=>{es.forEach(e=>{if(e.isIntersecting){e.target.classList.add('visible');rObs.unobserve(e.target);}});},{threshold:.1});
  document.querySelectorAll('.reveal').forEach(el=>rObs.observe(el));
  const cObs=new IntersectionObserver(es=>{es.forEach(e=>{if(!e.isIntersecting)return;animCnt(e.target,parseInt(e.target.dataset.target),e.target.dataset.suffix||'');cObs.unobserve(e.target);});},{threshold:.6});
  document.querySelectorAll('[data-target]').forEach(el=>cObs.observe(el));
  // Portfolio Filter
  document.querySelectorAll('.filter-btn').forEach(btn=>{btn.addEventListener('click',()=>{document.querySelectorAll('.filter-btn').forEach(b=>b.classList.remove('active'));btn.classList.add('active');const cat=btn.dataset.filter;document.querySelectorAll('.port-item').forEach(item=>{const show=cat==='all'||item.dataset.cat===cat;item.style.display=show?'':'none';if(show)setTimeout(()=>item.classList.add('visible'),50);});});});
  // Contact Form (AJAX)
  const form=document.getElementById('contact-form');
  if(form)form.addEventListener('submit',async e=>{
    e.preventDefault();
    const btn=form.querySelector('.btn-sub');
    btn.disabled=true;
    try{
      const res=await fetch('{{ route("contact.store") }}',{method:'POST',headers:{'X-CSRF-TOKEN':'{{ csrf_token() }}','Accept':'application/json'},body:new FormData(form)});
      if(res.ok){btn.innerHTML='✓ تم الإرسال';btn.style.background='linear-gradient(135deg,#059669,#10b981)';form.reset();setLang(currentLang);setTimeout(()=>{btn.innerHTML='<span class="lang-ar">إرسال الرسالة ✉️</span><span class="lang-en">Send Message ✉️</span>';btn.style.background='';btn.disabled=false;},3000);}
    }catch(err){btn.disabled=false;}
  });
  </script>
</body>
</html>
