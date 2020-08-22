@extends('layouts.admin.master')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Include Alert Blade -->
    @include('admin.alert.alert')

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">{{ __('content.edit_profile_photo') }}</h1>

        <div class="row">

            <div class="col-lg-12">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('content.edit_profile_photo') }}</h6>
                    </div>
                    <div class="card-body">
                        <form  action="{{ route('profile-photo.update', $profile_photo->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="image">{{ __('content.image') }} ({{ __('content.size') }} 610x1020)(.png, .jpg, .jpeg)</label>
                                        <input id="image" name="profile_image" type="file" class="form-control-file">
                                    </div>
                                    <div class="card custom-card margin-top-20">
                                        <div class="card-header custom-header bg-light-grey">
                                            <h6>{{ __('content.current_image') }} </h6>
                                        </div>
                                        <div class="card-body">
                                            <img src="{{ asset('uploads/img/profile_photo/'.$profile_photo->profile_image) }}" class="img-thumbnail mx-auto d-block w-25" alt="profile-photo image">
                                        </div>
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
