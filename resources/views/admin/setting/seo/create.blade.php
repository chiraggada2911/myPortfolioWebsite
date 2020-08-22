@extends('layouts.admin.master')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Include Alert Blade -->
    @include('admin.alert.alert')

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">{{ __('content.seo') }}</h1>

        <div class="row">

            <div class="col-lg-12">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('content.seo') }}</h6>
                    </div>
                    <div class="card-body">
                        @if (isset($seo))
                            <form action="{{ route('seo.update', $seo->id) }}" method="POST">
                                @method('PUT')
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group p-0 margin-bottom-20 mt-0">
                                            <label for="name">{{ __('content.site_title') }} ({{ __('content.characters_left_70') }}) <span class="text-red">*</span></label>
                                            <input id="name" type="text" name="site_name" class="form-control" value="{{ $seo->site_name }}"  placeholder="{{ __('content.title_must_be_within_70_characters') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group p-0 margin-bottom-20 mt-0">
                                            <label for="desc">{{ __('content.site_desc') }} ({{ __('content.characters_left_150') }}) <span class="text-red">*</span></label>
                                            <textarea id="desc"  name="site_desc" class="form-control" rows="5" placeholder="{{ __('content.description_must_be_within_150_characters') }}" required>{{ $seo->site_desc }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group p-0 margin-bottom-20 mt-0">
                                            <label for="keyword">{{ __('content.site_keywords') }} ({{ __('content.seperate_with_commas') }}) <span class="text-red">*</span></label>
                                            <textarea id="keyword"  name="site_keywords" class="form-control" rows="5" placeholder="{{ __('content.keywords') }}" required>{{ $seo->site_keywords }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group p-0 margin-bottom-20 mt-0">
                                            <label for="fb_app_id" data-toggle="tooltip" title="{{ __('In order to use Facebook Insights you must add the app ID to your page. Insights lets you view analytics for traffic to your site from Facebook. Find the app ID in your App Dashboard.') }}">{{ __('fb:app_id') }}</label>
                                            <input id="fb_app_id" type="text" name="fb_app_id" class="form-control" value="{{ $seo->fb_app_id }}" placeholder="{{ __('151295074873255') }}">
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
                            <form  action="{{ route('seo.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group p-0 margin-bottom-20 mt-0">
                                            <label for="name">{{ __('content.site_title') }} ({{ __('content.characters_left_70') }}) <span class="text-red">*</span></label>
                                            <input id="name" type="text" name="site_name" class="form-control"   placeholder="{{ __('content.title_must_be_within_70_characters') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group p-0 margin-bottom-20 mt-0">
                                            <label for="desc">{{ __('content.site_desc') }} ({{ __('content.characters_left_150') }}) <span class="text-red">*</span></label>
                                            <textarea id="desc"  name="site_desc" class="form-control" rows="5" placeholder="{{ __('content.description_must_be_within_150_characters') }}" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group p-0 margin-bottom-20 mt-0">
                                            <label for="keyword">{{ __('content.site_keywords') }} ({{ __('content.seperate_with_commas') }}) <span class="text-red">*</span></label>
                                            <textarea id="keyword"  name="site_keywords" class="form-control" rows="5" placeholder="{{ __('content.keywords') }}" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group p-0 margin-bottom-20 mt-0">
                                            <label for="fb_app_id" data-toggle="tooltip" title="{{ __('In order to use Facebook Insights you must add the app ID to your page. Insights lets you view analytics for traffic to your site from Facebook. Find the app ID in your App Dashboard.') }}">{{ __('fb:app_id') }}</label>
                                            <input id="fb_app_id" type="text" name="fb_app_id" class="form-control" placeholder="{{ __('151295074873255') }}">
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
