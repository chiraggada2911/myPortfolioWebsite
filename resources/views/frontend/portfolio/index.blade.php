@extends('layouts.frontend.master')

@section('content')

    <!-- Page Title Starts -->
    @if (isset($portfolio))
        @php
            // Explode
             $str = $portfolio->title;
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
            <span class="title-bg">{{ $portfolio->title_bg_name }}</span>
        </section>
    @else
        <section class="title-section text-left text-sm-center revealator-slideup revealator-once revealator-delay1">
            <h1>My <span>Portfolio</span></h1>
            <span class="title-bg">Works</span>
        </section>
    @endif
    <!-- Page Title Ends -->

    <!-- Main Content Starts -->
    @if (count($projects) > 0)
        <section class="main-content text-center revealator-slideup revealator-once revealator-delay1">
            <div id="grid-gallery" class="container grid-gallery">
                <!-- Portfolio Grid Starts -->
                <section class="grid-wrap">
                    <ul class="row grid">
                        <!-- Portfolio Item Starts -->
                        @foreach ($projects as $project)
                            <li>
                                <figure>
                                    <img src="{{ asset('uploads/img/dummy/portfolio.jpg') }}" alt="Portolio Image" />
                                    <div><span>{{ $project->project_name }}</span></div>
                                </figure>
                            </li>
                    @endforeach
                    <!-- Portfolio Item Ends -->
                    </ul>
                </section>
                <!-- Portfolio Grid Ends -->
                <!-- Portfolio Details Starts -->
                <section class="slideshow">
                    <ul>
                        <!-- Portfolio Item Detail Starts -->
                        @foreach ($projects as $project)
                            <li>
                                <figure>
                                    <!-- Project Details Starts -->
                                    <figcaption>
                                        <h3>{{ $project->project_name }}</h3>
                                        @if ($project->item_status == 1 && count($project->items) > 0)
                                            <div class="row open-sans-font">
                                                @foreach ($project->items as $item)
                                                    <div class="col-12 col-sm-6 mb-2">
                                                        <i class="fas fa-list pr-2"></i><span class="project-label">{{ $item->name }} </span>: <span class="ft-wt-600 uppercase">{{ $item->desc }}</span>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </figcaption>
                                    <!-- Project Details Ends -->
                                    <!-- Main Project Content Starts -->
                                    @if ($project->project_view_option == 1)
                                        @if (isset($project->image))
                                            <img src="{{ asset('uploads/img/project/'.$project->image->project_image) }}" class="img-fluid" alt="Portolio Image" />
                                        @endif
                                    @elseif ($project->project_view_option == 2)
                                        @if (isset($project->video))
                                            <div class="videocontainer">
                                                <iframe class="youtube-video" src="{{ $project->video->video_link }}" allowfullscreen></iframe>
                                            </div>
                                        @endif
                                    @else
                                        @if (count($project->sliders) > 0)
                                            <div id="slider" class="carousel slide portfolio-slider" data-ride="carousel" data-interval="false">
                                                <ol class="carousel-indicators">
                                                    @php $i = 0; @endphp
                                                    @foreach ($project->sliders as $slider)
                                                        @if ($i == 0)
                                                            <li data-target="#slider" data-slide-to="{{ $i }}" class="active"></li>
                                                        @else
                                                            <li data-target="#slider" data-slide-to="{{ $i }}"></li>
                                                        @endif
                                                            @php $i++; @endphp
                                                    @endforeach
                                                </ol>
                                                <!-- The slideshow -->
                                                <div class="carousel-inner">
                                                    @php $i = 0; @endphp
                                                    @foreach ($project->sliders as $slider)
                                                        @if ($i == 0)
                                                            <div class="carousel-item active">
                                                                <img src="{{ asset('uploads/img/project/'.$slider->project_slider) }}" alt="Portolio Image" />
                                                            </div>
                                                        @else
                                                            <div class="carousel-item">
                                                                <img src="{{ asset('uploads/img/project/'.$slider->project_slider) }}" alt="Portolio Image" />
                                                            </div>
                                                        @endif
                                                            @php $i++; @endphp
                                                    @endforeach
                                                </div>
                                            </div>
                                    @endif
                                @endif
                                <!-- Main Project Content Ends -->

                                </figure>
                            </li>
                    @endforeach
                        <li>
                            <figure>
                                <!-- Project Details Starts -->
                                <figcaption>
                                    <h3>Local Video Project</h3>
                                    <div class="row open-sans-font">
                                        <div class="col-6 mb-2">
                                            <i class="fas fa-list pr-2"></i><span class="project-label">Project </span>: <span class="ft-wt-600 uppercase">Video</span>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <i class="fas fa-list pr-2"></i><span class="project-label">Client </span>: <span class="ft-wt-600 uppercase">Videohive</span>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <i class="fas fa-list pr-2"></i><span class="project-label">Langages </span>: <span class="ft-wt-600 uppercase">Adobe Premium</span>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <i class="fas fa-list pr-2"></i><span class="project-label">Preview </span>: <span class="ft-wt-600 uppercase"><a href="#" target="_blank">www.envato.com</a></span>
                                        </div>
                                    </div>
                                </figcaption>
                                <!-- Project Details Ends -->
                                <!-- Main Project Content Starts -->
                                <video id="video" class="responsive-video" controls poster="http://via.placeholder.com/895x552.jpg">
                                    <source src="path_to_your_video" type="video/mp4">
                                </video>
                                <!-- Main Project Content Ends -->
                            </figure>
                        </li>
                        <li>
                            <figure>
                                <!-- Project Details Starts -->
                                <figcaption>
                                    <h3>Youtube Project</h3>
                                    <div class="row open-sans-font">
                                        <div class="col-6 mb-2">
                                            <i class="fas fa-list pr-2"></i><span class="project-label">Project </span>: <span class="ft-wt-600 uppercase">Video</span>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <i class="fas fa-list pr-2"></i><span class="project-label">Client </span>: <span class="ft-wt-600 uppercase">Videohive</span>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <i class="fas fa-list pr-2"></i><span class="project-label">Langages </span>: <span class="ft-wt-600 uppercase">Adobe Premium</span>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <i class="fas fa-list pr-2"></i><span class="project-label">Preview </span>: <span class="ft-wt-600 uppercase"><a href="#" target="_blank">www.envato.com</a></span>
                                        </div>
                                    </div>
                                </figcaption>
                                <!-- Project Details Ends -->
                                <!-- Main Project Content Starts -->
                                <div class="videocontainer">
                                    <iframe class="youtube-video" src="https://www.youtube.com/embed/7e90gBu4pas?enablejsapi=1&version=3&playerapiid=ytplayer" allowfullscreen></iframe>
                                </div>
                                <!-- Main Project Content Ends -->
                            </figure>
                        </li>
                    <!-- Portfolio Item Detail Ends -->

                    </ul>
                    <!-- Portfolio Navigation Starts -->
                    <nav>
                        <span class="icon nav-prev"><img src="{{ asset('uploads/img/dummy/navigation/left-arrow.png') }}" alt="previous"></span>
                        <span class="icon nav-next"><img src="{{ asset('uploads/img/dummy/navigation/right-arrow.png') }}" alt="next"></span>
                        <span class="nav-close"><img src="{{ asset('uploads/img/dummy/navigation/close-button.png') }}" alt="close"></span>
                    </nav>
                    <!-- Portfolio Navigation Ends -->
                </section>
            </div>
        </section>
    @else
        <section class="main-content text-center revealator-slideup revealator-once revealator-delay1">
            <div id="grid-gallery" class="container grid-gallery">
                <!-- Portfolio Grid Starts -->
                <section class="grid-wrap">
                    <ul class="row grid">
                        <!-- Portfolio Item Starts -->
                        <li>
                            <figure>
                                <img src="http://via.placeholder.com/895x552.jpg" alt="Portolio Image" />
                                <div><span>Image Project</span></div>
                            </figure>
                        </li>
                        <!-- Portfolio Item Ends -->
                        <!-- Portfolio Item Starts -->
                        <li>
                            <figure>
                                <img src="http://via.placeholder.com/895x552.jpg" alt="Portolio Image" />
                                <div><span>Youtube Project</span></div>
                            </figure>
                        </li>
                        <!-- Portfolio Item Ends -->
                        <!-- Portfolio Item Starts -->
                        <li>
                            <figure>
                                <img src="http://via.placeholder.com/895x552.jpg" alt="Portolio Image" />
                                <div><span>Slider Project</span></div>
                            </figure>
                        </li>
                        <!-- Portfolio Item Ends -->
                        <!-- Portfolio Item Starts -->
                        <li>
                            <figure>
                                <img src="http://via.placeholder.com/895x552.jpg" alt="Portolio Image" />
                                <div><span>Local Video Project</span></div>
                            </figure>
                        </li>
                        <!-- Portfolio Item Ends -->
                        <!-- Portfolio Item Starts -->
                        <li>
                            <figure>
                                <img src="http://via.placeholder.com/895x552.jpg" alt="Portolio Image" />
                                <div><span>Image Project</span></div>
                            </figure>
                        </li>
                        <!-- Portfolio Item Ends -->
                        <!-- Portfolio Item Starts -->
                        <li>
                            <figure>
                                <img src="http://via.placeholder.com/895x552.jpg" alt="Portolio Image" />
                                <div><span>Image Project</span></div>
                            </figure>
                        </li>
                        <!-- Portfolio Item Ends -->
                        <!-- Portfolio Item Starts -->
                        <li>
                            <figure>
                                <img src="http://via.placeholder.com/895x552.jpg" alt="Portolio Image" />
                                <div><span>Image Project</span></div>
                            </figure>
                        </li>
                        <!-- Portfolio Item Ends -->
                        <!-- Portfolio Item Starts -->
                        <li>
                            <figure>
                                <img src="http://via.placeholder.com/895x552.jpg" alt="Portolio Image" />
                                <div><span>Image Project</span></div>
                            </figure>
                        </li>
                        <!-- Portfolio Item Ends -->
                        <!-- Portfolio Item Starts -->
                        <li>
                            <figure>
                                <img src="http://via.placeholder.com/895x552.jpg" alt="Portolio Image" />
                                <div><span>Image Project</span></div>
                            </figure>
                        </li>
                        <!-- Portfolio Item Ends -->
                    </ul>
                </section>
                <!-- Portfolio Grid Ends -->
                <!-- Portfolio Details Starts -->
                <section class="slideshow">
                    <ul>
                        <!-- Portfolio Item Detail Starts -->
                        <li>
                            <figure>
                                <!-- Project Details Starts -->
                                <figcaption>
                                    <h3>Image Project</h3>
                                    <div class="row open-sans-font">
                                        <div class="col-6 mb-2">
                                            <i class="fas fa-list pr-2"></i><span class="project-label">Project </span>: <span class="ft-wt-600 uppercase">Video</span>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <i class="fas fa-list pr-2"></i><span class="project-label">Client </span>: <span class="ft-wt-600 uppercase">Videohive</span>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <i class="fas fa-list pr-2"></i><span class="project-label">Langages </span>: <span class="ft-wt-600 uppercase">Adobe Premium</span>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <i class="fas fa-list pr-2"></i><span class="project-label">Preview </span>: <span class="ft-wt-600 uppercase"><a href="#" target="_blank">www.envato.com</a></span>
                                        </div>
                                    </div>
                                </figcaption>
                                <!-- Project Details Ends -->
                                <!-- Main Project Content Starts -->
                                <img src="http://via.placeholder.com/895x552.jpg" alt="Portolio Image" />
                                <!-- Main Project Content Ends -->
                            </figure>
                        </li>
                        <!-- Portfolio Item Detail Ends -->
                        <!-- Portfolio Item Detail Starts -->
                        <li>
                            <figure>
                                <!-- Project Details Starts -->
                                <figcaption>
                                    <h3>Youtube Project</h3>
                                    <div class="row open-sans-font">
                                        <div class="col-6 mb-2">
                                            <i class="fas fa-list pr-2"></i><span class="project-label">Project </span>: <span class="ft-wt-600 uppercase">Video</span>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <i class="fas fa-list pr-2"></i><span class="project-label">Client </span>: <span class="ft-wt-600 uppercase">Videohive</span>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <i class="fas fa-list pr-2"></i><span class="project-label">Langages </span>: <span class="ft-wt-600 uppercase">Adobe Premium</span>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <i class="fas fa-list pr-2"></i><span class="project-label">Preview </span>: <span class="ft-wt-600 uppercase"><a href="#" target="_blank">www.envato.com</a></span>
                                        </div>
                                    </div>
                                </figcaption>
                                <!-- Project Details Ends -->
                                <!-- Main Project Content Starts -->
                                <div class="videocontainer">
                                    <iframe class="youtube-video" src="https://www.youtube.com/embed/7e90gBu4pas?enablejsapi=1&version=3&playerapiid=ytplayer" allowfullscreen></iframe>
                                </div>
                                <!-- Main Project Content Ends -->
                            </figure>
                        </li>
                        <!-- Portfolio Item Detail Ends -->
                        <!-- Portfolio Item Detail Starts -->
                        <li>
                            <figure>
                                <!-- Project Details Starts -->
                                <figcaption>
                                    <h3>Slider Project</h3>
                                    <div class="row open-sans-font">
                                        <div class="col-6 mb-2">
                                            <i class="fas fa-list pr-2"></i><span class="project-label">Project </span>: <span class="ft-wt-600 uppercase">Video</span>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <i class="fas fa-list pr-2"></i><span class="project-label">Client </span>: <span class="ft-wt-600 uppercase">Videohive</span>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <i class="fas fa-list pr-2"></i><span class="project-label">Langages </span>: <span class="ft-wt-600 uppercase">Adobe Premium</span>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <i class="fas fa-list pr-2"></i><span class="project-label">Preview </span>: <span class="ft-wt-600 uppercase"><a href="#" target="_blank">www.envato.com</a></span>
                                        </div>
                                    </div>
                                </figcaption>
                                <!-- Project Details Ends -->
                                <!-- Main Project Content Starts -->
                                <div id="slider" class="carousel slide portfolio-slider" data-ride="carousel" data-interval="false">
                                    <ol class="carousel-indicators">
                                        <li data-target="#slider" data-slide-to="0" class="active"></li>
                                        <li data-target="#slider" data-slide-to="1"></li>
                                        <li data-target="#slider" data-slide-to="2"></li>
                                    </ol>
                                    <!-- The slideshow -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="http://via.placeholder.com/895x552.jpg" alt="Portolio Image" />
                                        </div>
                                        <div class="carousel-item">
                                            <img src="http://via.placeholder.com/895x552.jpg" alt="Portolio Image" />
                                        </div>
                                        <div class="carousel-item">
                                            <img src="http://via.placeholder.com/895x552.jpg" alt="Portolio Image" />
                                        </div>
                                    </div>
                                </div>
                                <!-- Main Project Content Ends -->
                            </figure>
                        </li>
                        <!-- Portfolio Item Detail Ends -->
                        <!-- Portfolio Item Detail Starts -->
                        <li>
                            <figure>
                                <!-- Project Details Starts -->
                                <figcaption>
                                    <h3>Local Video Project</h3>
                                    <div class="row open-sans-font">
                                        <div class="col-6 mb-2">
                                            <i class="fas fa-list pr-2"></i><span class="project-label">Project </span>: <span class="ft-wt-600 uppercase">Video</span>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <i class="fas fa-list pr-2"></i><span class="project-label">Client </span>: <span class="ft-wt-600 uppercase">Videohive</span>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <i class="fas fa-list pr-2"></i><span class="project-label">Langages </span>: <span class="ft-wt-600 uppercase">Adobe Premium</span>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <i class="fas fa-list pr-2"></i><span class="project-label">Preview </span>: <span class="ft-wt-600 uppercase"><a href="#" target="_blank">www.envato.com</a></span>
                                        </div>
                                    </div>
                                </figcaption>
                                <!-- Project Details Ends -->
                                <!-- Main Project Content Starts -->
                                <video id="video" class="responsive-video" controls poster="http://via.placeholder.com/895x552.jpg">
                                    <source src="path_to_your_video" type="video/mp4">
                                </video>
                                <!-- Main Project Content Ends -->
                            </figure>
                        </li>
                        <!-- Portfolio Item Detail Ends -->
                        <!-- Portfolio Item Detail Starts -->
                        <li>
                            <figure>
                                <!-- Project Details Starts -->
                                <figcaption>
                                    <h3>Image Project</h3>
                                    <div class="row open-sans-font">
                                        <div class="col-6 mb-2">
                                            <i class="fas fa-list pr-2"></i><span class="project-label">Project </span>: <span class="ft-wt-600 uppercase">Video</span>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <i class="fas fa-list pr-2"></i><span class="project-label">Client </span>: <span class="ft-wt-600 uppercase">Videohive</span>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <i class="fas fa-list pr-2"></i><span class="project-label">Langages </span>: <span class="ft-wt-600 uppercase">Adobe Premium</span>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <i class="fas fa-list pr-2"></i><span class="project-label">Preview </span>: <span class="ft-wt-600 uppercase"><a href="#" target="_blank">www.envato.com</a></span>
                                        </div>
                                    </div>
                                </figcaption>
                                <!-- Project Details Ends -->
                                <!-- Main Project Content Starts -->
                                <img src="http://via.placeholder.com/895x552.jpg" alt="Portolio Image" />
                                <!-- Main Project Content Ends -->
                            </figure>
                        </li>
                        <!-- Portfolio Item Detail Ends -->
                        <!-- Portfolio Item Detail Starts -->
                        <li>
                            <figure>
                                <!-- Project Details Starts -->
                                <figcaption>
                                    <h3>Image Project</h3>
                                    <div class="row open-sans-font">
                                        <div class="col-6 mb-2">
                                            <i class="fas fa-list pr-2"></i><span class="project-label">Project </span>: <span class="ft-wt-600 uppercase">Video</span>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <i class="fas fa-list pr-2"></i><span class="project-label">Client </span>: <span class="ft-wt-600 uppercase">Videohive</span>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <i class="fas fa-list pr-2"></i><span class="project-label">Langages </span>: <span class="ft-wt-600 uppercase">Adobe Premium</span>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <i class="fas fa-list pr-2"></i><span class="project-label">Preview </span>: <span class="ft-wt-600 uppercase"><a href="#" target="_blank">www.envato.com</a></span>
                                        </div>
                                    </div>
                                </figcaption>
                                <!-- Project Details Ends -->
                                <!-- Main Project Content Starts -->
                                <img src="http://via.placeholder.com/895x552.jpg" alt="Portolio Image" />
                                <!-- Main Project Content Ends -->
                            </figure>
                        </li>
                        <!-- Portfolio Item Detail Ends -->
                        <!-- Portfolio Item Detail Starts -->
                        <li>
                            <figure>
                                <!-- Project Details Starts -->
                                <figcaption>
                                    <h3>Image Project</h3>
                                    <div class="row open-sans-font">
                                        <div class="col-6 mb-2">
                                            <i class="fas fa-list pr-2"></i><span class="project-label">Project </span>: <span class="ft-wt-600 uppercase">Video</span>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <i class="fas fa-list pr-2"></i><span class="project-label">Client </span>: <span class="ft-wt-600 uppercase">Videohive</span>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <i class="fas fa-list pr-2"></i><span class="project-label">Langages </span>: <span class="ft-wt-600 uppercase">Adobe Premium</span>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <i class="fas fa-list pr-2"></i><span class="project-label">Preview </span>: <span class="ft-wt-600 uppercase"><a href="#" target="_blank">www.envato.com</a></span>
                                        </div>
                                    </div>
                                </figcaption>
                                <!-- Project Details Ends -->
                                <!-- Main Project Content Starts -->
                                <img src="http://via.placeholder.com/895x552.jpg" alt="Portolio Image" />
                                <!-- Main Project Content Ends -->
                            </figure>
                        </li>
                        <!-- Portfolio Item Detail Ends -->
                        <!-- Portfolio Item Detail Starts -->
                        <li>
                            <figure>
                                <!-- Project Details Starts -->
                                <figcaption>
                                    <h3>Image Project</h3>
                                    <div class="row open-sans-font">
                                        <div class="col-6 mb-2">
                                            <i class="fas fa-list pr-2"></i><span class="project-label">Project </span>: <span class="ft-wt-600 uppercase">Video</span>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <i class="fas fa-list pr-2"></i><span class="project-label">Client </span>: <span class="ft-wt-600 uppercase">Videohive</span>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <i class="fas fa-list pr-2"></i><span class="project-label">Langages </span>: <span class="ft-wt-600 uppercase">Adobe Premium</span>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <i class="fas fa-list pr-2"></i><span class="project-label">Preview </span>: <span class="ft-wt-600 uppercase"><a href="#" target="_blank">www.envato.com</a></span>
                                        </div>
                                    </div>
                                </figcaption>
                                <!-- Project Details Ends -->
                                <!-- Main Project Content Starts -->
                                <img src="http://via.placeholder.com/895x552.jpg" alt="Portolio Image" />
                                <!-- Main Project Content Ends -->
                            </figure>
                        </li>
                        <!-- Portfolio Item Detail Ends -->
                        <!-- Portfolio Item Detail Starts -->
                        <li>
                            <figure>
                                <!-- Project Details Starts -->
                                <figcaption>
                                    <h3>Image Project</h3>
                                    <div class="row open-sans-font">
                                        <div class="col-6 mb-2">
                                            <i class="fas fa-list pr-2"></i><span class="project-label">Project </span>: <span class="ft-wt-600 uppercase">Video</span>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <i class="fas fa-list pr-2"></i><span class="project-label">Client </span>: <span class="ft-wt-600 uppercase">Videohive</span>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <i class="fas fa-list pr-2"></i><span class="project-label">Langages </span>: <span class="ft-wt-600 uppercase">Adobe Premium</span>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <i class="fas fa-list pr-2"></i><span class="project-label">Preview </span>: <span class="ft-wt-600 uppercase"><a href="#" target="_blank">www.envato.com</a></span>
                                        </div>
                                    </div>
                                </figcaption>
                                <!-- Project Details Ends -->
                                <!-- Main Project Content Starts -->
                                <img src="http://via.placeholder.com/895x552.jpg" alt="Portolio Image" />
                                <!-- Main Project Content Ends -->
                            </figure>
                        </li>
                        <!-- Portfolio Item Detail Ends -->
                    </ul>
                    <!-- Portfolio Navigation Starts -->
                    <nav>
                        <span class="icon nav-prev"><img src="{{ asset('uploads/img/dummy/navigation/left-arrow.png') }}" alt="previous"></span>
                        <span class="icon nav-next"><img src="{{ asset('uploads/img/dummy/navigation/right-arrow.png') }}" alt="next"></span>
                        <span class="nav-close"><img src="{{ asset('uploads/img/dummy/navigation/close-button.png') }}" alt="close"></span>
                    </nav>
                    <!-- Portfolio Navigation Ends -->
                </section>
            </div>
        </section>
    @endif
    <!-- Main Content Ends -->

@endsection
