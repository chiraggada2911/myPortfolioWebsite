@extends('layouts.frontend.master')

@section('content')

    <!-- Page Title Starts -->
   @if (isset($blog_info))
       @php
           // Explode
            $str = $blog_info->title;
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
           <span class="title-bg">{{ $blog_info->title_bg_name }}</span>
       </section>
       @else
       <section class="title-section text-left text-sm-center revealator-slideup revealator-once revealator-delay1">
           <h1>my <span>blog</span></h1>
           <span class="title-bg">posts</span>
       </section>
   @endif
   <!-- Page Title Ends -->

    <!-- Main Content Starts -->
    <section class="main-content revealator-slideup revealator-once revealator-delay1">
        <div class="container">
            <div class="row">
                <!-- Article Starts -->
                <article class="col-12">
                    <!-- Meta Starts -->
                    <div class="meta open-sans-font">
                        <span><i class="fa fa-user"></i> @if ($blog->author != null) {{ $blog->author }} @else by Admin  @endif</span>
                        <span class="date"><i class="fa fa-calendar"></i> {{ Carbon\Carbon::parse($blog->created_at)->isoFormat('DD') }} {{ Carbon\Carbon::parse($blog->created_at)->isoFormat('MMMM') }} {{ Carbon\Carbon::parse($blog->created_at)->isoFormat('GGGG') }}</span>
                        @if ($blog->tag != null) <span><i class="fa fa-tags"></i> {{ $blog->tag }}</span> @endif
                    </div>
                    <!-- Meta Ends -->
                    <!-- Article Content Starts -->
                    <h1 class="text-uppercase text-capitalize">{{ $blog->title }}</h1>
                    @if ($blog->blog_image != null) <img src="{{ asset('uploads/img/blog/'.$blog->blog_image) }}" class="img-fluid" alt="Blog image"/> @endif
                    <div class="blog-excerpt open-sans-font pb-5">
                        @php echo html_entity_decode($blog->desc); @endphp
                    </div>
                    <div class="pb-5">
                        @if (isset($homepage_version))
                            @if ($homepage_version->choose_version == 1)
                                @if (isset($previous)) <a class="float-left text-dark" href="{{ url('blog/'.$previous->slug) }}"><i class="fa fa-angle-left"></i> {{ __('frontend.previous') }}</a> @endif
                                @if (isset($next)) <a class="float-right text-dark" href="{{ url('blog/'.$next->slug) }}">{{ __('frontend.next') }}  <i class="fa fa-angle-right"></i></a> @endif
                            @else
                                @if (isset($previous)) <a class="float-left text-white" href="{{ url('blog/'.$previous->slug) }}"><i class="fa fa-angle-left"></i> {{ __('frontend.previous') }}</a> @endif
                                @if (isset($next)) <a class="float-right text-white" href="{{ url('blog/'.$next->slug) }}">{{ __('frontend.next') }}  <i class="fa fa-angle-right"></i></a> @endif

                            @endif
                        @endif
                        </div>
                    <!-- Article Content Ends -->
                </article>
                <!-- Article Ends -->
            </div>
        </div>
    </section>

@endsection
