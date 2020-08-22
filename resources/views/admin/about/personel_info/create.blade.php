@extends('layouts.admin.master')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Include Alert Blade -->
    @include('admin.alert.alert')

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">{{ __('content.personel_info') }}</h1>

        <div class="row">

            <div class="col-lg-12">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('content.personel_info') }}</h6>
                    </div>
                    <div class="card-body">
                        @if (isset($personel_info))
                            <form action="{{ route('personel-info.update', $personel_info->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="title">{{ __('content.title') }}</label>
                                            <input id="title" name="title" type="text" class="form-control" value="{{ $personel_info->title }}"  placeholder="{{ __('content.enter_title') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="desc">{{ __('content.description') }}</label>
                                            <textarea id="desc" name="desc" type="textarea" class="form-control" placeholder="{{ __('content.enter_description') }}">{{ $personel_info->desc }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="btn_name">{{ __('content.button_name') }}</label>
                                            <input id="btn_name" name="btn_name" type="text" class="form-control" value="{{ $personel_info->btn_name }}" placeholder="{{ __('content.enter_button_name') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="cv_file">{{ __('content.cv_file') }} (.pdf) <b>{{ $personel_info->cv_file }}</b></label>
                                            <input id="cv_file" name="cv_file" type="file" class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="btn_link_status">{{ __('content.button_link_status') }}</label>
                                            <select name="btn_link_status" class="form-control" id="btn_link_status">
                                                <option value="1" selected>{{ __('content.select_your_option') }}</option>
                                                <option value="1" {{ $personel_info->btn_link_status === 1 ? 'selected' : '' }}>{{ __('content.show') }}</option>
                                                <option value="0" {{ $personel_info->btn_link_status === 0 ? 'selected' : '' }}>{{ __('content.hide') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="profile_image">{{ __('content.image') }} ({{ __('content.size') }} 300x300)(.png, .jpg, .jpeg)</label>
                                            <input id="profile_image" name="profile_image" type="file" class="form-control-file">
                                            @if (!empty($personel_info->profile_image))
                                                <img src="{{ asset('uploads/img/personel_info/'.$personel_info->profile_image) }}" class="img-fluid image-size rounded-circle margin-top-20" alt="personel-info image">
                                            @else
                                                <img src="{{ asset('uploads/img/dummy/300x300.png') }}" class="img-fluid image-size rounded-circle margin-top-20" alt="personel-info image">
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
                            <form action="{{ route('personel-info.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="title">{{ __('content.title') }}</label>
                                            <input id="title" name="title" type="text" class="form-control" placeholder="{{ __('content.enter_title') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="desc">{{ __('content.description') }}</label>
                                            <textarea id="desc" name="desc" type="textarea" class="form-control" placeholder="{{ __('content.enter_description') }}"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="btn_name">{{ __('content.button_name') }}</label>
                                            <input id="btn_name" name="btn_name" type="text" class="form-control" placeholder="{{ __('content.enter_button_name') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="cv_file">{{ __('content.cv_file') }} (.pdf)</label>
                                            <input id="cv_file" name="cv_file" type="file" class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="btn_link_status">{{ __('Button Link Status') }}</label>
                                            <select name="btn_link_status" class="form-control" id="btn_link_status">
                                                <option value="1" selected>{{ __('content.select_your_option') }}</option>
                                                <option value="1">{{ __('content.show') }}</option>
                                                <option value="0">{{ __('content.hide') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="profile_image">{{ __('content.image') }} ({{ __('content.size') }} 300x300)(.png, .jpg, .jpeg)</label>
                                            <input id="profile_image" name="profile_image" type="file" class="form-control-file">
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

        <div class="row">
            <div class="col-lg-12">
                <!-- DataTales -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="mt-2 font-weight-bold text-primary vertical-center-text">{{ __('content.information_list') }}</h6>
                        <div class="float-right d-inline">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-round d-inline" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa fa-plus"></i>
                                {{ __('content.add_info') }}
                            </button>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{ __('content.new_info') }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('personel-info.store_info_list') }}" method="POST">
                                        @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">{{ __('content.name') }} <span class="text-red">*</span></label>
                                                    <input id="name" type="text" name="name" class="form-control" placeholder="{{ __('content.enter_name') }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="desc">{{ __('content.description') }} <span class="text-red">*</span></label>
                                                    <input id="desc" type="text" name="desc" class="form-control" placeholder="{{ __('content.enter_description') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group form-group-default">
                                                    <label for="order">{{ __('content.order') }}</label>
                                                    <input id="order" type="number" name="order" class="form-control" value="0" placeholder="{{ __('content.enter_order') }}">
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
                        @if (count($infos) > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th class="custom-width" scope="col">#</th>
                                        <th>{{ __('content.name') }}</th>
                                        <th>{{ __('content.description') }}</th>
                                        <th>{{ __('content.order') }}</th>
                                        <th class="custom-width-action">{{ __('content.action') }}</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>{{ __('content.name') }}</th>
                                        <th>{{ __('content.description') }}</th>
                                        <th>{{ __('content.order') }}</th>
                                        <th>{{ __('content.action') }}</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @php $i = 1; @endphp
                                    @foreach ($infos as $info)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $info->name }}</td>
                                            <td>{{ $info->desc }}</td>
                                            <td>{{ $info->order }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('personel-info.edit_info_list',$info->id) }}" class="btn btn-primary">
                                                        <i class="far fa-edit"></i> {{ __('content.edit') }}
                                                    </a>
                                                    <form class="d-inline-block" action="{{ route('personel-info.destroy_info_list', $info->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <span data-toggle="modal" data-target="#deleteModel{{ $info->id }}">
                                                            <button type="button" class="btn btn-danger margin-left-10">
                                                            <i class="far fa-trash-alt"></i> {{ __('content.delete') }}
                                                        </button>
                                                       </span>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="deleteModel{{ $info->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
