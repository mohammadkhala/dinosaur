@extends('layouts.admin')
@section('title','الإعدادات')
@section('page-title','⚙️ إعدادات الموقع')
@section('content')
<form method="POST" action="{{ route('admin.settings.update') }}">
  @csrf @method('POST')

  @php
  $groups = [
    'general' => ['label'=>'🌐 عام', 'keys'=>['site_name_ar','site_name_en','site_tagline_ar','site_tagline_en','founded_year']],
    'hero'    => ['label'=>'🦸 Hero', 'keys'=>['hero_badge_ar','hero_badge_en']],
    'about'   => ['label'=>'📖 من نحن', 'keys'=>['about_ar','about_en']],
    'stats'   => ['label'=>'📊 إحصائيات', 'keys'=>['projects_count','clients_count','experience_years','services_count']],
    'contact' => ['label'=>'📞 التواصل', 'keys'=>['phone','whatsapp','email','address_ar','address_en']],
    'social'  => ['label'=>'🔗 السوشيال ميديا', 'keys'=>['facebook','instagram','linkedin','behance']],
  ];
  $all = $settings->flatten()->pluck('value','key');
  @endphp

  <div style="display:grid;grid-template-columns:1fr 1fr;gap:1.5rem">
    @foreach($groups as $gKey => $group)
    <div class="glass-card" style="padding:1.5rem">
      <h3 style="font-size:1rem;font-weight:800;margin-bottom:1.2rem;color:var(--blue-ll)">{{ $group['label'] }}</h3>
      @foreach($group['keys'] as $key)
      <div class="form-group">
        <label>{{ $key }}</label>
        @if(str_ends_with($key, '_ar') || str_ends_with($key, '_en') || $key === 'about_ar' || $key === 'about_en')
          <textarea name="{{ $key }}" rows="{{ (str_starts_with($key,'about') ? 4 : 2) }}" style="min-height:unset">{{ $all[$key] ?? '' }}</textarea>
        @else
          <input type="text" name="{{ $key }}" value="{{ $all[$key] ?? '' }}">
        @endif
      </div>
      @endforeach
    </div>
    @endforeach
  </div>

  <div style="margin-top:1.5rem">
    <button type="submit" class="btn-sm btn-primary" style="padding:.6rem 2rem;font-size:.95rem">💾 حفظ جميع الإعدادات</button>
  </div>
</form>
@endsection
