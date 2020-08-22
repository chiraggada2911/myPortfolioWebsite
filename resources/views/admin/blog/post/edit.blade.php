@extends('layouts.admin.master')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Include Alert Blade -->
    @include('admin.alert.alert')

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">{{ __('content.edit_blog') }}</h1>

        <div class="row">

            <div class="col-lg-12">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('content.edit_blog') }}</h6>
                    </div>
                    <div class="card-body">
                        <form  action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">{{ __('content.title') }} <span class="text-red">*</span></label>
                                        <input id="title" name="title" type="text" class="form-control" value="{{ $blog->title }}" placeholder="{{ __('content.enter_title') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="short_desc">{{ __('content.short_desc') }}</label>
                                        <textarea id="short_desc" name="short_desc" class="form-control" placeholder="{{ __('content.enter_short_desc') }}">{{ $blog->short_desc }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="summernote">{{ __('content.description') }}</label>
                                        <textarea id="summernote" name="desc" class="form-control">@php echo html_entity_decode($blog->desc); @endphp</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="tag">{{ __('content.tag') }} ({{ __('content.seperate_with_commas') }})</label>
                                        <textarea id="tag" name="tag" class="form-control" placeholder="{{ __('tag1, tag2, tag3') }}">{{ $blog->tag }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="author">{{ __('content.author') }}</label>
                                        <input id="author" name="author" type="text" class="form-control" value="{{ $blog->author }}" placeholder="{{ __('content.enter_author') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="status">{{ __('content.status') }}</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="1" selected>{{ __('content.select_your_option') }}</option>
                                            <option value="1" {{ $blog->status === 1 ? 'selected' : '' }}>{{ __('content.enable') }}</option>
                                            <option value="0" {{ $blog->status === 0 ? 'selected' : '' }}>{{ __('content.disable') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="image">{{ __('content.image') }} ({{ __('content.size') }} 895x552)(.png, .jpg, .jpeg)</label>
                                        <input id="image" name="blog_image" type="file" class="form-control-file">
                                    </div>
                                    <div class="card custom-card margin-top-20">
                                        <div class="card-header custom-header bg-light-grey">
                                            <h6>{{ __('content.current_image') }} </h6>
                                        </div>
                                        <div class="card-body">
                                            @if ($blog->blog_image == '')
                                                <i class="far fa-image custom-font-size text-center d-block img-fluid"></i>
                                            @else
                                                <img src="{{ asset('uploads/img/blog/'.$blog->blog_image) }}" class="img-thumbnail mx-auto d-block w-25" alt="blog image">
                                            @endif
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
