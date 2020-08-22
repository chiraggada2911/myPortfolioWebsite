@extends('layouts.admin.master')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Include Alert Blade -->
    @include('admin.alert.alert')

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">{{ __('content.experience_and_education') }}</h1>

        <div class="row">
            <div class="col-lg-12">
                <!-- DataTales -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="mt-2 font-weight-bold text-primary vertical-center-text">{{ __('content.educations') }}</h6>
                        <div class="float-right d-inline">
                            <!-- Button trigger modal 1 -->
                            <button type="button" class="btn btn-primary btn-round d-inline" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-puzzle-piece"></i>
                            </button>

                            <!-- Button trigger modal 2 -->
                            <button type="button" class="btn btn-primary btn-round d-inline" data-toggle="modal" data-target="#exampleModal1">
                                <i class="fa fa-plus"></i>
                                {{ __('content.add_education_list') }}
                            </button>
                        </div>
                        <!-- Modal 1 -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{ __('content.education_title_desc') }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @if (isset($education))
                                        <form action="{{ route('education.update', $education->id) }}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="title">{{ __('content.title') }}</label>
                                                        <input id="title" type="text" name="title" class="form-control" value="{{ $education->title }}" placeholder="{{ __('content.enter_title') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="desc">{{ __('content.description') }}</label>
                                                        <textarea id="desc"  name="desc" class="form-control" placeholder="{{ __('content.enter_description') }}">{{ $education->desc }}</textarea>
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
                                    <form action="{{ route('education.store') }}" method="POST">
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
                                        <h5 class="modal-title" id="exampleModalLabel">{{ __('content.new_education_list') }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('education-list.store') }}" method="POST">
                                        @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="year_range">{{ __('content.year_range') }}</label>
                                                    <input id="year_range" type="text" name="year_range" class="form-control" placeholder="{{ __('content.enter_year') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="degree">{{ __('content.degree') }}</label>
                                                    <input id="degree" type="text" name="degree" class="form-control" placeholder="{{ __('content.enter_degree') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="school">{{ __('content.school') }}</label>
                                                    <input id="school" type="text" name="school" class="form-control" placeholder="{{ __('content.enter_school') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="desc2">{{ __('content.description') }}</label>
                                                    <textarea id="desc2" name="desc" class="form-control" placeholder="{{ __('content.enter_description') }}"></textarea>
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
                        @if (count($education_lists) > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th  class="custom-width" scope="col">#</th>
                                        <th>{{ __('content.year_range') }}</th>
                                        <th>{{ __('content.degree') }}</th>
                                        <th>{{ __('content.school') }}</th>
                                        <th>{{ __('content.description') }}</th>
                                        <th>{{ __('content.order') }}</th>
                                        <th  class="custom-width-action">{{ __('content.action') }}</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>{{ __('content.year_range') }}</th>
                                        <th>{{ __('content.degree') }}</th>
                                        <th>{{ __('content.school') }}</th>
                                        <th>{{ __('content.description') }}</th>
                                        <th>{{ __('content.order') }}</th>
                                        <th>{{ __('content.action') }}</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @php $i = 1; @endphp
                                    @foreach ($education_lists as $education_list)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $education_list->year_range }}</td>
                                            <td>{{ $education_list->degree }}</td>
                                            <td>{{ $education_list->school }}</td>
                                            <td>{{ $education_list->desc }}</td>
                                            <td>{{ $education_list->order }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('education-list.edit',$education_list->id) }}" class="btn btn-primary">
                                                        <i class="far fa-edit"></i> {{ __('content.edit') }}
                                                    </a>
                                                    <form class="d-inline-block" action="{{ route('education-list.destroy', $education_list->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <span data-toggle="modal" data-target="#deleteModel{{ $education_list->id }}">
                                                            <button type="button" class="btn btn-danger margin-left-10">
                                                            <i class="far fa-trash-alt"></i> {{ __('content.delete') }}
                                                        </button>
                                                       </span>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="deleteModel{{ $education_list->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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

        <div class="row">
            <div class="col-lg-12">
                <!-- DataTales -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="mt-2 font-weight-bold text-primary vertical-center-text">{{ __('content.experiences') }}</h6>
                        <div class="float-right d-inline">

                            <!-- Button trigger modal 3 -->
                            <button type="button" class="btn btn-primary btn-round d-inline" data-toggle="modal" data-target="#exampleModal3">
                                <i class="fa fa-plus"></i>
                                {{ __('content.add_experience_list') }}
                            </button>
                        </div>

                       <!-- Modal 3 -->
                        <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{ __('content.new_experience_list') }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('experience-list.store') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="year_range1">{{ __('content.year_range') }}</label>
                                                        <input id="year_range1" type="text" name="year_range" class="form-control" placeholder="{{ __('content.enter_year') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="job">{{ __('content.job') }}</label>
                                                        <input id="job" type="text" name="job" class="form-control" placeholder="{{ __('content.enter_job') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="company">{{ __('content.company') }}</label>
                                                        <input id="company" type="text" name="company" class="form-control" placeholder="{{ __('content.enter_company') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="desc1">{{ __('content.description') }}</label>
                                                        <textarea id="desc1" name="desc" class="form-control" placeholder="{{ __('content.enter_description') }}"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="order1">{{ __('content.order') }}</label>
                                                        <input id="order1" type="number" name="order" class="form-control" value="0">
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
                        @if (count($experience_lists) > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th class="custom-width" scope="col">#</th>
                                        <th>{{ __('content.year_range') }}</th>
                                        <th>{{ __('content.job') }}</th>
                                        <th>{{ __('content.company') }}</th>
                                        <th>{{ __('content.description') }}</th>
                                        <th>{{ __('content.order') }}</th>
                                        <th  class="custom-width-action">{{ __('content.action') }}</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>{{ __('content.year_range') }}</th>
                                        <th>{{ __('content.job') }}</th>
                                        <th>{{ __('content.company') }}</th>
                                        <th>{{ __('content.description') }}</th>
                                        <th>{{ __('content.order') }}</th>
                                        <th>{{ __('content.action') }}</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @php $i = 1; @endphp
                                    @foreach ($experience_lists as $experience_list)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $experience_list->year_range }}</td>
                                            <td>{{ $experience_list->job }}</td>
                                            <td>{{ $experience_list->company }}</td>
                                            <td>{{ $experience_list->desc }}</td>
                                            <td>{{ $experience_list->order }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('experience-list.edit',$experience_list->id) }}" class="btn btn-primary">
                                                        <i class="far fa-edit"></i> {{ __('content.edit') }}
                                                    </a>
                                                    <form class="d-inline-block" action="{{ route('experience-list.destroy', $experience_list->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <span data-toggle="modal" data-target="#deleteModel{{ $experience_list->id }}">
                                                            <button type="button" class="btn btn-danger margin-left-10">
                                                            <i class="far fa-trash-alt"></i> {{ __('content.delete') }}
                                                        </button>
                                                       </span>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="deleteModel{{ $experience_list->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
