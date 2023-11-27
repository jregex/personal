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
            <div class="card p-4">
                <div class="card-header">
                    <h5 class="text-dark">Edit {{ $title }}</h5>
                </div>

                <form action="{{ route('archivements.update',['archivement'=>$archivement->id]) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="category_gallery_id" class="text-white">Category</label>
                        <select name="category_gallery_id" id="category_gallery_id"
                            class="form-control form-control-sm">
                            @foreach ($categories as $item)
                            <option value="{{$item->id}}" {{$item->id==$archivement->category_gallery_id ?
                                'selected':''}}>{{$item->category}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="archivement" class="text-white">Archivement</label>
                        <input type="text" name="archivement" id="archivement"
                            class="form-control form-control-alternative" placeholder="Input archivement"
                            value="{{$archivement->archivement}}">
                    </div>
                    <div class="form-group">
                        <label for="tgl" class="text-white">Tanggal agenda</label>
                        <input type="date" name="tgl" id="tgl" class="form-control form-control-alternative"
                            min="2012-01-01" placeholder="Input tanggal agenda"
                            value="{{date('Y-m-d',strtotime($archivement->tgl))}}">
                    </div>
                    <div class="form-group">
                        <label for="desc" class="text-white">Deskripsi</label>
                        <textarea name="desc" id="desc" cols="5" rows="5" class="form-control"
                            placeholder="Input deskripsi">{{$archivement->desc}}</textarea>
                    </div>

                    <div class="form-group">
                        <a href="{{ route('archivements.index') }}" class="btn btn-danger text-white">Kembali</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
