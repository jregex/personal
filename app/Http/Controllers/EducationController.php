<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller {
    public function index() {
        $data = [
            'title' => 'Pendidikan',
            'educations' => Education::get()
        ];
        return view("admin.education", $data);
    }

    public function store(Request $request) {
        $request->validate([
            "pendidikan" => "required",
            "jurusan" => "required",
            "kampus" => "required",
            "awal" => "required",
        ]);
        $save = Education::create($request->all());
        if($save) {
            return redirect()->route("educations.index")->with("success", "Data berhasil ditambahkan");
        } else {
            return redirect()->route("educations.index")->with("failed", "Data gagal ditambahkan");
        }
    }

    public function destroy(Education $education) {
        $delete = $education->delete();
        if($delete) {
            return redirect()->route("educations.index")->with("success", "Data berhasil dihapus");
        } else {
            return redirect()->route("educations.index")->with("failed", "Data gagal dihapus");
        }
    }
}
