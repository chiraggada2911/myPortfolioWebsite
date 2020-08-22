@extends('layouts.frontend.master')

@section('content')

    <!-- Page Title Starts -->
    @if (isset($about))
        @php
            // Explode
             $str = $about->title;
             $arr =  explode(" ", $str);
        @endphp
        <section class="title-section text-left text-sm-center revealator-slideup revealator-once revealator-delay1">
            <h1>
                @for ($i = 0; $i < count($arr); $i++)
                    @if ($i == 0  )
                        {{ $arr[0] }}
                    @else
                        <span>{{ $arr[$i] }}</span>
                    @endif
                @endfor
            </h1>
            <span class="title-bg">{{ $about->title_bg_name }}</span>
        </section>
    @else
        <section class="title-section text-left text-sm-center revealator-slideup revealator-once revealator-delay1">
            <h1>ABOUT <span>ME</span></h1>
            <span class="title-bg">Resume</span>
        </section>
    @endif
    <!-- Page Title Ends -->

    <!-- Main Content Starts -->
    <section class="main-content revealator-slideup revealator-once revealator-delay1">
        <div class="container">
            <div class="row">
                <!-- Personal Info Starts -->
                @if ($section_arr['personel_info_section'] == 1)
                    <div class="col-12 col-lg-5 col-xl-6">
                        <div class="row">
                            @if (isset($personel_info))
                                <div class="col-12">
                                    @if(!empty($personel_info->title))
                                        <h3 class="text-uppercase custom-title mb-0 ft-wt-600">{{ $personel_info->title }}</h3>
                                    @endif
                                    @if(!empty($personel_info->desc))
                                        <p class="open-sans-font mb-3">{{ $personel_info->desc }}</p>
                                    @endif
                                </div>

                                @if (!empty($personel_info->profile_image))
                                    <div class="col-12 d-block d-sm-none">
                                        <img src="{{ asset('uploads/img/personel_info/'.$personel_info->profile_image) }}" class="img-fluid main-img-mobile" alt="my-picture image" />
                                    </div>
                                @endif

                                @foreach ($info_lists->chunk(5) as $chunk)
                                    <div class="col-6">
                                        <ul class="about-list list-unstyled open-sans-font">
                                            @foreach ($chunk as $info_list)
                                                <li> <span class="title">{{ $info_list->name }} :</span> <span class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">{{ $info_list->desc }}</span> </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach

                                @if ($personel_info->btn_link_status == 1)
                                    <div class="col-12 mt-3">
                                        <a href="{{  asset('uploads/img/personel_info/'.$personel_info->cv_file) }}" class="btn btn-download" download>{{ $personel_info->btn_name }}</a>
                                    </div>
                                @endif
                            @else
                                <div class="col-12">
                                    <h3 class="text-uppercase custom-title mb-0 ft-wt-600">personal infos</h3>
                                </div>
                                <div class="col-12 d-block d-sm-none">
                                    <img src="http://via.placeholder.com/300x300.jpg" class="img-fluid main-img-mobile" alt="my picture" />
                                </div>
                                <div class="col-6">
                                    <ul class="about-list list-unstyled open-sans-font">
                                        <li> <span class="title">first name :</span> <span class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">Lucy</span> </li>
                                        <li> <span class="title">last name :</span> <span class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">Milner</span> </li>
                                        <li> <span class="title">Age :</span> <span class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">27 Years</span> </li>
                                        <li> <span class="title">Nationality :</span> <span class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">Tunisian</span> </li>
                                        <li> <span class="title">Freelance :</span> <span class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">Available</span> </li>
                                    </ul>
                                </div>
                                <div class="col-6">
                                    <ul class="about-list list-unstyled open-sans-font">
                                        <li> <span class="title">Address :</span> <span class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">Tunis</span> </li>
                                        <li> <span class="title">phone :</span> <span class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">+21621184010</span> </li>
                                        <li> <span class="title">Email :</span> <span class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">you@mail.com</span> </li>
                                        <li> <span class="title">Skype :</span> <span class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">lucy.milner</span> </li>
                                        <li> <span class="title">langages :</span> <span class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">French, English</span> </li>
                                    </ul>
                                </div>
                                <div class="col-12 mt-3">
                                    <a href="#" class="btn btn-download">Download CV</a>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            <!-- Personal Info Ends -->

                <!-- Boxes Starts -->
                @if ($section_arr['counter_section'] == 1)
                    @if (count($counters) > 0)
                        <div class="col-12 col-lg-7 col-xl-6 mt-5 mt-lg-0">
                            <div class="row">
                                @foreach ($counters as $counter)
                                    @php
                                        // Explode
                                         $str = $counter->desc;
                                         $arr =  explode(" ", $str);
                                    @endphp
                                    <div class="col-6">
                                        <div class="box-stats with-margin">
                                            <h3 class="poppins-font position-relative">{{ $counter->timer }}</h3>
                                            <p class="open-sans-font m-0 position-relative text-uppercase">
                                                @for ($i = 0; $i < count($arr); $i++)
                                                    @if ($i == 0 )
                                                        {{ $arr[0] }}
                                                    @elseif ($i == 1 )
                                                        {{ $arr[1] }}
                                                        <span class="d-block">
                                                    @else
                                                         {{ $arr[$i] }}
                                                    @endif
                                                     </span>
                                                @endfor
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="col-12 col-lg-7 col-xl-6 mt-5 mt-lg-0">
                            <div class="row">
                                <div class="col-6">
                                    <div class="box-stats with-margin">
                                        <h3 class="poppins-font position-relative">12</h3>
                                        <p class="open-sans-font m-0 position-relative text-uppercase">years of <span class="d-block">experience</span></p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="box-stats with-margin">
                                        <h3 class="poppins-font position-relative">97</h3>
                                        <p class="open-sans-font m-0 position-relative text-uppercase">completed <span class="d-block">projects</span></p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="box-stats">
                                        <h3 class="poppins-font position-relative">81</h3>
                                        <p class="open-sans-font m-0 position-relative text-uppercase">Happy<span class="d-block">customers</span></p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="box-stats">
                                        <h3 class="poppins-font position-relative">53</h3>
                                        <p class="open-sans-font m-0 position-relative text-uppercase">awards <span class="d-block">won</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endif
            @endif
            <!-- Boxes Ends -->
            </div>

            @if ($section_arr['personel_info_section'] == 1 || $section_arr['counter_section'] == 1)
                <hr class="separator">
            @endif

        <!-- Skills Starts -->
            @if ($section_arr['skill_section'] == 1)
                @if (isset($skill) || count($skill_lists) > 0)
                    <div class="row">
                        @if (isset($skill))
                            <div class="col-12">
                                @if (!empty($skill->title))
                                    <h3 class="text-uppercase pb-4 pb-sm-5 mb-3 mb-sm-0 text-left text-sm-center custom-title ft-wt-600">{{ $skill->title }}</h3>
                                @endif
                                @if (!empty($skill->desc))
                                    <div class="row">
                                        <div class="col-md-8 mx-auto">
                                            <p class="open-sans-font mb-5 text-center">{{ $skill->desc }}</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif

                        @foreach ($skill_lists as $skill_list)
                            <div class="col-6 col-md-3 mb-3 mb-sm-5">
                                <div class="c100 p{{ $skill_list->percent }}">
                                    <span>{{ $skill_list->percent }}%</span>
                                    <div class="slice">
                                        <div class="bar"></div>
                                        <div class="fill"></div>
                                    </div>
                                </div>
                                <h6 class="text-uppercase open-sans-font text-center mt-2 mt-sm-4">{{ $skill_list->title }}</h6>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="row">
                        <div class="col-12">
                            <h3 class="text-uppercase pb-4 pb-sm-5 mb-3 mb-sm-0 text-left text-sm-center custom-title ft-wt-600">My Skills</h3>
                        </div>
                        <div class="col-6 col-md-3 mb-3 mb-sm-5">
                            <div class="c100 p25">
                                <span>25%</span>
                                <div class="slice">
                                    <div class="bar"></div>
                                    <div class="fill"></div>
                                </div>
                            </div>
                            <h6 class="text-uppercase open-sans-font text-center mt-2 mt-sm-4">html</h6>
                        </div>
                        <div class="col-6 col-md-3 mb-3 mb-sm-5">
                            <div class="c100 p89">
                                <span>89%</span>
                                <div class="slice">
                                    <div class="bar"></div>
                                    <div class="fill"></div>
                                </div>
                            </div>
                            <h6 class="text-uppercase open-sans-font text-center mt-2 mt-sm-4">javascript</h6>
                        </div>
                        <div class="col-6 col-md-3 mb-3 mb-sm-5">
                            <div class="c100 p70">
                                <span>70%</span>
                                <div class="slice">
                                    <div class="bar"></div>
                                    <div class="fill"></div>
                                </div>
                            </div>
                            <h6 class="text-uppercase open-sans-font text-center mt-2 mt-sm-4">css</h6>
                        </div>
                        <div class="col-6 col-md-3 mb-3 mb-sm-5">
                            <div class="c100 p66">
                                <span>66%</span>
                                <div class="slice">
                                    <div class="bar"></div>
                                    <div class="fill"></div>
                                </div>
                            </div>
                            <h6 class="text-uppercase open-sans-font text-center mt-2 mt-sm-4">php</h6>
                        </div>
                        <div class="col-6 col-md-3 mb-3 mb-sm-5">
                            <div class="c100 p95">
                                <span>95%</span>
                                <div class="slice">
                                    <div class="bar"></div>
                                    <div class="fill"></div>
                                </div>
                            </div>
                            <h6 class="text-uppercase open-sans-font text-center mt-2 mt-sm-4">wordpress</h6>
                        </div>
                        <div class="col-6 col-md-3 mb-3 mb-sm-5">
                            <div class="c100 p50">
                                <span>50%</span>
                                <div class="slice">
                                    <div class="bar"></div>
                                    <div class="fill"></div>
                                </div>
                            </div>
                            <h6 class="text-uppercase open-sans-font text-center mt-2 mt-sm-4">jquery</h6>
                        </div>
                        <div class="col-6 col-md-3 mb-3 mb-sm-5">
                            <div class="c100 p65">
                                <span>65%</span>
                                <div class="slice">
                                    <div class="bar"></div>
                                    <div class="fill"></div>
                                </div>
                            </div>
                            <h6 class="text-uppercase open-sans-font text-center mt-2 mt-sm-4">angular</h6>
                        </div>
                        <div class="col-6 col-md-3 mb-3 mb-sm-5">
                            <div class="c100 p45">
                                <span>45%</span>
                                <div class="slice">
                                    <div class="bar"></div>
                                    <div class="fill"></div>
                                </div>
                            </div>
                            <h6 class="text-uppercase open-sans-font text-center mt-2 mt-sm-4">react</h6>
                        </div>
                    </div>
                @endif
            @endif
        <!-- Skills Ends -->

            @if ($section_arr['skill_section'] == 1)
                <hr class="separator mt-1">
            @endif
        <!-- Experience & Education Starts -->
            @if ($section_arr['education_section'] == 1 || $section_arr['experience_section'] == 1)
                <div class="row">
                    @if (isset($education))
                        <div class="col-12">
                            @if (!empty($education->title))
                                <h3 class="text-uppercase pb-5 mb-0 text-left text-sm-center custom-title ft-wt-600">{{ $education->title }}</h3>
                            @endif
                            @if (!empty($education->desc))
                                <div class="row">
                                    <div class="col-md-8 mx-auto">
                                        <p class="open-sans-font mb-5 text-center">{{ $education->desc }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                        @else
                        <div class="col-12">
                            <h3 class="text-uppercase pb-5 mb-0 text-left text-sm-center custom-title ft-wt-600">Experience <span>&</span> Education</h3>
                        </div>
                    @endif
                    @if ($section_arr['experience_section'] == 1)
                        @if (count($experience_lists) > 0)
                                <div class="col-lg-6 m-15px-tb">
                                    <div class="resume-box">
                                        <ul>
                                            @foreach ($experience_lists as $experience_list)
                                                <li>
                                                    <div class="icon">
                                                        <i class="fa fa-briefcase"></i>
                                                    </div>
                                                    @if ($experience_list->year_range != null) <span class="time open-sans-font text-uppercase">{{ $experience_list->year_range }}</span> @endif
                                                    <h5 class="poppins-font text-uppercase">{{ $experience_list->job }} @if ($experience_list->company != null)<span class="place open-sans-font">{{ $experience_list->company }}</span> @endif</h5>
                                                    <p class="open-sans-font">{{$experience_list->desc}}</p>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @else
                                <div class="col-lg-6 m-15px-tb">
                                    <div class="resume-box">
                                        <ul>
                                            <li>
                                                <div class="icon">
                                                    <i class="fa fa-briefcase"></i>
                                                </div>
                                                <span class="time open-sans-font text-uppercase">2018 - Present</span>
                                                <h5 class="poppins-font text-uppercase">Web Developer <span class="place open-sans-font">Envato</span></h5>
                                                <p class="open-sans-font">Lorem ipsum dolor sit amet, consectetur tempor incididunt ut labore adipisicing elit, </p>
                                            </li>
                                            <li>
                                                <div class="icon">
                                                    <i class="fa fa-briefcase"></i>
                                                </div>
                                                <span class="time open-sans-font text-uppercase">2013 - 2018</span>
                                                <h5 class="poppins-font text-uppercase">UI/UX Designer <span class="place open-sans-font">Themeforest</span></h5>
                                                <p class="open-sans-font">Lorem incididunt dolor sit amet, consectetur eiusmod dunt doldunt dol elit, tempor incididunt</p>
                                            </li>
                                            <li>
                                                <div class="icon">
                                                    <i class="fa fa-briefcase"></i>
                                                </div>
                                                <span class="time open-sans-font text-uppercase">2005 - 2013</span>
                                                <h5 class="poppins-font text-uppercase">Consultant <span class="place open-sans-font">Videohive</span></h5>
                                                <p class="open-sans-font">Lorem ipsum dolor sit amet, tempor incididunt ut laboreconsectetur elit, sed do eiusmod tempor duntt</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @endif
                    @endif
                    @if ($section_arr['education_section'] == 1)
                       @if (count($education_lists) > 0)
                                <div class="col-lg-6 m-15px-tb">
                                    <div class="resume-box">
                                        <ul>
                                            @foreach($education_lists as $education_list)
                                                <li>
                                                    <div class="icon">
                                                        <i class="fa fa-graduation-cap"></i>
                                                    </div>
                                                    @if ($education_list->year_range != null) <span class="time open-sans-font text-uppercase">{{ $education_list->year_range }}</span> @endif
                                                    <h5 class="poppins-font text-uppercase">{{ $education_list->degree }} @if ($education_list->school != null)<span class="place open-sans-font">{{ $education_list->school }}</span> @endif</h5>
                                                    <p class="open-sans-font">{{$education_list->desc}}</p>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                           @else
                                <div class="col-lg-6 m-15px-tb">
                                    <div class="resume-box">
                                        <ul>
                                            <li>
                                                <div class="icon">
                                                    <i class="fa fa-graduation-cap"></i>
                                                </div>
                                                <span class="time open-sans-font text-uppercase">2015</span>
                                                <h5 class="poppins-font text-uppercase">Engineering Degree <span class="place open-sans-font">Oxford University</span></h5>
                                                <p class="open-sans-font">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do tempor incididunt ut labore</p>
                                            </li>
                                            <li>
                                                <div class="icon">
                                                    <i class="fa fa-graduation-cap"></i>
                                                </div>
                                                <span class="time open-sans-font text-uppercase">2012</span>
                                                <h5 class="poppins-font text-uppercase">Master Degree <span class="place open-sans-font">Kiev University</span></h5>
                                                <p class="open-sans-font">Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut adipisicing</p>
                                            </li>
                                            <li>
                                                <div class="icon">
                                                    <i class="fa fa-graduation-cap"></i>
                                                </div>
                                                <span class="time open-sans-font text-uppercase">2009</span>
                                                <h5 class="poppins-font text-uppercase">Bachelor Degree <span class="place open-sans-font">Tunis High School</span></h5>
                                                <p class="open-sans-font">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor ut labore</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                           @endif
                    @endif
                </div>
        @endif
        <!-- Experience & Education Ends -->
        </div>
    </section>
    <!-- Main Content Ends -->

@endsection
