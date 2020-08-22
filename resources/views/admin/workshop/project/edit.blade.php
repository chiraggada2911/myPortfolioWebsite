@extends('layouts.admin.master')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">{{ __('content.edit_project') }}</h1>

        <div class="row">

            <div class="col-lg-12">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('content.edit_project') }}</h6>
                    </div>
                    <div class="card-body">
                        <form  action="{{ route('project.update', $project->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="project_name">{{ __('content.project_name') }} <span class="text-red">*</span></label>
                                        <input id="project_name" type="text" name="project_name" class="form-control" value="{{ $project->project_name }}" placeholder="{{ __('content.enter_project_name') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <fieldset class="form-group">
                                        <div class="row">
                                            <legend class="col-form-label col-sm-5 pt-0">{{ __('content.project_view_option') }} <span class="text-red">*</span></legend>
                                            <div class="col-sm-7">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="project_view_option" id="gridRadios1" value="1" {{ ($project->project_view_option=="1")? "checked" : "" }} required>
                                                    <label class="form-check-label" for="gridRadios1">
                                                       {{ __('content.image_view') }}
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="project_view_option" id="gridRadios2" value="2" {{ ($project->project_view_option=="2")? "checked" : "" }}>
                                                    <label class="form-check-label" for="gridRadios2">
                                                        {{ __('content.video_view') }}
                                                    </label>
                                                </div>
                                                <div class="form-check disabled">
                                                    <input class="form-check-input" type="radio" name="project_view_option" id="gridRadios3" value="3" {{ ($project->project_view_option=="3")? "checked" : "" }}>
                                                    <label class="form-check-label" for="gridRadios3">
                                                        {{ __('content.slider_view') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="item_status">{{ __('content.item_status') }}</label>
                                        <select name="item_status" class="form-control" id="item_status">
                                            <option value="1" selected>{{ __('content.select_your_option') }}</option>
                                            <option value="1" {{ $project->item_status === 1 ? 'selected' : '' }}>{{ __('content.enable') }}</option>
                                            <option value="0" {{ $project->item_status === 0 ? 'selected' : '' }}>{{ __('content.disable') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">{{ __('content.project_status') }}</label>
                                        <select name="status" class="form-control" id="status">
                                            <option value="1" selected>{{ __('content.select_your_option') }}</option>
                                            <option value="1" {{ $project->status === 1 ? 'selected' : '' }}>{{ __('content.enable') }}</option>
                                            <option value="0" {{ $project->status === 0 ? 'selected' : '' }}>{{ __('content.disable') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="order">{{ __('content.order') }}</label>
                                        <input id="order" type="number" name="order" class="form-control" value="{{ $project->order }}">
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
