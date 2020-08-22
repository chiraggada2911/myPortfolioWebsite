@extends('layouts.admin.master')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Include Alert Blade -->
    @include('admin.alert.alert')

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">{{ __('content.project_video') }}</h1>

        <div class="row">

            <div class="col-lg-12">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('content.project_video') }}</h6>
                    </div>
                    <div class="card-body">
                        @if (isset($project_video))
                            <form action="{{ route('project.update_video', $project_video->id) }}" method="POST">
                                @method('PUT')
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <label for="video_link">{{ __('content.video_link') }}  <span class="text-red">*</span></label>
                                            <input id="video_link" name="video_link" type="text" class="form-control" value="{{ $project_video->video_link }}" placeholder="{{ __('content.enter_video_link') }}" required>
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
                            <form action="{{ route('project.store_video') }}" method="POST">
                                @csrf
                                <input name="project_id" type="hidden" value="{{ $id }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <label for="video_link">{{ __('content.video_link') }} <span class="text-red">*</span></label>
                                            <input id="video_link" name="video_link" type="text" class="form-control" placeholder="{{ __('content.enter_video_link') }}" required>
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
