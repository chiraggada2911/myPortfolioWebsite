@extends('layouts.admin.master')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Include Alert Blade -->
    @include('admin.alert.alert')

        @if (isset($education_list))
            <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">{{ __('content.edit_education') }}</h1>

                <div class="row">

                    <div class="col-lg-12">

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">{{ __('content.edit_education') }}</h6>
                            </div>
                            <div class="card-body">
                                <form  action="{{ route('education-list.update', $education_list->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="year_range">{{ __('content.year_range') }}</label>
                                                <input id="year_range" type="text" name="year_range" class="form-control"  value="{{ $education_list->year_range }}"  placeholder="{{ __('content.enter_year') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="degree">{{ __('content.degree') }}</label>
                                                <input id="degree" type="text" name="degree" class="form-control"  value="{{ $education_list->degree }}"  placeholder="{{ __('content.enter_degree') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="school">{{ __('content.school') }}</label>
                                                <input id="school" type="text" name="school" class="form-control"  value="{{ $education_list->school }}"  placeholder="{{ __('content.enter_school') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="desc">{{ __('content.description') }}</label>
                                                <textarea id="desc"  name="desc" class="form-control"  placeholder="{{ __('content.enter_description') }}">{{ $education_list->desc }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="order">{{ __('content.order') }}</label>
                                                <input id="order" type="number" name="order" class="form-control" value="{{ $education_list->order }}"  placeholder="{{ __('content.enter_order') }}">
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
            @else
            <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">{{ __('content.edit_experience') }}</h1>

                <div class="row">

                    <div class="col-lg-12">

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">{{ __('content.edit_experience') }}</h6>
                            </div>
                            <div class="card-body">
                                <form  action="{{ route('experience-list.update', $experience_list->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="year_range">{{ __('content.year_range') }}</label>
                                                <input id="year_range" type="text" name="year_range" class="form-control"  value="{{ $experience_list->year_range }}"  placeholder="{{ __('content.enter_year') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="job">{{ __('content.job') }}</label>
                                                <input id="job" type="text" name="job" class="form-control"  value="{{ $experience_list->job }}"  placeholder="{{ __('content.enter_job') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="company">{{ __('content.company') }}</label>
                                                <input id="company" type="text" name="company" class="form-control"  value="{{ $experience_list->company }}"  placeholder="{{ __('content.enter_company') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="desc">{{ __('content.description') }}</label>
                                                <textarea id="desc"  name="desc" class="form-control"  placeholder="{{ __('content.enter_description') }}">{{ $experience_list->desc }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="order">{{ __('content.order') }}</label>
                                                <input id="order" type="number" name="order" class="form-control" value="{{ $experience_list->order }}"  placeholder="{{ __('content.enter_order') }}">
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
        @endif

    </div>
    <!-- /.container-fluid -->

@endsection
