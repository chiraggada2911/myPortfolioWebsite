@extends('layouts.admin.master')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Include Alert Blade -->
    @include('admin.alert.alert')

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">{{ __('content.socials') }}</h1>

        <div class="row">
            <div class="col-lg-12">
                <!-- DataTales -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="mt-2 font-weight-bold text-primary vertical-center-text">{{ __('content.socials') }}</h6>
                        <div class="float-right d-inline">
                            <!-- Button trigger modal 2 -->
                            <button type="button" class="btn btn-primary btn-round d-inline" data-toggle="modal" data-target="#exampleModal1">
                                <i class="fa fa-plus"></i>
                                {{ __('content.add_social') }}
                            </button>
                        </div>

                        <!-- Modal 2 -->
                        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{ __('content.new_social') }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('social.store') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="social_media">{{ __('content.icon') }} <span class="text-red">*</span></label>
                                                        <select class="form-control" name="social_media" id="social_media" required>
                                                            <option value="" disabled selected>{{ __('content.select_your_option') }}</option>
                                                            <option value="fab fa-facebook-f">Facebook</option>
                                                            <option value="fab fa-twitter">Twitter</option>
                                                            <option value="fab fa-google-plus-g">Google Plus</option>
                                                            <option value="fab fa-youtube">Youtube</option>
                                                            <option value="fab fa-instagram">Instagram</option>
                                                            <option value="fab fa-vk">VK</option>
                                                            <option value="fab fa-weibo">Weibo</option>
                                                            <option value="fab fa-weixin">WeChat</option>
                                                            <option value="fab fa-meetup">Meetup</option>
                                                            <option value="fab fa-wikipedia-w">Wikipedia</option>
                                                            <option value="fab fa-quora">Quora</option>
                                                            <option value="fab fa-pinterest">Pinterest</option>
                                                            <option value="fab fa-dribbble">Dribbble</option>
                                                            <option value="fab fa-linkedin-in">Linkedin</option>
                                                            <option value="fab fa-behance-square">Behance</option>
                                                            <option value="fab fa-wordpress">WordPress</option>
                                                            <option value="fab fa-blogger-b">Blogger</option>
                                                            <option value="fab fa-whatsapp">Whatsapp</option>
                                                            <option value="fab fa-telegram">Telegram</option>
                                                            <option value="fab fa-skype">Skype</option>
                                                            <option value="fab fa-amazon">Amazon</option>
                                                            <option value="fab fa-stack-overflow">Stack Overflow</option>
                                                            <option value="fab fa-stack-exchange">Stack Exchange</option>
                                                            <option value="fab fa-github">Github</option>
                                                            <option value="fab fa-android">Android</option>
                                                            <option value="fab fa-vimeo-v">Vimeo</option>
                                                            <option value="fab fa-tumblr">Tumblr</option>
                                                            <option value="fab fa-vine">Vine</option>
                                                            <option value="fab fa-twitch">Twitch</option>
                                                            <option value="fab fa-flickr">Flickr</option>
                                                            <option value="fab fa-yahoo">Yahoo</option>
                                                            <option value="fab fa-reddit">Reddit</option>
                                                            <option value="fas fa-rss">Rss</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="link">{{__('content.link')}}</label>
                                                        <input id="link" type="text" name="link" class="form-control" placeholder="{{ __('content.enter_link') }}">
                                                    </div>
                                                </div>
                                                <div class="col-xl-12">
                                                    <div class="form-group">
                                                        <label for="status">{{ __('content.status') }}</label>
                                                        <select class="form-control" name="status" id="status">
                                                            <option value="1" selected>{{ __('content.select_your_option') }}</option>
                                                            <option value="1">{{ __('content.enable') }}</option>
                                                            <option value="0">{{ __('content.disable') }}</option>
                                                        </select>
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
                        @if (count($socials) > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th class="custom-width" scope="col">#</th>
                                        <th>{{ __('content.social_media') }}</th>
                                        <th>{{ __('content.link') }}</th>
                                        <th>{{ __('content.status') }}</th>
                                        <th class="custom-width-action">{{ __('content.action') }}</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>{{ __('content.social_media') }}</th>
                                        <th>{{ __('content.link') }}</th>
                                        <th>{{ __('content.status') }}</th>
                                        <th>{{ __('content.action') }}</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @php $i = 1; @endphp
                                    @foreach ($socials as $social)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td><i class="{{ $social->social_media }}"></i></td>
                                            <td>{{ $social->link }}</td>
                                            <td>
                                                <form action="{{ route('social.update_status', $social->id) }}" method="POST">
                                                    @method('PATCH')
                                                    @csrf
                                                    @if ($social->status == 1)
                                                        <button type="submit" class="btn btn-danger">
                                                            {{ __('content.disable') }}
                                                        </button>
                                                    @else
                                                        <button type="submit" class="btn btn-success">
                                                            {{ __('content.enable') }}
                                                        </button>
                                                    @endif
                                                </form>
                                            </td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('social.edit', $social->id) }}" class="btn btn-primary">
                                                        <i class="far fa-edit"></i> {{ __('content.edit') }}
                                                    </a>
                                                    <form class="d-inline-block" action="{{ route('social.destroy', $social->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <span data-toggle="modal" data-target="#deleteModel{{ $social->id }}">
                                                            <button type="button" class="btn btn-danger margin-left-10">
                                                            <i class="far fa-trash-alt"></i> {{ __('content.delete') }}
                                                        </button>
                                                       </span>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="deleteModel{{ $social->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
