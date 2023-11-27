<?php

namespace App\Livewire;

use App\Models\Education;
use App\Models\Skill;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Storage;

#[Title('Home')]
class Home extends Component {
    public $users;
    public $skills;
    public $educations;
    public $archivement;
    public function __construct() {
        $this->users = User::first();
        $this->skills = Skill::get();
        $this->educations = Education::get();
        $this->archivement = \App\Models\Archivement::with('category_gallery')->get();
    }

    public function download() {
        if(Storage::exists('public/cv/'.$this->users->cv)) {
            return response()->download(storage_path('app/public/cv/'.$this->users->cv));
        }
    }

    public function render() {
        return view('livewire.home', ['users' => $this->users, 'skills' => $this->skills, 'educations' => $this->educations, 'archivements' => $this->archivement]);
    }
}
