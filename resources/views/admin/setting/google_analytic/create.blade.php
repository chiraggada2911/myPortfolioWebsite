@extends('layouts.admin.master')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Include Alert Blade -->
    @include('admin.alert.alert')

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">{{ __('content.google_analytic') }}</h1>

        <div class="row">

            <div class="col-lg-12">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('content.google_analytic') }}</h6>
                    </div>
                    <div class="card-body">
                        @if (isset($google_analytic))
                            <form action="{{ route('google-analytic.update', $google_analytic->id) }}" method="POST">
                                @method('PUT')
                                @csrf

                                <div class="row">
                                     <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="google_analytic">{{ __('content.google_analytic') }} <span class="text-red">*</span></label>
                                            <input id="google_analytic" name="google_analytic" type="text" class="form-control" value="{{ $google_analytic->google_analytic }}" placeholder="{{ __('content.enter_code') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-success">
                                            <i class="spinner fa fa-spinner fa-spin"></i> {{ __('content.update') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        @else
                            <form  action="{{ route('google-analytic.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="google_analytic">{{ __('content.title') }} <span class="text-red">*</span> </label>
                                            <input id="google_analytic" name="google_analytic" type="text" class="form-control" placeholder="{{ __('content.enter_code') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-success">
                                            <i class="spinner fa fa-spinner fa-spin"></i> {{ __('content.create') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>

            </div>

        </div>

    </div>
    <!-- /.container-fluid -->

@endsection
