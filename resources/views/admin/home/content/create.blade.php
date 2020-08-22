@extends('layouts.admin.master')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Include Alert Blade -->
    @include('admin.alert.alert')

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">{{ __('content.content') }}</h1>

        <div class="row">

            <div class="col-lg-12">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('content.content') }}</h6>
                    </div>
                    <div class="card-body">
                        @if (isset($content))
                            <form action="{{ route('content.update', $content->id) }}" method="POST">
                                @method('PUT')
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="small_title">{{ __('content.small_title') }}</label>
                                            <input id="small_title" name="small_title" type="text" class="form-control" value="{{ $content->small_title }}"  placeholder="{{ __('content.enter_small_title') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="main_title">{{ __('content.main_title') }}</label>
                                            <input id="main_title" name="main_title" type="text" class="form-control" value="{{ $content->main_title }}" placeholder="{{ __('content.enter_main_title') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="short_desc">{{ __('content.short_desc') }}</label>
                                            <textarea id="short_desc" name="short_desc" type="textarea" class="form-control" placeholder="{{ __('content.enter_short_desc') }}">{{ $content->short_desc }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="btn_name">{{ __('content.button_name') }}</label>
                                            <input id="btn_name" name="btn_name" type="text" class="form-control" value="{{ $content->btn_name }}" placeholder="{{ __('content.enter_button_name') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="btn_link">{{ __('content.button_link') }} (about or portfolio or contact or blog)</label>
                                            <input id="btn_link" name="btn_link" type="text" class="form-control" value="{{ $content->btn_link }}" placeholder="{{ __('content.enter_button_link') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="btn_link_status">{{ __('content.button_link_status') }}</label>
                                            <select name="btn_link_status" class="form-control" id="btn_link_status">
                                                <option value="1" selected>{{ __('content.select_your_option') }}</option>
                                                <option value="1" {{ $content->btn_link_status === 1 ? 'selected' : '' }}>{{ __('content.show') }}</option>
                                                <option value="0" {{ $content->btn_link_status === 0 ? 'selected' : '' }}>{{ __('content.hide') }}</option>
                                            </select>
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
                            <form  action="{{ route('content.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="small_title">{{ __('content.small_title') }}</label>
                                            <input id="small_title" name="small_title" type="text" class="form-control"  placeholder="{{ __('content.enter_small_title') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="main_title">{{ __('content.main_title') }}</label>
                                            <input id="main_title" name="main_title" type="text" class="form-control" placeholder="{{ __('content.enter_main_title') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="short_desc">{{ __('content.short_desc') }}</label>
                                            <textarea id="short_desc" name="short_desc" type="textarea" class="form-control" placeholder="{{ __('content.enter_short_desc') }}"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="btn_name">{{ __('content.button_name') }}</label>
                                            <input id="btn_name" name="btn_name" type="text" class="form-control"  placeholder="{{ __('content.enter_button_name') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="btn_link">{{ __('content.button_link') }} (use about or portfolio or contact or blog)</label>
                                            <input id="btn_link" name="btn_link" type="text" class="form-control" placeholder="{{ __('content.enter_button_link') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="btn_link_status">{{ __('content.button_link_status') }}</label>
                                            <select name="btn_link_status" class="form-control" id="btn_link_status">
                                                <option value="1" selected>{{ __('content.select_your_option') }}</option>
                                                <option value="1">{{ __('content.show') }}</option>
                                                <option value="0">{{ __('content.hide') }}</option>
                                            </select>
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
