<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Archivement extends Model {
    protected $guarded = ['id'];

    public function category_gallery() {
        return $this->belongsTo(CategoryGallery::class, 'category_gallery_id');
    }
}
