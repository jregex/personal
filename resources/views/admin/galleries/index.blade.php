@extends('layouts.main-admin')

@section('content-admin')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            @if (count($errors) > 0)
            <div class="alert alert-danger alert-sm border-none text-white" role="alert">
                @foreach ($errors->all() as $error)
                <span class="alert-text">* {{ $error }}</span> <br>
                @endforeach
            </div>
            @endif
            <div class="card">
                @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    <span class="text-white">{{ session()->get('success') }}</span>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="alert"
                        aria-label="Close">X</button>
                </div>
                @elseif(session()->has('failed'))
                <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                    <span class="text-white">{{ session()->get('failed') }}</span>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="alert"
                        aria-label="Close">X</button>
                </div>
                @endif

                <div class="card-header d-flex align-items-center pb-0 bg-gray-100">
                    <h6>List {{ $title }}</h6>
                    <button class="btn btn-success btn-sm ms-auto" data-bs-toggle="modal"
                        data-bs-target="#addModal">Tambah</button>
                </div>
                <div class="card-body">
                    @foreach ($categories as $item)
                    <div class="row px-2 py-2">
                        <h6 class="text-center py-2 bg-gray-200 rounded">{{$item->category}}</h6>
                        @forelse($item->galleries as $values)
                        <div class="col-md-2 col-sm-6 mb-2">
                            <div class="card shadow-none">
                                <div class="card-body">
                                    <img src="{{ asset('storage/gallery') }}/{{$values->gallery}}" alt="Gallery Image"
                                        class="img-fluid img-thumbnail mb-2">
                                    <p class="text-primary text-xs mb-2">{{ date('d/m/Y
                                        H:i',strtotime($values->created_at)) }}
                                    </p>
                                    <form action="{{ route('galleries.delete', ['gallery'=>$values->id]) }}"
                                        method="post" class="d-flex justify-content-end">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-link" type="submit"><i
                                                class="fa fa-trash text-danger"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @empty
                        <p class="py-4 text-center fst-italic">Foto Kosong silahkan upload</p>
                        @endforelse
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-gradient-primary">
            <form action="{{ route('galleries.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="addModalLabel">add {{ $title }}</h5>

                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="category_gallery_id" class="text-white">Category</label>
                        <select name="category_gallery_id" id="category_gallery_id"
                            class="form-control form-control-sm">
                            @foreach ($categories as $item)
                            <option value="{{$item->id}}">{{$item->category}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <img width="400" height="400" class="img-fluid text-white" alt="PreviewImg"
                                    id="previewImg" />
                            </div>
                            <div class="col-md-9 col-sm-12">
                                <input type="file" class="form-control form-control-alternative" name="gallery"
                                    id="gallery" placeholder="input gallery">
                                <small class="text-white fst-italic">jpg,png</small>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" id="resetData" class="btn btn-dark text-white"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-light">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('datatables-js')
<script src="{{ asset('assets/admin') }}/js/custom-js/custom-plugins.js"></script>
<script src="{{ asset('assets/admin') }}/js/custom-js/gallery-set.js"></script>
@endsection
