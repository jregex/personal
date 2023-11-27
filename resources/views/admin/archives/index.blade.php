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
                <div class="card-body px-3 py-3">

                    <div class="row">
                        @foreach ($categories as $item)
                        @foreach ($item->archivements as $value)
                        <div class="col-md-3 col-sm-12">
                            <div class="card border border-primary">
                                <div class="card-header d-flex justify-content-between">
                                    <h5>{{ ucfirst($value->archivement) }}</h5>
                                    <div class="align-middle">
                                        <button
                                            class="btn btn-link text-secondary rounded-circle bg-gray-200 text-dark mb-0"
                                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v text-sm"></i>
                                        </button>
                                        <ul class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuButton1">
                                            <li>
                                                <form
                                                    action="{{ route('archivements.delete', ['archivement'=>$value->id]) }}"
                                                    method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="dropdown-item text-white" type="submit"><i
                                                            class="fa fa-trash text-danger"></i>
                                                        Delete</button>
                                                </form>
                                            </li>
                                            <li><a class="dropdown-item text-white"
                                                    href="{{ route('archivements.edit', ['archivement'=>$value->id]) }}"><i
                                                        class="fa fa-edit text-warning"></i> Edit</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body px-4">
                                    <p class="text-gradient text-primary mb-2 text-sm">{{ $item->category }}</p>
                                    <p>
                                        {{ $value->desc }}
                                    </p>
                                    <p class="text-primary text-xs">{{ date('d/m/Y',strtotime($value->tgl)) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endforeach
                    </div>
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
            <form action="{{ route('archivements.store') }}" method="post" id="addArchive">
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
                        <label for="archivement" class="text-white">Archivement</label>
                        <input type="text" name="archivement" id="archivement"
                            class="form-control form-control-alternative" placeholder="Input archivement">
                    </div>
                    <div class="form-group">
                        <label for="tgl" class="text-white">Tanggal agenda</label>
                        <input type="date" name="tgl" id="tgl" class="form-control form-control-alternative"
                            min="2012-01-01" placeholder="Input tanggal agenda">
                    </div>
                    <div class="form-group">
                        <label for="desc" class="text-white">Deskripsi</label>
                        <textarea name="desc" id="desc" cols="5" rows="3" class="form-control"
                            placeholder="Input deskripsi"></textarea>
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
<script>
    document.querySelector('#resetData').addEventListener('click',()=>{
            document.querySelector('#addArchive').reset();
        });
</script>
@endsection
