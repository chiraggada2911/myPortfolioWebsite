@extends('layouts.admin.master')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Include Alert Blade -->
    @include('admin.alert.alert')

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">{{ __('content.edit_item') }}</h1>

        <div class="row">

            <div class="col-lg-12">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('content.edit_item') }}</h6>
                    </div>
                    <div class="card-body">
                        <form  action="{{ route('project.update_item', $item->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <input name="project_id" type="hidden" value="{{ $project_id }}">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="name">{{ __('content.name') }}</label>
                                        <input id="name" type="text" name="name" class="form-control" value="{{ $item->name }}"  placeholder="{{ __('content.enter_name') }}">
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="desc">{{ __('content.description') }}</label>
                                        <textarea id="desc" name="desc" class="form-control" placeholder="{{ __('content.enter_description') }}">{{ $item->desc }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="order">{{ __('content.order') }}</label>
                                        <input id="order" type="number" name="order" class="form-control" value="{{ $item->order }}"  placeholder="{{ __('content.enter_order') }}">
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
