@extends('layouts.admin.master')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Include Alert Blade -->
    @include('admin.alert.alert')

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">{{ __('content.contact_info') }}</h1>

        <div class="row">

            <div class="col-lg-12">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('content.contact_info') }}</h6>
                    </div>
                    <div class="card-body">
                        @if (isset($contact))
                            <form action="{{ route('contact.update', $contact->id) }}" method="POST">
                                @method('PUT')
                                @csrf

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="title_bg_name">{{ __('content.title_background_name') }}</label>
                                            <input id="title_bg_name" name="title_bg_name" type="text" class="form-control" value="{{ $contact->title_bg_name }}"  placeholder="{{ __('content.enter_title_background') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="title">{{ __('content.title') }}  <span class="text-red">*</span></label>
                                            <input id="title" name="title" type="text" class="form-control" value="{{ $contact->title }}" placeholder="{{ __('content.enter_title') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="custom_title">{{ __('content.custom_title') }}</label>
                                            <input id="custom_title" name="custom_title" type="text" class="form-control" value="{{ $contact->custom_title }}" placeholder="{{ __('content.enter_custom_title') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="desc">{{ __('content.description') }}</label>
                                            <textarea id="desc" name="desc" type="textarea" class="form-control" placeholder="{{ __('content.enter_description') }}">{{ $contact->desc }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email_title">{{ __('content.email_title') }}</label>
                                            <input id="email_title" name="email_title" type="text" class="form-control" value="{{ $contact->email_title }}" placeholder="{{ __('content.enter_email_title') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">{{ __('content.email') }}</label>
                                            <input id="email" name="email" type="text" class="form-control" value="{{ $contact->email }}" placeholder="{{ __('content.enter_email') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone_title">{{ __('content.phone_title') }}</label>
                                            <input id="phone_title" name="phone_title" type="text" class="form-control" value="{{ $contact->phone_title }}" placeholder="{{ __('content.enter_phone_title') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">{{ __('content.phone_number') }}</label>
                                            <input id="phone" name="phone" type="text" class="form-control" value="{{ $contact->phone }}" placeholder="{{ __('content.enter_phone') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address_title">{{ __('content.address_title') }}</label>
                                            <input id="address_title" name="address_title" type="text" class="form-control" value="{{ $contact->address_title }}" placeholder="{{ __('content.enter_address_title') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address">{{ __('content.address') }}</label>
                                            <input id="address" name="address" type="text" class="form-control" value="{{ $contact->address }}" placeholder="{{ __('content.enter_address') }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-success">
                                            <i class="spinner fa fa-spinner fa-spin"></i> {{ __('content.update') }}
                                        </button>
                                    </div>
                                </div>

                            </form>
                        @else
                            <form  action="{{ route('contact.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="title_bg_name">{{ __('content.title_background_name') }}</label>
                                            <input id="title_bg_name" name="title_bg_name" type="text" class="form-control" placeholder="{{ __('content.enter_title_background') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="title">{{ __('content.title') }}  <span class="text-red">*</span></label>
                                            <input id="title" name="title" type="text" class="form-control" placeholder="{{ __('content.enter_title') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="custom_title">{{ __('content.custom_title') }}</label>
                                            <input id="custom_title" name="custom_title" type="text" class="form-control" placeholder="{{ __('content.enter_custom_title') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="desc">{{ __('content.description') }}</label>
                                            <textarea id="desc" name="desc" type="textarea" class="form-control" placeholder="{{ __('content.enter_description') }}"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email_title">{{ __('content.email_title') }}</label>
                                            <input id="email_title" name="email_title" type="text" class="form-control" placeholder="{{ __('content.enter_email_title') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">{{ __('content.email') }}</label>
                                            <input id="email" name="email" type="text" class="form-control" placeholder="{{ __('content.enter_email') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone_title">{{ __('content.phone_title') }}</label>
                                            <input id="phone_title" name="phone_title" type="text" class="form-control" placeholder="{{ __('content.enter_phone_title') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">{{ __('content.phone_number') }}</label>
                                            <input id="phone" name="phone" type="text" class="form-control" placeholder="{{ __('content.enter_phone') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address_title">{{ __('content.address_title') }}</label>
                                            <input id="address_title" name="address_title" type="text" class="form-control" placeholder="{{ __('content.enter_address_title') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address">{{ __('content.address') }}</label>
                                            <input id="address" name="address" type="text" class="form-control" placeholder="{{ __('content.enter_address') }}">
                                        </div>
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
