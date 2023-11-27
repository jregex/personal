<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserController extends Controller {
    public function login() {
        $data = [
            'title' => 'Login',
        ];
        return view('admin.login', $data);
    }
    public function login_check(Request $request) {
        $username = $request->username;
        $cek = User::where('username', $username)
            ->orWhere('email', $username)
            ->first();
        if($cek) {
            $password = $request->password;
            if(Hash::check($password, $cek->password)) {
                $request->session()->put('admin-account', $cek);
                return redirect()->route('dashboard')->with('success', 'login success');
            } else {
                return back()->with('failed', 'Wrong password');
            }
        } else {
            return back()->with('failed', 'User not found');
        }
    }
    public function logout(Request $request) {
        $request->session()->forget('admin-account');
        return redirect()->route('home');
    }

    public function index() {
        $data = [
            'title' => 'Profile'
        ];

        return view('admin.users.profile', $data);
    }


    public function update(Request $request, User $user) {
        $request->validate([
            'email' => 'email',
        ]);
        $file = $request->file('image');
        if($file) {
            if(!Storage::exists('/public/userprofile')) {
                Storage::makeDirectory('public/userprofile', 0775, true);
            }
            $namagambar = md5(date('d-m-s', strtotime(now()))).'.'.$file->getClientOriginalExtension();
            $img = Image::make($file->path());
            $img->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(Storage::path('public/userprofile/'.$namagambar));
        } else {
            $namagambar = $user->image;
        }
        $filecv = $request->file('cv');
        if($filecv) {
            if(!Storage::exists('/public/cv')) {
                Storage::makeDirectory('public/cv', 0775, true);
            }
            $namafile = "CV-".$request->name.'.'.$filecv->getClientOriginalExtension();
            Storage::putFileAs("public/cv/", $filecv, $namafile);
        } else {
            $namafile = $user->cv;
        }
        $update = User::where('id', $user->id)->update([
            'username' => $request->username,
            'email' => $request->email,
            'name' => $request->name,
            'callname' => $request->callname,
            'tgl_lahir' => date('Y-m-d', strtotime($request->tgl_lahir)),
            'no_hp' => $request->no_hp,
            'resume' => $request->resume,
            'alamat' => $request->alamat,
            'image' => $namagambar,
            'instagram' => $request->instagram,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'cv' => $namafile
        ]);
        if($update) {
            $sesi = $request->session()->get('admin-account');
            $sesi['name'] = $request->name;
            $sesi['username'] = $request->username;
            $sesi['email'] = $request->email;
            $sesi['callname'] = $request->callname;
            $sesi['no_hp'] = $request->no_hp;
            $sesi['tgl_lahir'] = $request->tgl_lahir;
            $sesi['resume'] = $request->resume;
            $sesi['alamat'] = $request->alamat;
            $sesi['image'] = $namagambar;
            $sesi['instagram'] = $request->instagram;
            $sesi['facebook'] = $request->facebook;
            $sesi['twitter'] = $request->twitter;
            $sesi['cv'] = $namafile;
            return redirect()->route('users.index')->with('success', 'Data was successfully updated');
        } else {
            return redirect()->route('users.index')->with('failed', 'Data failed to update');
        }
    }
}
