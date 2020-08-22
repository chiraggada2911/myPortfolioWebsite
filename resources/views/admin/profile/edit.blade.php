@extends('layouts.admin.master')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Include Alert Blade -->
    @include('admin.alert.alert')

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">{{ __('content.my_profile') }}</h1>

        <div class="row">

            <div class="col-lg-12">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('content.edit_profile') }}</h6>
                    </div>
                    <div class="card-body">
                        <form  action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="name">{{ __('content.name') }} <span class="text-red">*</span></label>
                                        <input id="name" name="name" type="text" class="form-control" placeholder="{{ __('content.enter_name') }}" value="{{ $user->name }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="job">{{ __('content.job') }}</label>
                                        <input id="job" name="job" type="text" class="form-control" value="{{ $user->job }}"  placeholder="{{ __('content.enter_job') }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email">{{ __('content.email') }} <span class="text-red">*</span></label>
                                        <input id="email" name="email" type="email" class="form-control"  placeholder="{{ __('content.enter_email') }}" value="{{ $user->email }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label for="image">{{ __('content.image') }} ({{ __('content.size') }} 128x128)(.png, .jpg, .jpeg)</label>
                                        <input id="image" name="profile_image" type="file" class="form-control-file">
                                        @if (!empty($user->profile_image))
                                            <img src="{{ asset('uploads/img/profile/'.$user->profile_image) }}" class="img-fluid image-size rounded-circle margin-top-20" alt="profile image">
                                        @else
                                            <img src="{{ asset('uploads/img/dummy/128x128.png') }}" class="img-fluid image-size rounded-circle margin-top-20" alt="profile image">
                                        @endif
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
