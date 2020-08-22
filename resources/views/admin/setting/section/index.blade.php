@extends('layouts.admin.master')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Include Alert Blade -->
    @include('admin.alert.alert')

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">{{ __('content.sections') }}</h1>

        <div class="row">

            <div class="col-lg-12">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('content.sections') }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        @foreach ($sections as $section)

                                <div class="col-md-3">
                                    <div class="card custom-card">
                                        <div class="card-header custom-header bg-light-grey">
                                            <h6>{{ $section->title  }} </h6>
                                        </div>
                                        <div class="card-body">
                                            <form  action="{{ route('section.update', $section->id) }}" method="POST">
                                                @method('PATCH')
                                                @csrf
                                                @if ($section->status == 1)
                                                    <button type="submit" class="btn btn-danger">
                                                        {{ __('content.disable') }}
                                                    </button>
                                                @else
                                                    <button type="submit" class="btn btn-success">
                                                        {{ __('content.enable') }}
                                                    </button>
                                                @endif
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <!-- /.container-fluid -->

@endsection
