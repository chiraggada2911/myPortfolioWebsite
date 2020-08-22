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
    @if (count($blogs) > 0)
    <section class="main-content revealator-slideup revealator-once revealator-delay1">
        <div class="container">
            <!-- Articles Starts -->
            <div class="row">
                <!-- Article Starts -->
                @foreach ($blogs as $blog)
                    <div class="col-12 col-md-6 col-lg-6 col-xl-4 mb-30">
                        <article class="post-container">
                            <div class="post-thumb">
                                <a href="{{ url('blog/'.$blog->slug) }}" class="d-block position-relative overflow-hidden">
                                    @if ($blog->blog_image == '')
                                        <img src="{{ asset('uploads/img/dummy/895x552.jpg') }}" class="img-fluid" alt="Blog image">
                                    @else
                                        <img src="{{ asset('uploads/img/blog/'.$blog->blog_image) }}" class="img-fluid" alt="Blog image">
                                    @endif
                                </a>
                            </div>
                            <div class="post-content">
                                <div class="entry-header">
                                    <h3><a href="{{ url('blog/'.$blog->slug) }}">{{ $blog->title }}</a></h3>
                                </div>
                                <div class="entry-content open-sans-font">
                                    <p>{{ $blog->short_desc }}</p>
                                </div>
                            </div>
                        </article>
                    </div>
                    @endforeach
                <!-- Article Ends -->
                <!-- Pagination Starts -->
                <div class="col-12 mt-4">
                    <div class="pagination justify-content-center mb-0">
                        {{ $blogs->links() }}
                    </div>
                </div>
                <!-- Pagination Ends -->
            </div>
            <!-- Articles Ends -->
        </div>

    </section>
    @else
        <section class="main-content revealator-slideup revealator-once revealator-delay1">
            <div class="container">
                <!-- Articles Starts -->
                <div class="row">
                    <!-- Article Starts -->
                    <div class="col-12 col-md-6 col-lg-6 col-xl-4 mb-30">
                        <article class="post-container">
                            <div class="post-thumb">
                                <a href="#" class="d-block position-relative overflow-hidden">
                                    <img src="{{ asset('uploads/img/dummy/895x552.jpg') }}" class="img-fluid" alt="Blog Post">
                                </a>
                            </div>
                            <div class="post-content">
                                <div class="entry-header">
                                    <h3><a href="#">How to Own Your Audience by Creating an Email List</a></h3>
                                </div>
                                <div class="entry-content open-sans-font">
                                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore...
                                    </p>
                                </div>
                            </div>
                        </article>
                    </div>
                    <!-- Article Ends -->
                    <!-- Article Starts -->
                    <div class="col-12 col-md-6 col-lg-6 col-xl-4 mb-30">
                        <article class="post-container">
                            <div class="post-thumb">
                                <a href="#" class="d-block position-relative overflow-hidden">
                                    <img src="{{ asset('uploads/img/dummy/895x552.jpg') }}" class="img-fluid" alt="Blog Post">
                                </a>
                            </div>
                            <div class="post-content">
                                <div class="entry-header">
                                    <h3><a href="#">Top 10 Toolkits for Deep Learning in 2020</a></h3>
                                </div>
                                <div class="entry-content open-sans-font">
                                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore...
                                    </p>
                                </div>
                            </div>
                        </article>
                    </div>
                    <!-- Article Ends -->
                    <!-- Article Starts -->
                    <div class="col-12 col-md-6 col-lg-6 col-xl-4 mb-30">
                        <article class="post-container">
                            <div class="post-thumb">
                                <a href="#" class="d-block position-relative overflow-hidden">
                                    <img src="{{ asset('uploads/img/dummy/895x552.jpg') }}" class="img-fluid" alt="Blog Post">
                                </a>
                            </div>
                            <div class="post-content">
                                <div class="entry-header">
                                    <h3><a href="#">Everything You Need to Know About Web Accessibility</a></h3>
                                </div>
                                <div class="entry-content open-sans-font">
                                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore...
                                    </p>
                                </div>
                            </div>
                        </article>
                    </div>
                    <!-- Article Ends -->
                    <!-- Article Starts -->
                    <div class="col-12 col-md-6 col-lg-6 col-xl-4 mb-30">
                        <article class="post-container">
                            <div class="post-thumb">
                                <a href="#" class="d-block position-relative overflow-hidden">
                                    <img src="{{ asset('uploads/img/dummy/895x552.jpg') }}" class="img-fluid" alt="Blog Post">
                                </a>
                            </div>
                            <div class="post-content">
                                <div class="entry-header">
                                    <h3><a href="#">How to Inject Humor & Comedy Into Your Brand</a></h3>
                                </div>
                                <div class="entry-content open-sans-font">
                                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore...
                                    </p>
                                </div>
                            </div>
                        </article>
                    </div>
                    <!-- Article Ends -->
                    <!-- Article Starts -->
                    <div class="col-12 col-md-6 col-lg-6 col-xl-4 mb-30">
                        <article class="post-container">
                            <div class="post-thumb">
                                <a href="#" class="d-block position-relative overflow-hidden">
                                    <img src="{{ asset('uploads/img/dummy/895x552.jpg') }}" class="img-fluid" alt="Blog Post">
                                </a>
                            </div>
                            <div class="post-content">
                                <div class="entry-header">
                                    <h3><a href="#">Women in Web Design: How To Achieve Success</a></h3>
                                </div>
                                <div class="entry-content open-sans-font">
                                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore...
                                    </p>
                                </div>
                            </div>
                        </article>
                    </div>
                    <!-- Article Ends -->
                    <!-- Article Starts -->
                    <div class="col-12 col-md-6 col-lg-6 col-xl-4 mb-30">
                        <article class="post-container">
                            <div class="post-thumb">
                                <a href="#" class="d-block position-relative overflow-hidden">
                                    <img src="{{ asset('uploads/img/dummy/895x552.jpg') }}" class="img-fluid" alt="Blog Post">
                                </a>
                            </div>
                            <div class="post-content">
                                <div class="entry-header">
                                    <h3><a href="#">Evergreen versus topical content: An overview</a></h3>
                                </div>
                                <div class="entry-content open-sans-font">
                                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore...
                                    </p>
                                </div>
                            </div>
                        </article>
                    </div>
                    <!-- Article Ends -->
                    <!-- Pagination Starts -->
                    <div class="col-12 mt-4">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center mb-0">
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- Pagination Ends -->
                </div>
                <!-- Articles Ends -->
            </div>

        </section>
        @endif
    <!-- Main Content Ends -->

@endsection
