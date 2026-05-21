<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioItem extends Model
{
    protected $fillable = ['title_ar','title_en','subtitle_ar','subtitle_en','category','image','order','is_active'];
    protected $casts = ['is_active' => 'boolean'];

    public function scopeActive($query) { return $query->where('is_active', true)->orderBy('order'); }
}
