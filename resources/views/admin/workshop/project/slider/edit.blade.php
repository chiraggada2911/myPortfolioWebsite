@extends('layouts.admin.master')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Include Alert Blade -->
    @include('admin.alert.alert')

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">{{ __('content.edit_slider') }}</h1>

        <div class="row">

            <div class="col-lg-12">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('content.edit_slider') }}</h6>
                    </div>
                    <div class="card-body">
                        <form  action="{{ route('project.update_slider', $slider->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <input name="project_id" type="hidden" value="{{ $project_id }}">
                                        <label for="project_slider">{{ __('content.image') }} (size 895x552)(.png, .jpg, .jpeg)</label>
                                        <input id="project_slider" name="project_slider" type="file" class="form-control-file">

                                        <div class="card custom-card margin-top-20">
                                            <div class="card-header custom-header bg-light-grey">
                                                <h6>{{ __('content.current_image') }} </h6>
                                            </div>
                                            <div class="card-body">
                                                <img src="{{ asset('uploads/img/project/'.$slider->project_slider) }}" class="mg-thumbnail mx-auto d-block w-25" alt="slider image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="order">{{ __('content.order') }}</label>
                                        <input id="order" type="number" name="order" class="form-control" value="{{ $slider->order }}"  placeholder="{{ __('content.enter_order') }}">
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
