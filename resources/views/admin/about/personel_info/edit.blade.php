@extends('layouts.admin.master')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Include Alert Blade -->
    @include('admin.alert.alert')

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">{{ __('content.edit_info_list') }}</h1>

        <div class="row">

            <div class="col-lg-12">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('content.edit_info_list') }}</h6>
                    </div>
                    <div class="card-body">
                        <form  action="{{ route('personel-info.update_info_list', $info->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="name">{{ __('content.name') }} <span class="text-red">*</span></label>
                                        <input id="name" type="text" name="name" class="form-control" value="{{ $info->name }}"  placeholder="{{ __('content.enter_name') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="desc">{{ __('content.description') }} <span class="text-red">*</span></label>
                                        <input id="desc" type="text" name="desc" class="form-control"  value="{{ $info->desc }}"  placeholder="{{ __('content.enter_description') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="order">{{ __('content.order') }}</label>
                                        <input id="order" type="number" name="order" class="form-control" value="{{ $info->order }}"  placeholder="{{ __('content.enter_order') }}">
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
