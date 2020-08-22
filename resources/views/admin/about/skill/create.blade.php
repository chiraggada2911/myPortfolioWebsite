@extends('layouts.admin.master')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Include Alert Blade -->
    @include('admin.alert.alert')

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">{{ __('content.skills') }}</h1>

        <div class="row">
            <div class="col-lg-12">
                <!-- DataTales -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="mt-2 font-weight-bold text-primary vertical-center-text">{{ __('content.skills') }}</h6>
                        <div class="float-right d-inline">
                            <!-- Button trigger modal 1 -->
                            <button type="button" class="btn btn-primary btn-round d-inline" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-puzzle-piece"></i>
                            </button>

                            <!-- Button trigger modal 2 -->
                            <button type="button" class="btn btn-primary btn-round d-inline" data-toggle="modal" data-target="#exampleModal1">
                                <i class="fa fa-plus"></i>
                                {{ __('content.add_skill_list') }}
                            </button>
                        </div>
                        <!-- Modal 1 -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{ __('content.skill_title_desc') }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @if (isset($skill))
                                        <form action="{{ route('skill.update', $skill->id) }}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="title">{{ __('content.title') }}</label>
                                                        <input id="title" type="text" name="title" class="form-control" value="{{ $skill->title }}" placeholder="{{ __('content.enter_title') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="desc">{{ __('content.description') }}</label>
                                                        <textarea id="desc"  name="desc" class="form-control" placeholder="{{ __('content.enter_description') }}">{{ $skill->desc }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="spinner fa fa-spinner fa-spin"></i> {{ __('content.update') }}
                                                </button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('content.close') }}</button>
                                            </div>
                                        </form>
                                            @else
                                    <form action="{{ route('skill.store') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="title">{{ __('content.title') }}</label>
                                                        <input id="title" type="text" name="title" class="form-control" placeholder="{{ __('content.enter_title') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="desc">{{ __('content.description') }}</label>
                                                        <textarea id="desc"  name="desc" class="form-control" placeholder="{{ __('content.enter_description') }}"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="spinner fa fa-spinner fa-spin"></i> {{ __('content.create') }}
                                            </button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('content.close') }}</button>
                                        </div>
                                    </form>
                                        @endif
                                </div>
                            </div>
                        </div>

                        <!-- Modal 2 -->
                        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{ __('content.new_skill_list') }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('skill-list.store') }}" method="POST">
                                        @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                               <div class="form-group">
                                                   <label for="percent">{{ __('content.percent_rate') }} <span class="text-red">*</span></label>
                                                   <div class="input-group">
                                                       <div class="input-group-prepend">
                                                           <span class="input-group-text" id="inputGroupPrepend">%</span>
                                                       </div>
                                                       <input id="percent"  type="number" name="percent" class="form-control" placeholder="{{ __('content.enter_percent') }}" required>
                                                   </div>
                                               </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="title1">{{ __('content.title') }} <span class="text-red">*</span></label>
                                                    <input id="title1" type="text" name="title" class="form-control" placeholder="{{ __('content.enter_title') }}" required>
                                                </div>
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
                        @if (count($skill_lists) > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th class="custom-width" scope="col">#</th>
                                        <th>{{ __('content.percent') }}</th>
                                        <th>{{ __('content.title') }}</th>
                                        <th>{{ __('content.order') }}</th>
                                        <th class="custom-width-action">{{ __('content.action') }}</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>{{ __('content.percent') }}</th>
                                        <th>{{ __('content.title') }}</th>
                                        <th>{{ __('content.order') }}</th>
                                        <th>{{ __('content.action') }}</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @php $i = 1; @endphp
                                    @foreach ($skill_lists as $skill_list)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $skill_list->percent }}</td>
                                            <td>{{ $skill_list->title }}</td>
                                            <td>{{ $skill_list->order }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('skill-list.edit',$skill_list->id) }}" class="btn btn-primary">
                                                        <i class="far fa-edit"></i> {{ __('content.edit') }}
                                                    </a>
                                                    <form class="d-inline-block" action="{{ route('skill-list.destroy', $skill_list->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <span data-toggle="modal" data-target="#deleteModel{{ $skill_list->id }}">
                                                            <button type="button" class="btn btn-danger margin-left-10">
                                                            <i class="far fa-trash-alt"></i> {{ __('content.delete') }}
                                                        </button>
                                                       </span>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="deleteModel{{ $skill_list->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
