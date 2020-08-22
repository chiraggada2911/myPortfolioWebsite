<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    @if(!empty($site_info->favicon))
        <link href="{{ asset('uploads/img/icon/'.$site_info->favicon) }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
        <link href="{{ asset('uploads/img/icon/'.$site_info->favicon) }}" sizes="128x128" rel="shortcut icon" />
    @else
        <link href="{{ asset('uploads/img/dummy/blue.png') }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
        <link href="{{ asset('uploads/img/dummy/blue.png') }}" sizes="128x128" rel="shortcut icon" />
@endif

    <!-- Fonts -->
    <link href="{{ asset('assets/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{ asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <!-- Summernote Css -->
    <link href="{{ asset('assets/admin/css/summernote-bs4.min.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet">

</head>
<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('admin/dashboard') }}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-grin-hearts"></i>
            </div>
            <div class="sidebar-brand-text mx-3">
                @if(isset($site_info))
                    {{ $site_info->panel_name }}
                @else
                    FOFO
                @endif
            </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>{{ __('menu.dashboard') }}</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            {{ __('menu.interface') }}
        </div>

        <!-- Nav Item - Home Collapse Menu -->
        <li class="nav-item {{ (request()->is('admin/profile-photo') ||
                                   request()->is('admin/content') ||
                                   request()->is('admin/profile-photo/add-profile-photo') ||
                                   request()->is('admin/*/edit-profile-photo')) ? 'active' : '' }}">
            <a class="nav-link {{ (request()->is('admin/profile-photo') ||
                                   request()->is('admin/content') ||
                                   request()->is('admin/profile-photo/add-profile-photo') ||
                                   request()->is('admin/*/edit-profile-photo')) ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-home"></i>
                <span>{{ __('menu.home') }}</span>
            </a>
            <div id="collapseTwo" class="collapse {{ (request()->is('admin/profile-photo') ||
                                                      request()->is('admin/content') ||
                                                      request()->is('admin/profile-photo/add-profile-photo') ||
                                                      request()->is('admin/*/edit-profile-photo')) ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">{{ __('menu.homepage') }}</h6>
                    <a class="collapse-item  {{ (request()->is('admin/profile-photo') ||
                                                 request()->is('admin/profile-photo/add-profile-photo') ||
                                                 request()->is('admin/*/edit-profile-photo')) ? 'active' : '' }}" href="{{ url('/admin/profile-photo') }}">{{ __('menu.profile_photos') }}</a>
                    <a class="collapse-item {{  (request()->is('admin/content')) ? 'active' : '' }}" href="{{ url('admin/content') }}">{{ __('menu.content') }}</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - About Collapse Menu -->
        <li class="nav-item {{ (request()->is('admin/about-me') ||
                                   request()->is('admin/personel-info') ||
                                   request()->is('admin/counter') ||
                                   request()->is('admin/skill') ||
                                   request()->is('admin/education') ||
                                   request()->is('admin/skill-list') ||
                                   request()->is('admin/education-list') ||
                                   request()->is('admin/experience-list') ||
                                   request()->is('admin/info-list') ||
                                   request()->is('admin/*/edit-skill-list') ||
                                   request()->is('admin/*/edit-education-list') ||
                                   request()->is('admin/*/edit-experience-list') ||
                                   request()->is('admin/*/edit-counter') ||
                                   request()->is('admin/*/personel-info')) ? 'active' : '' }}">
            <a class="nav-link {{ (request()->is('admin/about-me') ||
                                   request()->is('admin/personel-info') ||
                                   request()->is('admin/counter') ||
                                   request()->is('admin/skill') ||
                                   request()->is('admin/education') ||
                                   request()->is('admin/skill-list') ||
                                   request()->is('admin/education-list') ||
                                   request()->is('admin/experience-list') ||
                                   request()->is('admin/info-list') ||
                                   request()->is('admin/*/edit-skill-list') ||
                                   request()->is('admin/*/edit-education-list') ||
                                   request()->is('admin/*/edit-experience-list') ||
                                   request()->is('admin/*/edit-counter') ||
                                   request()->is('admin/*/personel-info')) ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-address-card"></i>
                <span>{{ __('menu.about') }}</span>
            </a>
            <div id="collapseUtilities" class="collapse {{ (request()->is('admin/about-me') ||
                                   request()->is('admin/personel-info') ||
                                   request()->is('admin/counter') ||
                                   request()->is('admin/skill') ||
                                   request()->is('admin/education') ||
                                   request()->is('admin/skill-list') ||
                                   request()->is('admin/education-list') ||
                                   request()->is('admin/experience-list') ||
                                   request()->is('admin/info-list') ||
                                   request()->is('admin/*/edit-skill-list') ||
                                   request()->is('admin/*/edit-education-list') ||
                                   request()->is('admin/*/edit-experience-list') ||
                                   request()->is('admin/*/edit-counter') ||
                                   request()->is('admin/*/personel-info')) ? 'show' : '' }}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">{{ __('menu.about_page') }}</h6>
                    <a class="collapse-item {{ (request()->is('admin/about-me')) ? 'active' : '' }}" href="{{ url('admin/about-me') }}">{{ __('menu.about_me') }}</a>
                    <a class="collapse-item {{ (request()->is('admin/personel-info') ||
                                                request()->is('admin/info-list') ||
                                                request()->is('admin/*/personel-info')) ? 'active' : '' }}" href="{{ url('admin/personel-info') }}">{{ __('menu.personel_info') }}</a>
                    <a class="collapse-item {{ (request()->is('admin/counter') ||
                                                request()->is('admin/*/edit-counter')) ? 'active' : '' }}" href="{{ url('admin/counter') }}">{{ __('menu.counter_box') }}</a>
                    <a class="collapse-item {{ (
                                   request()->is('admin/skill') ||
                                   request()->is('admin/skill-list') ||
                                   request()->is('admin/*/edit-skill-list')) ? 'active' : '' }}" href="{{ url('admin/skill-list') }}">{{ __('menu.skills') }}</a>
                    <a class="collapse-item {{ (
                                   request()->is('admin/education') ||
                                   request()->is('admin/education-list') ||
                                   request()->is('admin/experience-list') ||
                                   request()->is('admin/*/edit-education-list') ||
                                   request()->is('admin/*/edit-experience-list')) ? 'active' : '' }}" href="{{ url('admin/education-list') }}">{{ __('menu.experience_and_education') }}</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Portfolio Collapse Menu -->
        <li class="nav-item {{ (request()->is('admin/portfolio') ||
                                   request()->is('admin/project') ||
                                   request()->is('admin/item/*') ||
                                    request()->is('admin/image/*') ||
                                    request()->is('admin/video/*') ||
                                    request()->is('admin/slider/*') ||
                                   request()->is('admin/*/*/edit-item') ||
                                   request()->is('admin/*/*/edit-slider') ||
                                   request()->is('admin/*/edit-project')) ? 'active' : '' }}">
            <a class="nav-link {{ (request()->is('admin/portfolio') ||
                                   request()->is('admin/project') ||
                                   request()->is('admin/item/*') ||
                                    request()->is('admin/image/*') ||
                                    request()->is('admin/video/*') ||
                                    request()->is('admin/slider/*') ||
                                   request()->is('admin/*/*/edit-item') ||
                                   request()->is('admin/*/*/edit-slider') ||
                                   request()->is('admin/*/edit-project')) ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseWorkshop" aria-expanded="true" aria-controls="collapseWorkshop">
                <i class="fas fa-briefcase"></i>
                <span>{{ __('menu.workshop') }}</span>
            </a>
            <div id="collapseWorkshop" class="collapse {{ (request()->is('admin/portfolio') ||
                                   request()->is('admin/project') ||
                                   request()->is('admin/item/*') ||
                                    request()->is('admin/image/*') ||
                                    request()->is('admin/video/*') ||
                                    request()->is('admin/slider/*') ||
                                   request()->is('admin/*/*/edit-item') ||
                                   request()->is('admin/*/*/edit-slider') ||
                                   request()->is('admin/*/edit-project')) ? 'show' : '' }}" aria-labelledby="headingWorkshop" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">{{ __('menu.workshop_page') }}</h6>
                    <a class="collapse-item {{ (request()->is('admin/portfolio')) ? 'active' : '' }}" href="{{ url('admin/portfolio') }}">{{ __('menu.portfolio') }}</a>
                    <a class="collapse-item {{(request()->is('admin/project') ||
                                   request()->is('admin/item/*') ||
                                    request()->is('admin/image/*') ||
                                    request()->is('admin/video/*') ||
                                    request()->is('admin/slider/*') ||
                                   request()->is('admin/*/*/edit-item') ||
                                   request()->is('admin/*/*/edit-slider') ||
                                   request()->is('admin/*/edit-project')) ? 'active' : '' }}" href="{{ url('admin/project') }}">{{ __('menu.projects') }}</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Blog Collapse Menu -->
        <li class="nav-item {{ (request()->is('admin/blog-info') ||
                                   request()->is('admin/blog') ||
                                   request()->is('admin/blog/add-blog') ||
                                   request()->is('admin/*/edit-blog')) ? 'active' : '' }}">
            <a class="nav-link {{ (request()->is('admin/blog-info') ||
                                   request()->is('admin/blog') ||
                                   request()->is('admin/blog/add-blog') ||
                                   request()->is('admin/*/edit-blog')) ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseBlog" aria-expanded="true" aria-controls="collapseBlog">
                <i class="fab fa-blogger-b"></i>
                <span>{{ __('menu.blogs') }}</span>
            </a>
            <div id="collapseBlog" class="collapse {{ (request()->is('admin/blog-info') ||
                                   request()->is('admin/blog') ||
                                   request()->is('admin/blog/add-blog') ||
                                   request()->is('admin/*/edit-blog')) ? 'show' : '' }}" aria-labelledby="headingBlog" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">{{ __('menu.blog_page') }}</h6>
                    <a class="collapse-item {{ (request()->is('admin/blog-info')) ? 'active' : '' }}" href="{{ url('admin/blog-info') }}">{{ __('menu.blog_info') }}</a>
                    <a class="collapse-item {{ ( request()->is('admin/blog') ||
                                   request()->is('admin/blog/add-blog') ||
                                   request()->is('admin/*/edit-blog')) ? 'active' : '' }}" href="{{ url('admin/blog') }}">{{ __('menu.blogs') }}</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Contact Collapse Menu -->
        <li class="nav-item {{ (request()->is('admin/contact') ||
                                   request()->is('admin/social') ||
                                   request()->is('admin/message') ||
                                   request()->is('admin/*/edit-social')) ? 'active' : '' }}">
            <a class="nav-link {{ (request()->is('admin/contact') ||
                                   request()->is('admin/social') ||
                                   request()->is('admin/message') ||
                                   request()->is('admin/*/edit-social')) ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseContact" aria-expanded="true" aria-controls="collapseContact">
                <i class="fas fa-envelope"></i>
                <span>{{ __('menu.contact') }}</span>
            </a>
            <div id="collapseContact" class="collapse {{ (request()->is('admin/contact') ||
                                   request()->is('admin/social') ||
                                   request()->is('admin/message') ||
                                   request()->is('admin/*/edit-social')) ? 'show' : '' }}" aria-labelledby="headingContact" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">{{ __('menu.contact_page') }}</h6>
                    <a class="collapse-item {{ (request()->is('admin/contact')) ? 'active' : '' }}" href="{{ url('admin/contact') }}">{{ __('menu.contact_info') }}</a>
                    <a class="collapse-item {{ (request()->is('admin/social') ||
                                   request()->is('admin/*/edit-social')) ? 'active' : '' }}" href="{{ url('admin/social') }}">{{ __('menu.social') }}</a>
                    <a class="collapse-item {{ (request()->is('admin/message')) ? 'active' : '' }}" href="{{ url('admin/message') }}">{{ __('menu.messages') }}</a>
                </div>
            </div>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            {{ __('menu.general') }}
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ (request()->is('admin/site-info') ||
                                   request()->is('admin/homepage-version') ||
                                   request()->is('admin/google-analytic') ||
                                   request()->is('admin/seo') ||
                                   request()->is('admin/section') ||
                                   request()->is('admin/color')) ? 'active' : '' }}">
            <a class="nav-link {{ (request()->is('admin/site-info') ||
                                   request()->is('admin/homepage-version') ||
                                   request()->is('admin/google-analytic') ||
                                   request()->is('admin/seo') ||
                                   request()->is('admin/section') ||
                                   request()->is('admin/color')) ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-cog"></i>
                <span>{{ __('menu.settings') }}</span>
            </a>
            <div id="collapsePages" class="collapse {{ (request()->is('admin/site-info') ||
                                   request()->is('admin/homepage-version') ||
                                   request()->is('admin/google-analytic') ||
                                   request()->is('admin/seo') ||
                                   request()->is('admin/section') ||
                                   request()->is('admin/color')) ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">{{ __('menu.site_settings') }}</h6>
                    <a class="collapse-item {{ (request()->is('admin/site-info')) ? 'active' : '' }}" href="{{ url('admin/site-info') }}">{{ __('menu.site_info') }}</a>
                    <a class="collapse-item {{ (request()->is('admin/homepage-version')) ? 'active' : '' }}" href="{{ url('admin/homepage-version') }}">{{ __('menu.homepage_versions') }}</a>
                    <a class="collapse-item {{ (request()->is('admin/google-analytic')) ? 'active' : '' }}" href="{{ url('admin/google-analytic') }}">{{ __('menu.google_analytic') }}</a>
                    <a class="collapse-item {{ (request()->is('admin/section')) ? 'active' : '' }}" href="{{ url('admin/section') }}">{{ __('menu.sections') }}</a>
                    <a class="collapse-item {{ (request()->is('admin/color')) ? 'active' : '' }}" href="{{ url('admin/color') }}">{{ __('menu.color') }}</a>
                    <a class="collapse-item {{ (request()->is('admin/seo')) ? 'active' : '' }}" href="{{ url('admin/seo') }}">{{ __('menu.seo') }}</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Optimizer -->
        <li class="nav-item {{ (request()->is('admin/clear-cache')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/clear-cache') }}">
                <i class="fab fa-cloudscale"></i>
                <span>{{ __('menu.optimizer') }}</span></a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - View Site -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="{{ url('/') }}" target="_blank">
                            <i class="fas fa-eye"></i>
                            <span class="badge badge-success badge-counter">=></span>
                        </a>
                    </li>

                    <!-- Nav Item - Messages -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-envelope fa-fw"></i>
                            @if (count($unread_message_count) > 0)
                                <!-- Counter - Messages -->
                                    <span class="badge badge-danger badge-counter">{{ count($unread_message_count) }}</span>
                                @endif
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                            <h6 class="dropdown-header">
                                {{ __('menu.message_center') }}
                            </h6>
                            @foreach ($unread_messages as $message)
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">{{ $message->name }}</div>
                                        <div class="small text-gray-500">
                                            {{ \Illuminate\Support\Str::limit($message->subject, 20, $end='...') }}·
                                            {{ $diff = Carbon\Carbon::parse($message->created_at)->diffForHumans(Carbon\Carbon::now()) }}
                                        </div>
                                    </div>
                                </a>
                                @endforeach
                            <a class="dropdown-item text-center small text-gray-500" href="{{ url('admin/message') }}">{{ __('menu.read_more_messages') }}</a>
                        </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                            @if(Auth::user()->profile_image != null)
                                <img src="{{ asset('uploads/img/profile/'.Auth::user()->profile_image) }}" class="img-profile rounded-circle" alt="profile image">
                            @else
                                <img src="{{ asset('uploads/img/dummy/128x128.png') }}" class="img-profile rounded-circle" alt="profile image">
                            @endif
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{ url('admin/profile/edit') }}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                {{ __('menu.my_profile') }}
                            </a>
                            <a class="dropdown-item" href="{{ url('admin/profile/change-password') }}">
                                <i class="fas fa-unlock-alt mr-2 text-gray-400"></i>
                               {{ __('menu.change_password') }}
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                {{ __('menu.logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="disabled">
                                @csrf
                            </form>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <main>
                @yield('content')
            </main>

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>
                         @if(isset($site_info))
                            {{ $site_info->copyright }}
                        @else
                            Copyright &copy; ElseColor 2020
                        @endif
                    </span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>



<!-- Bootstrap core JavaScript -->
<script src="{{ asset('assets/admin/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript -->
<script src="{{ asset('assets/admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages -->
<script src="{{ asset('assets/admin/js/sb-admin-2.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/custom.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ asset('assets/admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Summernote scripts -->
<script src="{{ asset('assets/admin/js/summernote-bs4.min.js') }}"></script>
<script>
    $('#summernote').summernote({
        placeholder: 'Enter Description',
        tabsize: 2,
        height: 100
    });
</script>

<!-- Page level custom scripts -->
<script src="{{ asset('assets/admin/js/demo/datatables-demo.js') }}"></script>


</body>
</html>
