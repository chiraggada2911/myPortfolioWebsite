@extends('layouts.admin.master')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Include Alert Blade -->
    @include('admin.alert.alert')

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">{{ __('content.projects') }}</h1>

        <div class="row">
            <div class="col-lg-12">
                <!-- DataTales -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="mt-2 font-weight-bold text-primary vertical-center-text">{{ __('content.projects') }}</h6>
                        <div class="float-right d-inline">

                            <!-- Button trigger modal 2 -->
                            <button type="button" class="btn btn-primary btn-round d-inline" data-toggle="modal" data-target="#exampleModal1">
                                <i class="fa fa-plus"></i>
                                {{ __('content.add_project') }}
                            </button>
                        </div>

                        <!-- Modal 2 -->
                        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{ __('content.new_project') }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('project.store') }}" method="POST">
                                        @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="project_name">{{ __('content.project_name') }} <span class="text-red">*</span></label>
                                                    <input id="project_name" type="text" name="project_name" class="form-control" placeholder="{{ __('content.enter_project_name') }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <fieldset class="form-group">
                                                    <div class="row">
                                                        <legend class="col-form-label col-sm-5 pt-0">{{ __('content.project_view_option') }} <span class="text-red">*</span></legend>
                                                        <div class="col-sm-7">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="project_view_option" id="gridRadios1" value="1" required>
                                                                <label class="form-check-label" for="gridRadios1">
                                                                   {{ __('content.image_view') }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="project_view_option" id="gridRadios2" value="2">
                                                                <label class="form-check-label" for="gridRadios2">
                                                                    {{ __('content.video_view') }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check disabled">
                                                                <input class="form-check-input" type="radio" name="project_view_option" id="gridRadios3" value="3">
                                                                <label class="form-check-label" for="gridRadios3">
                                                                   {{ __('content.slider_view') }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="order">{{ __('content.order') }}</label>
                                                    <input id="order" type="number" name="order" class="form-control" value="0">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="spinner fa fa-spinner fa-spin"></i> {{ __('content.add') }}
                                        </button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('content.close') }}</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (count($projects) > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th class="custom-width" scope="col">#</th>
                                        <th>{{ __('content.project_name') }}</th>
                                        <th>{{ __('content.project_feature') }}</th>
                                        <th>{{ __('content.item_status') }}</th>
                                        <th>{{ __('content.status') }}</th>
                                        <th>{{ __('content.order') }}</th>
                                        <th class="custom-width-action">{{ __('content.action') }}</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>{{ __('content.project_name') }}</th>
                                        <th>{{ __('content.project_feature') }}</th>
                                        <th>{{ __('content.item_status') }}</th>
                                        <th>{{ __('content.status') }}</th>
                                        <th>{{ __('content.order') }}</th>
                                        <th>{{ __('content.action') }}</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @php $i = 1; @endphp
                                    @foreach ($projects as $project)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $project->project_name }}</td>
                                            <td>
                                                @if ($project->item_status == 1)
                                                    <a href="{{ route('project.create_item',$project->id) }}" class="btn btn-primary">
                                                        <i class="fas fa-list-ul"></i>
                                                        {{ __('content.add_item') }}
                                                    </a>
                                                    @endif
                                                @if ($project->image_status == 1)
                                                    <a href="{{ route('project.create_image',$project->id) }}" class="btn btn-primary">
                                                        <i class="far fa-image"></i>
                                                        {{ __('content.add_image') }}
                                                    </a>
                                                @elseif ($project->video_status == 1)
                                                    <a href="{{ route('project.create_video',$project->id) }}" class="btn btn-primary">
                                                        <i class="fab fa-youtube"></i>
                                                       {{ __('content.add_video') }}
                                                    </a>
                                                @elseif ($project->slider_status == 1)
                                                    <a href="{{ route('project.create_slider',$project->id) }}" class="btn btn-primary">
                                                        <i class="far fa-images"></i>
                                                        {{__('content.add_slider')}}
                                                    </a>
                                                @endif

                                            </td>
                                            <td>
                                                @if ($project->item_status == 0)
                                                    <span class="badge badge-pill badge-danger">{{ __('content.disabled') }}</span>
                                                    @else
                                                    <span class="badge badge-pill badge-success">{{ __('content.enabled') }}</span>
                                                    @endif
                                            </td>
                                            <td>
                                                @if ($project->status == 0)
                                                    <span class="badge badge-pill badge-danger">{{ __('content.disabled') }}</span>
                                                @else
                                                    <span class="badge badge-pill badge-success">{{ __('content.enabled') }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $project->order }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('project.edit',$project->id) }}" class="btn btn-primary">
                                                        <i class="far fa-edit"></i> {{ __('content.edit') }}
                                                    </a>
                                                    <form class="d-inline-block" action="{{ route('project.destroy', $project->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <span data-toggle="modal" data-target="#deleteModel{{ $project->id }}">
                                                            <button type="button" class="btn btn-danger margin-left-10">
                                                            <i class="far fa-trash-alt"></i> {{ __('content.delete') }}
                                                        </button>
                                                       </span>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="deleteModel{{ $project->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection
