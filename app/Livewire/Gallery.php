<?php

namespace App\Livewire;

use App\Models\CategoryGallery;
use Livewire\Component;

class Gallery extends Component {
    public function render() {
        $data = [
            "categories" => CategoryGallery::with('galleries')->get(["id", "category"]),
        ];
        return view('livewire.gallery', $data);
    }
}
