@extends('layouts.admin.master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Include Alert Blade -->
    @include('admin.alert.alert')

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ __('content.dashboard') }}</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Blogs Card  -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ __('content.blogs') }}</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">@if ($blogs_count == 0) {{__('content.not_yet_created')}} @else {{ $blogs_count }} @endif</div>
                            </div>
                            <div class="col-auto">
                                <i class="fab fa-blogger-b fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Projects Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{ __('content.projects') }}</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">@if ($projects_count == 0) {{__('content.not_yet_created')}} @else {{ $projects_count }} @endif</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-briefcase fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Homepage Version Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">{{ __('content.select') }}</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><a href="{{ url('admin/homepage-version') }}">{{ __('content.homepage_version') }}</a> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-home fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sections Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">{{ __('content.section') }}</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="{{ url('admin/section') }}">{{ __('content.enable_or_disable') }}</a></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-puzzle-piece  fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->


        <!-- DataTales -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="mt-2 font-weight-bold text-primary vertical-center-text">{{ __('content.blogs') }}</h6>
                <div class="float-right d-inline">
                    <a href="{{ url('admin/blog/add-blog') }}" class="btn btn-primary btn-round d-inline">
                        <i class="fa fa-plus"></i>
                        {{ __('content.add_blog') }}
                    </a>
                </div>

            </div>
            <div class="card-body">
                @if (count($blogs) > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th class="custom-width" scope="col">#</th>
                                <th>{{ __('content.image') }}</th>
                                <th>{{ __('content.title') }}</th>
                                <th>{{ __('content.post_date') }}</th>
                                <th>{{ __('content.view') }}</th>
                                <th>{{ __('content.status') }}</th>
                                <th class="custom-width-action">{{ __('content.action') }}</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th scope="col">#</th>
                                <th>{{ __('content.image') }}</th>
                                <th>{{ __('content.title') }}</th>
                                <th>{{ __('content.post_date') }}</th>
                                <th>{{ __('content.view') }}</th>
                                <th>{{ __('content.status') }}</th>
                                <th>{{ __('content.action') }}</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @php $i = 1; @endphp
                            @foreach ($blogs as $blog)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>
                                        @if ($blog->blog_image == '')
                                            <i class="far fa-image custom-font-size img-fluid"></i>
                                        @else
                                            <img class="image-size img-fluid" src="{{ asset('uploads/img/blog/'.$blog->blog_image) }}" alt="profile image">
                                        @endif
                                    </td>
                                    <td><a href="{{ url('blog/'.$blog->slug) }}" target="_blank">{{ $blog->title }}</a></td>
                                    <td>{{ Carbon\Carbon::parse($blog->created_at)->format('d.m.Y') }}</td>
                                    <td>{{ $blog->view }}</td>
                                    <td>
                                        @if ($blog->status == 0)
                                            <span class="badge badge-pill badge-danger">{{ __('content.disabled') }}</span>
                                        @else
                                            <span class="badge badge-pill badge-success">{{ __('content.enabled') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="form-button-action mx-auto">
                                            <a href="{{ route('blog.edit',$blog->id) }}" class="btn btn-primary">
                                                <i class="far fa-edit"></i> {{ __('content.edit') }}
                                            </a>
                                            <form class="d-inline-block" action="{{ route('blog.destroy', $blog->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <span data-toggle="modal" data-target="#deleteModel{{ $blog->id }}">
                                                            <button type="button" class="btn btn-danger margin-left-10">
                                                            <i class="far fa-trash-alt"></i> {{ __('content.delete') }}
                                                        </button>
                                                       </span>
                                                <!-- Modal -->
                                                <div class="modal fade" id="deleteModel{{ $blog->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('content.delete') }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                {{ __('content.you_wont_be_able_to_revert_this') }}
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('content.cancel') }}</button>
                                                                <button type="submit" class="btn btn-success">{{ __('content.yes_delete_it') }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                @else
                    {{ __('content.no_records_created_yet') }}
                @endif
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
