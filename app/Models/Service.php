<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['icon','title_ar','title_en','description_ar','description_en','tag','link','order','is_active'];
    protected $casts = ['is_active' => 'boolean'];

    public function scopeActive($query) { return $query->where('is_active', true)->orderBy('order'); }
}
