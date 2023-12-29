@extends('frontend.master')

@section('content')

<section class="about-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="section-title mb-4">Welcome to Silver Point Restaurant</h2>
                <p class="text-justify">
                    At Silver Point, we take pride in delivering an exceptional dining experience to our valued customers. Our passion for great food and excellent service is what sets us apart.
                </p>
                <p class="text-justify">
                    Established with a commitment to culinary excellence, Silver Point is more than just a restaurant; it's a place where flavors come alive, and every meal is a celebration.
                </p>
            </div>
            <div class="col-md-6">
             
                <img src="https://images.rawpixel.com/image_800/cHJpdmF0ZS9sci9pbWFnZXMvd2Vic2l0ZS8yMDIyLTA1L3Vwd2s2MTY2MTU3Ny13aWtpbWVkaWEtaW1hZ2Uta293YXBlZWouanBn.jpg" alt="Restaurant Image" class="img-fluid rounded">
            </div>
        </div>
    </div>
</section>

<section class="mission-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="section-title mb-4">Our Mission</h2>
                <p class="text-justify">
                    At Silver Point, our mission is to delight our guests with delectable dishes made from the finest ingredients. We strive to create a warm and inviting atmosphere, making every visit a memorable experience.
                </p>
                <p class="text-justify">
                    From our kitchen to your table, we are dedicated to providing culinary excellence and ensuring that your dining experience exceeds expectations.
                </p>
            </div>
        </div>
    </div>
</section>


<section class="chef-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="section-title mb-4">Meet Our Chef</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
                <img src="https://png.pngtree.com/png-clipart/20220705/ourmid/pngtree-illustration-of-male-chef-png-image_5683388.png" alt="Chef Image" class="img-fluid rounded-circle mb-3">
                <h3 class="mb-2">Chef Salt Bae</h3>
                <p class="text-justify">
                    With a passion for creating culinary masterpieces, Chef Salt Bae brings innovation and a wealth of experience to Silver Point. His dedication to crafting delightful dishes is the driving force behind our exceptional menu.
                </p>
            </div>
        </div>
    </div>
</section>



<section class="testimonials-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="section-title mb-4">What Our Customers Say</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="testimonial-card text-center p-4">
                    <p class="mb-3">"Amazing food and great atmosphere. Silver Point is my go-to place for a delightful dining experience."</p>
                    <p class="testimonial-author">- Jane Doe</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial-card text-center p-4">
                    <p class="mb-3">"The flavors are unmatched, and the service is impeccable. Silver Point sets the standard for excellence in dining."</p>
                    <p class="testimonial-author">- John Smith</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial-card text-center p-4">
                    <p class="mb-3">"A culinary delight! Silver Point never fails to impress with its diverse menu and top-notch quality."</p>
                    <p class="testimonial-author">- Emily Johnson</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
