@extends('layouts.admin.master')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Include Alert Blade -->
    @include('admin.alert.alert')

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">{{ __('content.add_blog') }}</h1>

        <div class="row">

            <div class="col-lg-12">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('content.add_blog') }}</h6>
                    </div>
                    <div class="card-body">
                        <form  action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                           @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">{{ __('content.title') }} <span class="text-red">*</span></label>
                                        <input id="title" name="title" type="text" class="form-control" placeholder="{{ __('content.enter_title') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="short_desc">{{ __('content.short_desc') }}</label>
                                        <textarea id="short_desc" name="short_desc" class="form-control" placeholder="{{ __('content.enter_short_desc') }}"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="summernote">{{ __('content.description') }}</label>
                                        <textarea id="summernote" name="desc" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="tag">{{ __('content.tag') }} ({{ __('content.seperate_with_commas') }})</label>
                                        <textarea id="tag" name="tag" class="form-control" placeholder="{{ __('tag1,tag2,tag3') }}"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="author">{{ __('content.author') }}</label>
                                        <input id="author" name="author" type="text" class="form-control" placeholder="{{ __('content.enter_author') }}">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="status">{{ __('content.status') }} </label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="1" selected>{{ __('content.select_your_option') }}</option>
                                            <option value="1">{{ __('content.enable') }}</option>
                                            <option value="0">{{ __('content.disable') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">{{ __('content.image') }} ({{ __('content.size') }} 895x552)(.png, .jpg, .jpeg)</label>
                                        <input id="image" name="blog_image" type="file" class="form-control-file">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success">
                                        <i class="spinner fa fa-spinner fa-spin"></i> {{ __('content.create') }}
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
