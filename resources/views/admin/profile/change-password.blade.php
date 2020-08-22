@extends('layouts.admin.master')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Include Alert Blade -->
    @include('admin.alert.alert')

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">{{ __('content.change_password') }}</h1>

        <div class="row">

            <div class="col-lg-12">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('content.change_password') }}</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('profile.change_password_update') }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="currentPass">{{ __('content.current_password') }} <span class="text-red">*</span></label>
                                        <input id="currentPass" name="current_password" type="password" class="form-control"  placeholder="{{ __('content.enter_current_password') }}" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="password">{{ __('content.new_password') }} <span class="text-red">*</span></label>
                                        <input id="password" name="password" type="password" class="form-control" placeholder="{{ __('content.enter_new_password') }}" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="confirmPass">{{ __('content.confirm_password') }} <span class="text-red">*</span></label>
                                        <input id="confirmPass" name="password_confirmation" type="password" class="form-control" placeholder="{{ __('content.enter_confirm_password') }}" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success">
                                        <i class="spinner fa fa-spinner fa-spin"></i> {{ __('content.update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <!-- /.container-fluid -->

@endsection
