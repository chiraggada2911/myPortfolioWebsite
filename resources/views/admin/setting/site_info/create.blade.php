@extends('layouts.admin.master')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Include Alert Blade -->
    @include('admin.alert.alert')

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">{{ __('content.site_info') }}</h1>

        <div class="row">

            <div class="col-lg-12">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('content.site_info') }}</h6>
                    </div>
                    <div class="card-body">
                        @if (isset($site_info))
                            <form action="{{ route('site-info.update', $site_info->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="panel_name">{{ __('content.admin_panel_name') }}</label>
                                            <input id="panel_name" name="panel_name" type="text" class="form-control" value="{{ $site_info->panel_name }}"  placeholder="{{ __('content.name') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="copyright">{{ __('content.copyright') }}</label>
                                            <input id="copyright" name="copyright" class="form-control" value="{{ $site_info->copyright }}" placeholder="{{ __('content.enter_copyright') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="favicon">{{ __('content.favicon') }} ({{ __('content.max') }} 128x128)(.ico, .svg, .png, .jpg, .jpeg)</label>
                                            <input id="favicon" name="favicon" type="file" class="form-control-file">
                                            @if (!empty($site_info->favicon))
                                                <img src="{{ asset('uploads/img/icon/'.$site_info->favicon) }}" class="img-fluid image-size margin-top-20" alt="personel-info image">
                                            @else
                                                <img src="{{ asset('uploads/img/dummy/128x128.png') }}" class="img-fluid image-size rounded-circle margin-top-20" alt="personel-info image">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="login_image">{{ __('content.login_image') }} ({{ __('content.size') }} 600x800)(.png, .jpg, .jpeg)</label>
                                            <input id="login_image" name="login_image" type="file" class="form-control-file">
                                            @if (!empty($site_info->login_image))
                                                <img src="{{ asset('uploads/img/login/'.$site_info->login_image) }}" class="img-fluid image-size margin-top-20" alt="personel-info image">
                                            @else
                                                <img src="{{ asset('uploads/img/dummy/bg-login-image.jpg') }}" class="img-fluid image-size rounded-circle margin-top-20" alt="login image">
                                            @endif
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
                            <form action="{{ route('site-info.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="panel_name">{{ __('content.admin_panel_name') }}</label>
                                            <input id="panel_name" name="panel_name" type="text" class="form-control" placeholder="{{ __('content.name') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="copyright">{{ __('content.copyright') }}</label>
                                            <input id="copyright" name="copyright" class="form-control" placeholder="{{ __('content.enter_copyright') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="favicon">{{ __('content.favicon') }}  (.ico, .svg, .png, .jpg, .jpeg)</label>
                                            <input id="favicon" name="favicon" type="file" class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="login_image">{{ __('content.login_image') }}  (.png, .jpg, .jpeg)</label>
                                            <input id="login_image" name="login_image" type="file" class="form-control-file">
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
