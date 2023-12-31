@extends('frontend.master')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="container">
            <div class="row">
                <!-- Map on the left side -->
                <div class="col-md-6">
                    <div class="map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.814291421619!2d85.31694337518081!3d27.692134076191305!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19b19295555f%3A0xabfe5f4b310f97de!2sThe%20British%20College%2C%20Kathmandu!5e0!3m2!1sen!2snp!4v1703657607458!5m2!1sen!2snp"
                            width="100%" height="650pxs" style="border:0;" allowfullscreen="" loading="fast"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

                <!-- Contact form on the right side -->
                <div class="col-md-6">
                    <div class="contact-form card p-4">
                        <h1 class="title mb-4">Contact Us</h1>
                        <h2 class="subtitle mb-4">We are here to assist you.</h2>
                        @if (Session::has('message_sent'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('message_sent') }}
                            </div>
                        @endif

                        <form action="{{ route('contact.submit') }}" method="post" class="my-4" id="contactForm">
                            @csrf

                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" required
                                    value="{{ old('name') }}" />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Your E-mail Address"
                                    required value="{{ old('email') }}" />
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="tel" name="phone" class="form-control" placeholder="Your Phone Number"
                                    required value="{{ old('phone') }}" />
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea name="message" class="form-control" rows="6" placeholder="Your Message" required>{{ old('message') }}</textarea>
                                @error('message')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-secondary btn-send">Get a Call Back</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
