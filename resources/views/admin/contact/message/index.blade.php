@extends('layouts.admin.master')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">{{ __('content.messages') }}</h1>

        <div class="row">
            <div class="col-lg-12">
                <!-- DataTales -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="mt-2 font-weight-bold text-primary vertical-center-text">{{ __('content.messages') }}</h6>
                        <div class="float-right d-inline">
                            <form class="d-block  ml-auto" action="{{ route('message.mark_all_read_update') }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-primary btn-round d-inline">
                                    <i class="fas fa-bookmark"></i> {{ __('content.mark_all_as_read') }}
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (count($messages) > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th class="custom-width" scope="col">#</th>
                                        <th>{{ __('content.name') }}</th>
                                        <th>{{ __('content.email') }}</th>
                                        <th>{{ __('content.subject') }}</th>
                                        <th>{{ __('content.message') }}</th>
                                        <th>{{ __('content.read_status') }}</th>
                                        <th class="custom-width-action">{{ __('content.action') }}</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>{{ __('content.name') }}</th>
                                        <th>{{ __('contnet.email') }}</th>
                                        <th>{{ __('content.subject') }}</th>
                                        <th>{{ __('content.message') }}</th>
                                        <th>{{ __('content.read_status') }}</th>
                                        <th>{{ __('content.action') }}</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @php $i = 1; @endphp
                                    @foreach ($messages as $message)
                                        <tr>
                                            <th>{{ $i++ }}</th>
                                            <td>{{ $message->name }}</td>
                                            <td><a href="mailto:{{ $message->email }}">{{ $message->email }}</a> </td>
                                            <td>{{ $message->subject }}</td>
                                            <td>{{ $message->message }}</td>
                                            <td>
                                                @if($message->read === 0)
                                                    <span>{{ __('content.unread') }}</span>
                                                @else
                                                    <span>{{ __('content.read') }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="form-button-action">
                                                    @if ($message->read === 0)
                                                        <form class="d-block" action="{{ route('message.destroy', $message->id) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" data-toggle="tooltip"  class="btn btn-primary" data-original-title="{{ __('content.mark') }}">
                                                                <i class="fas fa-bookmark"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                    <form class="d-inline-block" action="{{ route('message.destroy', $message->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <span data-toggle="modal" data-target="#deleteModel{{ $message->id }}">
                                                    <button type="button" class="btn btn-danger margin-left-10">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                 </span>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="deleteModel{{ $message->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
