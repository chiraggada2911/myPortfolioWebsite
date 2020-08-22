@extends('layouts.frontend.master')

@section('content')

    <!-- Main Content Starts -->
    <section class="container-fluid main-container container-home p-0 revealator-slideup revealator-once revealator-delay1">
        <div class="color-block d-none d-lg-block"></div>
        <div class="row home-details-container align-items-center">
            <div class="col-lg-4 bg position-fixed d-none d-lg-block" style="@if (!empty($photo)) background-image: url({{ asset('uploads/img/profile_photo/'.$photo) }}); @else background-image: url({{ asset('uploads/img/dummy/610x1020.jpg') }}); @endif"></div>
            <div class="col-12 col-lg-8 offset-lg-4 home-details text-left text-sm-center text-lg-left">
                <div>
                    <img src="@if (!empty($photo)) {{ asset('uploads/img/profile_photo/'.$photo) }} @else {{ asset('uploads/img/dummy/300x300.png') }} @endif" class="img-fluid main-img-mobile d-none d-sm-block d-lg-none" alt="my picture" />
                    @if (isset($content))
                        @php
                            // Explode
                             $str = $content->main_title;
                             $arr =  explode(" ", $str);
                        @endphp
                        <h6 class="text-uppercase open-sans-font mb-0 d-block d-sm-none d-lg-block">{{ $content->small_title }}</h6>
                        <h1 class="text-uppercase poppins-font">
                            @for ($i = 0; $i < count($arr); $i++)
                                @if ($i == 0  )
                                    <span>{{ $arr[0] }}</span>
                                @else
                                    {{ $arr[$i] }}
                                @endif
                            @endfor
                        </h1>
                        <p class="open-sans-font">{{ $content->short_desc }}</p>
                        @if ($content->btn_link_status == 1)
                            <a href="{{ url($content->btn_link) }}" class="btn btn-about">{{ $content->btn_name }}</a>
                            @endif
                    @else
                        <h6 class="text-uppercase open-sans-font mb-0 d-block d-sm-none d-lg-block">hi there !</h6>
                        <h1 class="text-uppercase poppins-font"><span>I'm</span> Lucy milner</h1>
                        <p class="open-sans-font">I'm a Tunisian based web designer & front‑end developer focused on crafting clean & user‑friendly experiences, I am passionate about building excellent software that improves the lives of those around me.</p>
                        <a href="#" class="btn btn-about">more about me</a>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Main Content Ends -->

@endsection
