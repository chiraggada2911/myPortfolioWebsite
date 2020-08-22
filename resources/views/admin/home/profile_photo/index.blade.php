@extends('layouts.admin.master')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Include Alert Blade -->
    @include('admin.alert.alert')

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">{{ __('content.profile_photos') }}</h1>

        <!-- DataTales -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="mt-2 font-weight-bold text-primary vertical-center-text">{{ __('content.profile_photos') }}</h6>
               <div class="float-right d-inline">
                  @if ($count > 0)
                       <form class="d-inline"  action="{{ route('profile-photo.all_update_status') }}" method="POST">
                           @csrf
                           @method('PATCH')
                           <button type="submit" class="btn btn-primary btn-round border-0">
                               <i class="fas fa-random"></i>
                               {{ __('content.random') }}
                           </button>
                       </form>
                      @endif
                   <a href="{{ url('admin/profile-photo/add-profile-photo') }}" class="btn btn-primary btn-round d-inline">
                       <i class="fa fa-plus"></i>
                       {{ __('content.add_photo') }}
                   </a>
               </div>

            </div>
            <div class="card-body">
                @if (count($profile_photos) > 0)
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th class="custom-width" scope="col">#</th>
                            <th>{{ __('content.image') }}</th>
                            <th>{{ __('content.status') }}</th>
                            <th class="custom-width-action">{{ __('content.action') }}</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th scope="col">#</th>
                            <th>{{ __('content.image') }}</th>
                            <th>{{ __('content.status') }}</th>
                            <th>{{ __('content.action') }}</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @php $i = 1; @endphp
                        @foreach ($profile_photos as $profile_photo)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>
                                    <img class="image-size img-fluid" src="{{ asset('uploads/img/profile_photo/'.$profile_photo->profile_image) }}" alt="profile image">
                                </td>
                                <td>
                                    <form action="{{ route('profile-photo.update_status', $profile_photo->id) }}" method="POST">
                                        @method('PATCH')
                                        @csrf
                                        @if ($profile_photo->status == 1)
                                            <button type="button" class="btn btn-danger disabled">
                                                {{ __('content.currently_showing') }}
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
                                        <a href="{{ route('profile-photo.edit',$profile_photo->id) }}" class="btn btn-primary">
                                            <i class="far fa-edit"></i> {{ __('content.edit') }}
                                        </a>
                                        <form class="d-inline-block" action="{{ route('profile-photo.destroy', $profile_photo->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <span data-toggle="modal" data-target="#deleteModel{{ $profile_photo->id }}">
                                                            <button type="button" class="btn btn-danger margin-left-10">
                                                            <i class="far fa-trash-alt"></i> {{ __('content.delete') }}
                                                        </button>
                                                       </span>
                                            <!-- Modal -->
                                            <div class="modal fade" id="deleteModel{{ $profile_photo->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
    <!-- /.container-fluid -->

@endsection
