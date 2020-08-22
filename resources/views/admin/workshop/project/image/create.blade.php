@extends('layouts.admin.master')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Include Alert Blade -->
    @include('admin.alert.alert')

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">{{ __('content.project_image') }}</h1>

        <div class="row">

            <div class="col-lg-12">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('content.project_image') }}</h6>
                    </div>
                    <div class="card-body">
                        @if (isset($project_image))
                            <form action="{{ route('project.update_image', $project_image->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <label for="project_image">{{ __('content.image') }} ({{ __('content.size') }} 895x552)(.png, .jpg, .jpeg)</label>
                                            <input id="project_image" name="project_image" type="file" class="form-control-file">

                                            <div class="card custom-card margin-top-20">
                                                <div class="card-header custom-header bg-light-grey">
                                                    <h6>{{ __('content.current_image') }} </h6>
                                                </div>
                                                <div class="card-body">
                                                    <img src="{{ asset('uploads/img/project/'.$project_image->project_image) }}" class="mg-thumbnail mx-auto d-block w-25" alt="project image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-success">
                                            {{ __('content.update') }}
                                        </button>
                                    </div>
                                </div>

                            </form>
                        @else
                            <form action="{{ route('project.store_image') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input name="project_id" type="hidden" value="{{ $id }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="project_image">{{ __('content.image') }} ({{ __('content.size') }} 895x552)(.png, .jpg, .jpeg) <span class="text-red">*</span></label>
                                            <input id="project_image" name="project_image" type="file" class="form-control-file">
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
