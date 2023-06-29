@extends('frontend.layouts.main2')

@section('main-container')
    <!--team section start -->
    <div class="team_section layout_padding">
      <div class="container">
        <h1 class="what_taital">Our Team and experts</h1>
        <p class="what_text_1">It is a long established fact that a reader will be distracted by the readable content of a </p>
        <div class="team_section_2 layout_padding">
          <div class="row">
            <div class="col-sm-3">
              <img src="{{url('frontend/images/img-7.png')}}" class="image_7">
              <p class="readable_text">Readable</p>
              <p class="readable_text_1">Follow Us</p>
              <div class="social_icon">
                <ul>
                  <li><a href="{{url('/team')}}"><img src="{{url('frontend/images/fb-icon.png')}}"></a></li>
                  <li><a href="{{url('/team')}}"><img src="{{url('frontend/images/twitter-icon.png')}}"></a></li>
                  <li><a href="{{url('/team')}}"><img src="{{url('frontend/images/linkedin-icon.png')}}"></a></li>
                </ul>
              </div>
            </div>
            <div class="col-sm-3">
              <img src="{{url('frontend/images/img-8.png')}}" class="image_7">
              <p class="readable_text">Content</p>
              <p class="readable_text_1">Follow Us</p>
              <div class="social_icon">
                <ul>
                  <li><a href="{{url('/team')}}"><img src="{{url('frontend/images/fb-icon.png')}}"></a></li>
                  <li><a href="{{url('/team')}}"><img src="{{url('frontend/images/twitter-icon.png')}}"></a></li>
                  <li><a href="{{url('/team')}}"><img src="{{url('frontend/images/linkedin-icon.png')}}"></a></li>
                </ul>
              </div>
            </div>
            <div class="col-sm-3">
              <img src="{{url('frontend/images/img-9.png')}}" class="image_7">
              <p class="readable_text">Readable</p>
              <p class="readable_text_1">Follow Us</p>
              <div class="social_icon">
                <ul>
                  <li><a href="{{url('/team')}}"><img src="{{url('frontend/images/fb-icon.png')}}"></a></li>
                  <li><a href="{{url('/team')}}"><img src="{{url('frontend/images/twitter-icon.png')}}"></a></li>
                  <li><a href="{{url('/team')}}"><img src="{{url('frontend/images/linkedin-icon.png')}}"></a></li>
                </ul>
              </div>
            </div>
            <div class="col-sm-3">
              <img src="{{url('frontend/images/img-10.png')}}" class="image_7">
              <p class="readable_text">Content</p>
              <p class="readable_text_1">Follow Us</p>
              <div class="social_icon">
                <ul>
                  <li><a href="{{url('/team')}}"><img src="{{url('frontend/images/fb-icon.png')}}"></a></li>
                  <li><a href="{{url('/team')}}"><img src="{{url('frontend/images/twitter-icon.png')}}"></a></li>
                  <li><a href="{{url('/team')}}"><img src="{{url('frontend/images/linkedin-icon.png')}}"></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--team section end -->
@endsection
