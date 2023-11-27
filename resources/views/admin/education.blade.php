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
                        @forelse ($educations as $item)
                        <div class="col-md-3 col-sm-12">
                            <div class="card border border-primary">
                                <div class="card-header d-flex justify-content-between">
                                    <h5>{{ $item->pendidikan }}</h5>
                                    <div class="align-middle">
                                        <button
                                            class="btn btn-link text-secondary rounded-circle bg-gray-200 text-dark mb-0"
                                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v text-sm"></i>
                                        </button>
                                        <ul class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuButton1">
                                            <li>
                                                <form
                                                    action="{{ route('educations.delete', ['education'=>$item->id]) }}"
                                                    method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="dropdown-item text-white" type="submit"><i
                                                            class="fa fa-trash text-danger"></i>
                                                        Delete</button>
                                                </form>
                                            </li>
                                            <li><a class="dropdown-item text-white" href=""><i
                                                        class="fa fa-edit text-warning"></i> Edit</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body px-4">
                                    <p class="text-gradient text-primary mb-2 text-sm">{{ $item->kampus }}</p>
                                    <p>
                                        {{ $item->desc }}
                                    </p>
                                    <p class="text-primary text-xs">{{ date('d/m/Y',strtotime($item->awal)) }} - {{
                                        date('d/m/Y',strtotime($item->akhir)) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @empty
                        <h5 class="py-4 text-center">Data Kosong</h5>
                        @endforelse
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
            <form action="{{ route('educations.store') }}" method="post" id="addForm">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="addModalLabel">{{ $title }}</h5>

                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label class="text-white" for="pendidikan">Pendidikan</label>
                        <input type="text" class="form-control form-control-alternative" name="pendidikan"
                            id="pendidikan" placeholder="Input pendidikan">
                    </div>
                    <div class="form-group">
                        <label class="text-white" for="jurusan">Jurusan</label>
                        <input type="text" class="form-control form-control-alternative" name="jurusan" id="jurusan"
                            placeholder="Input jurusan">
                    </div>
                    <div class="form-group">
                        <label class="text-white" for="kampus">Kampus</label>
                        <input type="text" class="form-control form-control-alternative" name="kampus" id="kampus"
                            placeholder="Input Kampus">
                    </div>
                    <div class="form-group">
                        <label class="text-white" for="awal">Tahun masuk</label>
                        <input type="date" class="form-control form-control-alternative" name="awal" id="awal"
                            placeholder="Input awal masuk">
                    </div>
                    <div class="form-group">
                        <label class="text-white" for="akhir">Tahun keluar</label>
                        <input type="date" class="form-control form-control-alternative" name="akhir" id="akhir"
                            placeholder="Input akhir masuk">
                    </div>
                    <div class="form-group">
                        <label for="desc" class="text-white">Deskripsi</label>
                        <textarea name="desc" id="desc" cols="3" rows="5" class="form-control"
                            placeholder="input deskripsi"></textarea>
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
            document.querySelector('#idForm').reset();
        });
</script>
@endsection
