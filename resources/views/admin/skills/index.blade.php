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

                <div class="card-header pb-0 d-flex align-items-center">
                    <h6>List {{ $title }}</h6>
                    <button class="btn btn-success btn-sm ms-auto" data-bs-toggle="modal"
                        data-bs-target="#addModal">Tambah</button>
                </div>
                <div class="card-body px-3 py-3">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center justify-content-center mb-0" id="tb-skills">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>skill</th>
                                    <th>Progress</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($skills as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_skill }}</td>
                                    <td>{{ $item->progress }} %</td>
                                    <td class="align-middle">
                                        <button
                                            class="btn btn-link text-secondary mb-0 rounded-circle bg-light text-dark"
                                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v text-md"></i>
                                        </button>
                                        <ul class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuButton1">
                                            <li>
                                                <form action="{{ route('skill.delete', ['skill' => $item->id]) }}"
                                                    method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="dropdown-item text-white" type="submit"><i
                                                            class="fa fa-trash text-danger"></i>
                                                        Delete</button>
                                                </form>
                                            </li>
                                            <li><button type="button" class="dropdown-item text-white btnEditSkill"
                                                    data-id="{{$item->id}}" id="btnEditSkill"><i
                                                        class="fa fa-edit text-warning"></i>
                                                    Edit</button>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
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
            <form action="{{ route('skill.store') }}" method="post" enctype="multipart/form-data" id="addForm">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="addModalLabel">{{ $title }}</h5>

                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label class="text-white" for="skill">Skills</label>
                        <input type="text" class="form-control form-control-alternative" name="skill" id="skill"
                            placeholder="Input skill">
                    </div>
                    <div class="form-group">
                        <label class="text-white" for="email">Progress</label>
                        <input type="number" min="0" class="form-control form-control-alternative" name="progress"
                            id="progress" placeholder="Input Progress">
                        <small class="fst-italic text-white">berapa %</small>
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

<!-- Modal -->
<div class="modal fade" id="editSkill" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-gradient-primary">
            <form action="{{ route('skill.edit') }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}" />
                @method('patch')
                <input type="hidden" name="skill-id" id="skillid">
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="editModalLabel">Edit Skill</h5>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label class="text-white" for="edit-skill">Skills</label>
                        <input type="text" class="form-control form-control-alternative" name="edit-skill"
                            id="edit-skill" placeholder="Input skill">
                    </div>
                    <div class="form-group">
                        <label class="text-white" for="email">Progress</label>
                        <input type="number" min="0" class="form-control form-control-alternative" name="edit-progress"
                            id="edit-progress" placeholder="Input Progress">
                        <small class="fst-italic text-white">berapa %</small>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark text-white" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-light">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('datatables-js')

<script src="{{ asset('assets/admin') }}/js/custom-js/edit-skill.js"></script>

@endsection
