<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryGallery extends Model {
    protected $guarded = ['id'];

    public function galleries() {
        return $this->hasMany(Gallery::class);
    }

    public function archivements() {
        return $this->hasMany(Archivement::class);
    }
}
