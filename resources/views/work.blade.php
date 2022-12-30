@extends('layouts.master')
@section('content')
    @include('components.site.header', ['dataPage' => 'workCategory'])
    <main id="main" class="mt-5">
        
        <section id="portfolio-details" style="margin-top: 200px" class="portfolio-details">
            <div class="container">
      
              <div class="row gy-4">
      
                <div class="col-lg-8">

                    <div class="work-banner">
                        <img src="{{asset('/storage/' . $work->image)}}" style="width: 100%" alt="">
                    </div>

                  {{-- <div class="portfolio-details-slider swiper">
                    <div class="swiper-wrapper align-items-center">
      
                      <div class="swiper-slide">
                        <img src="{{asset('/storage/' . $work->image)}}" alt="">
                      </div>
      
                    </div>
                    <div class="swiper-pagination"></div>
                  </div> --}}
                </div>
      
                <div class="col-lg-4">
                  <div class="portfolio-info">
                    <h3>{{$work->title}}</h3>
                    <ul style="text-transform:capitalize">
                      <li><strong>Category</strong>: {{$workTypes[$work->type]}}</li>
                      @if ($work->published_at)
                      <li><strong>Publish Date</strong>: {{$work->published_at->format('d M, y')}} 01 March, 2020</li>
                      @endif
                      <li><strong>Music URL</strong>: <a href="{{$work->work_link}}" target="_blank" class="text-primary">Go To Music</a></li>
                    </ul>
                  </div>
                  @if ($work->description)
                    <div class="portfolio-description">
                        <h2>Music Words</h2>
                        <p dir="rtl">
                            {{$work->description}}
                        </p>
                    </div>
                    @endif
                </div>
      
              </div>
      
            </div>
          </section>
        
        <section id="contact" class="paralax-mf footer-paralax bg-image sect-mt4 route"
            style="background-image: url(assets/img/overlay-bg.jpg)">
            <div class="overlay-mf"></div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="contact-mf">
                            <div id="contact" class="box-shadow-full">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="title-box-2">
                                            <h5 class="title-left">
                                                Send Message Us
                                            </h5>
                                        </div>
                                        <div>
                                            <form action="/contact" method="post" role="form">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <div class="form-group">
                                                            <input type="text" name="name" class="form-control"
                                                                id="name" placeholder="Your Name" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <div class="form-group">
                                                            <input type="email" class="form-control" name="email"
                                                                id="email" placeholder="Your Email" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="subject"
                                                                id="subject" placeholder="Subject" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 text-center my-3">
                                                        @if(session('send-message-response'))
                                                            @php
                                                                $messages = session('send-message-response')['messages'];
                                                                $status = session('send-message-response')['status'];
                                                            @endphp
                                                            <div class="response-content position-fixed" style="top: 100px; left: 50px">
                                                                @foreach ($messages as $msg)
                                                                    <div class="alert alert-{{$status ? 'success':'danger'}} d-flex justify-content-between" style="min-width: 300px"> {{$msg}}
                                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-12 text-center">
                                                        <button type="submit"
                                                            class="button button-a button-big button-rouded">Send
                                                            Message</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="title-box-2 pt-4 pt-md-0">
                                            <h5 class="title-left">
                                                Get in Touch
                                            </h5>
                                        </div>
                                        <div class="more-info">
                                            <p class="lead">
                                                send us a message we are happy to get in touch with you and we will never stop surprise you.
                                            </p>
                                            <ul class="list-ico">
                                                <li><span class="bi bi-phone"></span> {{$user->phone}} </li>
                                                <li><span class="bi bi-envelope"></span> {{$user->email}}</li>
                                            </ul>
                                        </div>
                                        <div class="socials">
                                            <ul>
                                                @if(isset($home['facebook_link']) && $home['facebook_link'])
                                                <li>
                                                    <a href="{{$home['facebook_link']}}">
                                                        <span class="ico-circle" style="padding: 3px">
                                                            <i class="bi bi-facebook"></i>
                                                        </span>
                                                    </a>
                                                </li>
                                                @endif
                                                @if(isset($home['youtube_link']) && $home['youtube_link'])
                                                <li>
                                                    <a href="{{$home['youtube_link']}}">
                                                        <span class="ico-circle" style="padding: 3px">
                                                            <i class="bi bi-youtube"></i>
                                                        </span>
                                                    </a>
                                                </li>
                                                @endif
                                                @if(isset($home['instagram_link']) && $home['instagram_link'])
                                                <li>
                                                    <a href="{{$home['instagram_link']}}">
                                                        <span class="ico-circle" style="padding: 3px">
                                                            <i class="bi bi-instagram"></i>
                                                        </span>
                                                    </a>
                                                </li>
                                                @endif
                                                @if(isset($home['twitter_link']) && $home['twitter_link'])
                                                <li>
                                                    <a href="{{$home['twitter_link']}}">
                                                        <span class="ico-circle" style="padding: 3px">
                                                            <i class="bi bi-twitter"></i>
                                                        </span>
                                                    </a>
                                                </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="copyright-box">
                        <p class="copyright">&copy; Copyright <strong>Muslim</strong>. All Rights Reserved</p>
                        <div class="credits"></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
@endsection