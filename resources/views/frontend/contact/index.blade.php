@extends('layouts.frontend.master')

@section('content')


    <!-- Page Title Starts -->
   @if (isset($contact))
       @php
           // Explode
            $str = $contact->title;
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
           <span class="title-bg">{{ $contact->title_bg_name }}</span>
       </section>
       @else
       <section class="title-section text-left text-sm-center revealator-slideup revealator-once revealator-delay1">
           <h1>GET IN <span>TOUCH</span></h1>
           <span class="title-bg">Contact</span>
       </section>
   @endif
   <!-- Page Title Ends -->

    <!-- Main Content Starts -->
    <section class="main-content revealator-slideup revealator-once revealator-delay1">
        <div class="container">
            <!-- Include Alert Blade -->
            @include('admin.alert.alert')

            <div class="row">
                <!-- Left Side Starts -->
                <div class="col-12 col-lg-4">
                    @if (!empty($contact->custom_title)) <h3 class="text-uppercase custom-title mb-0 ft-wt-600 pb-3">{{ $contact->custom_title }}</h3> @endif
                    @if (!empty($contact->desc)) <p class="open-sans-font mb-3">{{ $contact->desc }}</p> @endif
                    @if (!empty($contact->email_title) || !empty($contact->email))
                        <p class="open-sans-font custom-span-contact position-relative">
                            <i class="fas fa-paper-plane position-absolute"></i>
                            <span class="d-block">{{ $contact->email_title }}</span>{{ $contact->email }}
                        </p>
                        @endif
                   @if (!empty($contact->phone_title) || !empty($contact->phone))
                        <p class="open-sans-font custom-span-contact position-relative">
                            <i class="fas fa-phone-alt position-absolute"></i>
                            <span class="d-block">{{ $contact->phone_title }}</span>{{ $contact->phone }}
                        </p>
                       @endif
                    @if (!empty($contact->address_title) || !empty($contact->address))
                        <p class="open-sans-font custom-span-contact position-relative">
                            <i class="fas fa-map-marker-alt position-absolute"></i>
                            <span class="d-block">{{ $contact->address_title }}</span>{{ $contact->address }}
                        </p>
                    @endif
                    <ul class="social list-unstyled pt-1 mb-5">
                        @foreach ($socials as $social)
                            <li class="facebook"><a title="Facebook" href="{{ $social->link }}"><i class="{{ $social->social_media }}"></i></a>
                            </li>
                            @endforeach
                    </ul>
                </div>
                <!-- Left Side Ends -->
                <!-- Contact Form Starts -->
                <div class="col-12 col-lg-8">
                    <form action="{{ route('contact-page.store') }}" method="POST">
                        @csrf
                        <div class="contactform">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <input type="text" name="name" placeholder="YOUR NAME" required>
                                </div>
                                <div class="col-12 col-md-4">
                                    <input type="email" name="email" placeholder="YOUR EMAIL" required>
                                </div>
                                <div class="col-12 col-md-4">
                                    <input type="text" name="subject" placeholder="YOUR SUBJECT" required>
                                </div>
                                <div class="col-12">
                                    <textarea name="message" placeholder="YOUR MESSAGE" required></textarea>
                                    <button type="submit" id="contactBtn" class="btn btn-contact">
                                        <i class="spinner fa fa-spinner fa-spin"></i> {{ __('Send') }}
                                    </button>
                                </div>
                                <div class="col-12 form-message">
                                    <span class="output_message text-center font-weight-600 text-uppercase"></span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Contact Form Ends -->
            </div>
        </div>

    </section>
    <!-- Template JS Files -->

@endsection
