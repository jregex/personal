<?php

namespace App\Http\Controllers;

use App\Models\CategoryGallery;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller {
    public function index() {
        $data = [
            "title" => "Gallery Archivement",
            "categories" => CategoryGallery::with('galleries')->get()
        ];
        // return $data['categories'];
        return view("admin.galleries.index", $data);
    }

    public function store(Request $request) {
        $request->validate(
            [
                "gallery" => 'required|image|mimes:jpeg,jpg,png',
                "category_gallery_id" => 'required'
            ],
            [
                'image' => 'hanya boleh gambar',
                'mimes' => 'type gambar hanya boleh jpg atau png'
            ]
        );
        $file = $request->file('gallery');
        if($file) {
            if(!Storage::exists('/public/gallery')) {
                Storage::makeDirectory('public/gallery', 0775, true);
            }
            $namafile = md5(date('d-m-s', strtotime(now()))).'.'.$file->getClientOriginalExtension();
            $img = Image::make($file->path());
            $img->resize(1080, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(Storage::path('public/gallery/'.$namafile));
        } else {
            $namafile = "default.jpg";
        }
        $save = Gallery::create([
            'gallery' => $namafile,
            'category_gallery_id' => $request->category_gallery_id
        ]);
        if($save) {
            return redirect()->route('galleries.index')->with('success', 'Gambar berhasil diupload');
        } else {
            return redirect()->route('galleries.index')->with('failed', 'Gambar gagal diupload');

        }
    }

    public function destroy(Gallery $gallery) {

        $delete = $gallery->delete();
        if($delete) {
            if(Storage::exists('/public/gallery/'.$gallery->gallery)) {
                Storage::delete('public/gallery/'.$gallery->gallery);
            }
            return redirect()->route('galleries.index')->with('success', 'Foto berhasil dihapus');
        } else {
            return redirect()->route('galleries.index')->with('failed', 'Foto gagal dihapus');

        }
    }

    public function list_category() {
        $data = [
            'title' => "Category Archivement",
            'categories' => CategoryGallery::get(['category', 'id'])
        ];
        return view('admin.galleries.category', $data);
    }

    public function add_category(Request $request) {
        $request->validate([
            'category' => 'required'
        ]);
        $save = CategoryGallery::create($request->all());
        if($save) {
            return redirect()->route('category.index')->with('success', 'Data berhasil disimpan');
        } else {
            return redirect()->route('category.index')->with('failed', 'Data gagal disimpan');
        }
    }

    public function edit_category(Request $request) {
        $id = $request->input('category-id');
        $update = CategoryGallery::where('id', $id)->update([
            'category' => $request->input('edit-category')
        ]);
        if($update) {
            return redirect()->route('category.index')->with('success', 'Data berhasil diupdate');
        } else {
            return redirect()->route('category.index')->with('failed', 'Data gagal diupdate');

        }
    }

    public function data_category($id) {
        return response()->json(CategoryGallery::where('id', $id)->get());
    }

    public function delete_category(CategoryGallery $categoryGallery) {
        $galleries = $categoryGallery->galleries()->get();

        $delete = $categoryGallery->delete();
        if($delete) {
            foreach($galleries as $item) {
                if(Storage::exists('/public/gallery/'.$item->gallery)) {
                    Storage::delete('public/gallery/'.$item->gallery);
                }
            }
            $galleries->each->delete();
            $categoryGallery->archivements()->get()->each->delete();
            return redirect()->route('category.index')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->route('category.index')->with('failed', 'Data gagal dihapus');
        }
    }
}
