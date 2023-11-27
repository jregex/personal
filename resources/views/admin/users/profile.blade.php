@extends('layouts.main-admin')

@section('datatables-css')
@vite(["resources/css/app.css","resources/js/app.js"])
@endsection

@section('content-admin')
<div class="container-fluid py-4">
    <div class="row">

        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Edit Profile</p>
                        <button class="btn btn-primary btn-sm ms-auto" id="btnEdit">Edit</button>
                    </div>
                </div>
                <div class="card-body">
                    @if (session()->has('success'))
                    <div class="alert alert-success mt-2 alert-dismissible fade show" role="alert">
                        <span class="text-white">{{ session()->get('success') }}</span>
                        <button type="button" class="btn-close text-white" data-bs-dismiss="alert"
                            aria-label="Close">X</button>
                    </div>
                    @elseif(session()->has('failed'))
                    <div class="alert alert-danger mt-2 alert-dismissible fade show" role="alert">
                        <span class="text-white">{{ session()->get('failed') }}</span>
                        <button type="button" class="btn-close text-white" data-bs-dismiss="alert"
                            aria-label="Close">X</button>
                    </div>
                    @endif
                    <p class="text-uppercase text-sm">User Information</p>
                    <div class="row">
                        <form method="post"
                            action="{{ route('users.update', ['user' => session()->get('admin-account.id')]) }}"
                            enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username" class="form-control-label">Username</label>
                                        <input class="form-control" id="username" name="username" type="text" disabled
                                            value="{{ session()->get('admin-account.username') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email" class="form-control-label">Email address</label>
                                        <input class="form-control" id="email" name="email" type="email" disabled
                                            value="{{ session()->get('admin-account.email') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="form-control-label">Name</label>
                                        <input class="form-control" id="name" name="name" disabled type="text"
                                            value="{{ session()->get('admin-account.name') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="callname">Call Name</label>
                                        <input class="form-control" id="callname" name="callname" disabled type="text"
                                            value="{{ session()->get('admin-account.callname') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tgl_lahir" class="form-control-label">Tanggal Lahir</label>
                                        <input class="form-control" id="tgl_lahir" name="tgl_lahir" disabled type="date"
                                            value="{{ session()->get('admin-account.tgl_lahir') }}" min="1995-01-01"
                                            max="2012-01-01">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_hp">No HP</label>
                                        <input class="form-control" id="no_hp" name="no_hp" disabled type="text"
                                            value="{{ session()->get('admin-account.no_hp') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="instagram">Instagram</label>
                                        <input class="form-control" id="instagram" name="instagram" disabled type="text"
                                            value="{{ session()->get('admin-account.instagram') }}"
                                            placeholder="masukkan url instagram">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="facebook">Facebook</label>
                                        <input class="form-control" id="facebook" name="facebook" disabled type="text"
                                            value="{{ session()->get('admin-account.facebook') }}"
                                            placeholder="masukkan url facebook">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="twitter">Twitter</label>
                                        <input class="form-control" id="twitter" name="twitter" disabled type="text"
                                            value="{{ session()->get('admin-account.twitter') }}"
                                            placeholder="masukkan url twitter">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="alamat" class="form-control-label">Alamat</label>
                                        <textarea class="form-control" name="alamat" id="alamat" rows="5" cols="3"
                                            disabled>{{session()->get('admin-account.alamat')}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="resume">Resume</label>
                                        <textarea class="form-control" name="resume" id="resume" rows="5" cols="3"
                                            disabled>{{session()->get('admin-account.resume')}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2 col-sm-12 text-center mb-2">
                                    <img id="previewImg"
                                        src="{{ session()->get('admin-account.image') == 'default.webp' ? asset('assets/admin/img/icons/default.webp') : asset('storage/userprofile/'.session()->get('admin-account.image')) }}"
                                        alt="PreviewImg" height="300" width="300" class="img-fluid img-thumbnail">
                                </div>
                                <div class="col-md-10 col-sm-12">
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="image" id="image" multiple
                                            accept="image/*" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">

                                <div class="col-md-8 col-sm-12">
                                    <div class="form-group">
                                        <label for="cv">CV</label>
                                        <input type="file" class="form-control" name="cv" id="cv" multiple
                                            accept="application/pdf" placeholder="masukkan file CV" disabled>
                                        <small class="text-muted fst-italic">file PDF</small>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 text-center mb-2">
                                    <object data="{{ asset('storage/cv') }}/{{session()->get('admin-account.cv')}}"
                                        type="application/pdf" width="100%" height="300px"
                                        name="{{session()->get('admin-account.cv')}}">
                                    </object>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success d-none" id="btnS" type="submit">Save</button>
                                <button class="btn btn-danger d-none" id="btnB" type="button">Batal</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('datatables-js')
<script src="{{ asset('assets/admin/js/custom-js/custom-plugins.js') }}"></script>
<script src="{{ asset('assets/admin/js/custom-js/user-set.js') }}"></script>
@endsection
