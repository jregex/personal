@extends('layouts.main-admin')

@section('content-admin')
    <div class="row my-5 mx-3">
        <div class="col-xl-12 col-sm-12 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body py-4 px-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Session</p>
                                <h5 class="font-weight-bolder">
                                    {{session()->get('admin-account.name')}}
                                </h5>
                                <p class="mb-0">
                                    <span class="text-success text-sm font-weight-bolder">{{session()->get('admin-account.email')}}</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
