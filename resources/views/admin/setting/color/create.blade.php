@extends('layouts.admin.master')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Include Alert Blade -->
    @include('admin.alert.alert')

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">{{ __('content.color') }}</h1>

        <div class="row">

            <div class="col-lg-12">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('content.color') }}</h6>
                    </div>
                    <div class="card-body">
                        @if (isset($color))
                            <form action="{{ route('color.update', $color->id) }}" method="POST">
                                @method('PUT')
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="color">{{ __('content.color_code') }}</label>
                                            <input id="color" type="color"  name="color_code" value="{{ $color->color_code }}">                                       </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-success">
                                             {{ __('content.update') }}
                                        </button>
                                        <form class="d-inline-block" action="{{ route('color.destroy', $color->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <span data-toggle="modal" data-target="#deleteModel{{ $color->id }}">
                                                            <button type="button" class="btn btn-danger margin-left-10">
                                                            {{ __('content.ready_color_option') }}
                                                        </button>
                                                       </span>
                                            <!-- Modal -->
                                            <div class="modal fade" id="deleteModel{{ $color->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('content.delete') }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-center">
                                                            {{ __('content.this_color_option_will_be_deleted') }}
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
                                </div>
                            </form>
                        @else
                            <form  action="{{ route('color.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="color">{{ __('content.color_code') }}</label>
                                            <input id="color" type="color"  name="color_code" value="#e66465">                                       </div>
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
