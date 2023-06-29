@extends('frontend.layouts.main2')

@section('main-container')
    <!-- contact section start -->
    <div class="contact_section layout_padding">
      <div class="container-fluid">
        <h1 class="what_taital">Contact us</h1>
        <p class="amet_text">amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore </p>
        <form action="" method="Post">
            <div class="contact_section2">
            <div class="row">
                <div class="col-md-6 padding_left_0">
                <div class="mail_section">
                    <input type="name" class="mail_text_1" placeholder="Name" name="name" value="">
                    <input type="number" class="mail_text_1" placeholder="Phone Number" name="phonen_umber" value="">
                    <input type="email" class="mail_text_1" placeholder="Email" name="email" value="">
                    <textarea class="massage_text" placeholder="Message" rows="5" id="comment" name="message" value="">
                    </textarea>
                    <div class="send_bt"><a href="{{url('/contact')}}">send</a></div>
                </div>
                </div>
                <div class="col-md-6 padding_0">
                <div class="map-responsive">
                    <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Eiffel+Tower+Paris+France" width="600" height="400" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
                </div>
                </div>
            </div>
            </div>
        </form>
      </div>
    </div>
    <!-- contact section end -->
@endsection
