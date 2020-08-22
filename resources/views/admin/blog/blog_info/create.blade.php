@extends('layouts.admin.master')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Include Alert Blade -->
    @include('admin.alert.alert')

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">{{ __('content.blog_info') }}</h1>

        <div class="row">

            <div class="col-lg-12">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('content.blog_info') }}</h6>
                    </div>
                    <div class="card-body">
                        @if (isset($blog_info))
                            <form action="{{ route('blog-info.update', $blog_info->id) }}" method="POST">
                                @method('PUT')
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title_bg_name">{{ __('content.title_background_name') }}</label>
                                            <input id="title_bg_name" name="title_bg_name" type="text" class="form-control" value="{{ $blog_info->title_bg_name }}"  placeholder="{{ __('content.enter_title_background') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">{{ __('content.title') }}  <span class="text-red">*</span></label>
                                            <input id="title" name="title" type="text" class="form-control" value="{{ $blog_info->title }}" placeholder="{{ __('content.enter_title') }}" required>
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
                            <form  action="{{ route('blog-info.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title_bg_name">{{ __('content.title_background_name') }}</label>
                                            <input id="title_bg_name" name="title_bg_name" type="text" class="form-control"  placeholder="{{ __('content.enter_title_background') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">{{ __('content.title') }} <span class="text-red">*</span> </label>
                                            <input id="title" name="title" type="text" class="form-control" placeholder="{{ __('content.enter_title') }}" required>
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
