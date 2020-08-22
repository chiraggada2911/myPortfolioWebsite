@extends('layouts.admin.master')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Include Alert Blade -->
    @include('admin.alert.alert')

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">{{ __('content.homepage_version') }}</h1>

        <div class="row">

            <div class="col-lg-12">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('content.homepage_version') }}</h6>
                    </div>
                    <div class="card-body">
                        @if (isset($homepage_version))
                            <form action="{{ route('homepage-version.update', $homepage_version->id) }}" method="POST">
                                @method('PUT')
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="hiddenradio">
                                            <label>
                                                <input type="radio" name="choose_version" value="0" {{ ($homepage_version->choose_version == 0)? "checked" : "" }}>
                                                <img class="img-fluid shadow" src="{{ asset('uploads/img/dummy/dark.jpg') }}" alt="dark image">
                                            </label>
                                            <span>{{ __('content.dark') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="hiddenradio">
                                            <label>
                                                <input type="radio" name="choose_version" value="1" {{ ($homepage_version->choose_version == 1)? "checked" : "" }}>
                                                <img class="img-fluid shadow" src="{{ asset('uploads/img/dummy/light.jpg') }}" alt="light image">
                                            </label>
                                            <span>{{ __('content.light') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="hiddenradio">
                                            <div class="text-center">
                                                <label>
                                                    <input type="radio" name="color" value="0" {{ ($homepage_version->color == 0)? "checked" : "" }}>
                                                    <img class="img-fluid" src="{{ asset('uploads/img/dummy/yellow.png') }}" alt="color image" title="yellow">
                                                </label>
                                                <label>
                                                    <input type="radio" name="color" value="1" {{ ($homepage_version->color == 1)? "checked" : "" }}>
                                                    <img class="img-fluid" src="{{ asset('uploads/img/dummy/purple.png') }}" alt="color image" title="purple">
                                                </label>
                                                <label>
                                                    <input type="radio" name="color" value="2" {{ ($homepage_version->color == 2)? "checked" : "" }}>
                                                    <img class="img-fluid" src="{{ asset('uploads/img/dummy/red.png') }}" alt="color image" title="red">
                                                </label>
                                                <label>
                                                    <input type="radio" name="color" value="3" {{ ($homepage_version->color == 3)? "checked" : "" }}>
                                                    <img class="img-fluid" src="{{ asset('uploads/img/dummy/blueviolet.png') }}" alt="color image" title="blueviolet">
                                                </label>
                                                <label>
                                                    <input type="radio" name="color" value="4" {{ ($homepage_version->color == 4)? "checked" : "" }}>
                                                    <img class="img-fluid" src="{{ asset('uploads/img/dummy/blue.png') }}" alt="color image" title="blue">
                                                </label>
                                                <label>
                                                    <input type="radio" name="color" value="5" {{ ($homepage_version->color == 5)? "checked" : "" }}>
                                                    <img class="img-fluid" src="{{ asset('uploads/img/dummy/goldenrod.png') }}" alt="color image" title="goldenrod">
                                                </label>
                                                <label>
                                                    <input type="radio" name="color" value="6" {{ ($homepage_version->color == 6)? "checked" : "" }}>
                                                    <img class="img-fluid" src="{{ asset('uploads/img/dummy/magenta.png') }}" alt="color image" title="magenta">
                                                </label>
                                                <label>
                                                    <input type="radio" name="color" value="7" {{ ($homepage_version->color == 7)? "checked" : "" }}>
                                                    <img class="img-fluid" src="{{ asset('uploads/img/dummy/yellowgreen.png') }}" alt="color image" title="yellowgreen">
                                                </label>
                                                <label>
                                                    <input type="radio" name="color" value="8" {{ ($homepage_version->color == 8)? "checked" : "" }}>
                                                    <img class="img-fluid" src="{{ asset('uploads/img/dummy/orange.png') }}" alt="color image" title="orange">
                                                </label>
                                                <label>
                                                    <input type="radio" name="color" value="9" {{ ($homepage_version->color == 9)? "checked" : "" }}>
                                                    <img class="img-fluid" src="{{ asset('uploads/img/dummy/green.png') }}" alt="color image" title="green">
                                                </label>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-success margin-top-15">
                                            {{ __('content.choose_version') }}
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
