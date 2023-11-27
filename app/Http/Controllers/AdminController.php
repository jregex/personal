<?php

namespace App\Http\Controllers;

use App\Models\Archivement;
use App\Models\CategoryGallery;
use App\Models\Skill;
use Illuminate\Http\Request;

class AdminController extends Controller {
    public function index() {
        $data = [
            'title' => 'Dashboard'
        ];

        return view('admin.dashboard', $data);
    }

    public function list_skill() {
        $data = [
            'title' => 'list skill',
            'skills' => Skill::get()
        ];
        return view('admin.skills.index', $data);
    }

    public function post_skil(Request $request) {
        $request->validate([
            'skill' => 'required',
            'progress' => 'required|numeric'
        ]);
        $save = Skill::create([
            'nama_skill' => $request->skill,
            'progress' => $request->progress
        ]);
        if($save) {
            return redirect()->route('skill.index')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->route('skill.index')->with('failed', 'Data gagal ditambahkan');
        }
    }

    public function data_skill($id) {
        return response()->json(
            Skill::where('id', $id)->get()
        );
    }
    public function edit_skill(Request $request) {
        $request->validate([
            'edit-skill' => 'required',
            'edit-progress' => 'numeric'
        ]);
        $id = $request->input('skill-id');
        $update = Skill::where('id', $id)->update([
            'nama_skill' => $request->input('edit-skill'),
            'progress' => $request->input('edit-progress')
        ]);
        if($update) {
            return redirect()->route('skill.index')->with('success', 'Data berhasil diupdate');
        } else {
            return redirect()->route('skill.index')->with('failed', 'Data gagal diupdate');
        }
    }

    public function delete_skill(Skill $skill) {
        $delete = $skill->delete();
        if($delete) {
            return redirect()->route('skill.index')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->route('skill.index')->with('failed', 'Data gagal dihapus');
        }
    }

    public function list_archive() {
        $data = [
            'title' => 'Archivements',
            'categories' => CategoryGallery::with('archivements')->get(),
        ];
        return view('admin.archives.index', $data);
    }
    public function add_archive(Request $request) {
        $request->validate([
            'archivement' => 'required',
            'tgl' => 'date',
        ]);

        $save = Archivement::create([
            'archivement' => $request->archivement,
            'category_gallery_id' => $request->input('category_gallery_id'),
            'tgl' => $request->tgl,
            'desc' => $request->desc
        ]);
        if($save) {
            return redirect()->route('archivements.index')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->route('archivements.index')->with('failed', 'Data gagal ditambahkan');

        }
    }
    public function edit_archive(Archivement $archivement) {
        $data = [
            'title' => 'Archivement',
            'archivement' => $archivement,
            'categories' => CategoryGallery::get(['category', 'id'])
        ];
        return view('admin.archives.edit', $data);
    }
    public function update_archive(Request $request, Archivement $archivement) {
        $request->validate([
            'archivement' => 'required',
            'tgl' => 'required|date'
        ]);
        $update = $archivement->update([
            'archivement' => $request->archivement,
            'category_gallery_id' => $request->input('category_gallery_id'),
            'tgl' => $request->tgl,
            'desc' => $request->desc
        ]);
        if($update) {
            return redirect()->route('archivements.index')->with('success', 'Data berhasil diupdate');
        } else {
            return redirect()->route('archivements.index')->with('failed', 'Data gagal diupdate');
        }
    }

    public function delete_archive(Archivement $archivement) {
        $delete = $archivement->delete();
        if($delete) {
            return redirect()->route('archivements.index')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->route('archivements.index')->with('failed', 'Data gagal dihapus');
        }

    }
}
