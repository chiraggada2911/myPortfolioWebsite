@extends('layouts.admin.master')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Include Alert Blade -->
    @include('admin.alert.alert')

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">{{ __('content.counters') }}</h1>

        <div class="row">
            <div class="col-lg-12">
                <!-- DataTales -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="mt-2 font-weight-bold text-primary vertical-center-text">{{ __('content.counters') }}</h6>
                        <div class="float-right d-inline">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-round d-inline" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa fa-plus"></i>
                                {{ __('content.add_counter') }}
                            </button>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{ __('content.new_counter') }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('counter.store') }}" method="POST">
                                        @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="timer">{{ __('content.timer') }} <span class="text-red">*</span></label>
                                                    <input id="timer" type="number" name="timer" class="form-control" placeholder="{{ __('content.enter_timer') }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="desc">{{ __('content.description') }} <span class="text-red">*</span></label>
                                                    <input id="desc" type="text" name="desc" class="form-control" placeholder="{{ __('content.enter_description') }}" required>
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
                        @if (count($counters) > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th class="custom-width" scope="col">#</th>
                                        <th>{{ __('content.timer') }}</th>
                                        <th>{{ __('content.description') }}</th>
                                        <th>{{ __('content.order') }}</th>
                                        <th class="custom-width-action">{{ __('content.action') }}</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>{{ __('content.timer') }}</th>
                                        <th>{{ __('content.description') }}</th>
                                        <th>{{ __('content.order') }}</th>
                                        <th>{{ __('content.action') }}</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @php $i = 1; @endphp
                                    @foreach ($counters as $counter)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $counter->timer }}</td>
                                            <td>{{ $counter->desc }}</td>
                                            <td>{{ $counter->order }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('counter.edit', $counter->id) }}" class="btn btn-primary">
                                                        <i class="far fa-edit"></i> {{ __('content.edit') }}
                                                    </a>
                                                    <form class="d-inline-block" action="{{ route('counter.destroy', $counter->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <span data-toggle="modal" data-target="#deleteModel{{ $counter->id }}">
                                                            <button type="button" class="btn btn-danger margin-left-10">
                                                            <i class="far fa-trash-alt"></i> {{ __('content.delete') }}
                                                        </button>
                                                       </span>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="deleteModel{{ $counter->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('Delete') }}</h5>
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
