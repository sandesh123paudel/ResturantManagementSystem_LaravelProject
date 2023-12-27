@extends('master')

@section('content')
    <div class="container mt-5">
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

                        <form action="{{ route('contact.submit') }}" method="post" class="my-4" id="contactForm">
                            @csrf

                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Your Name"
                                    required />
                            </div>
                            <div class="form-group">
                                <input type="email" name="e-mail" class="form-control" placeholder="Your E-mail Address"
                                    required />
                            </div>
                            <div class="form-group">
                                <input type="tel" name="phone" class="form-control" placeholder="Your Phone Number"
                                    required />
                            </div>
                            <div class="form-group">
                                <textarea name="text" class="form-control" rows="6" placeholder="Your Message"
                                    required></textarea>
                            </div>
                            <button type="submit" class="btn btn-secondary btn-send">Get a Call Back</button>
                        </form>

                        <!-- Display message details -->
                        @isset($data)
                            <p>Name: {{ $data['name'] }}</p>
                            <p>Email: {{ $data['email'] }}</p>
                            <p>Phone: {{ $data['phone'] }}</p>
                            <p>Message: {{ $data['text'] ?? '' }}</p>

                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('#contactForm');

        form.addEventListener('submit', function(event) {
            event.preventDefault();

            fetch(form.action, {
                    method: form.method,
                    body: new FormData(form),
                })
                .then(response => {
                    if (response.ok) {
                        // Show the thank you alert
                        alert('Thank you! Your message has been sent successfully.');
                        form.reset(); // Optionally reset the form after successful submission
                    } else {
                        // Handle errors if needed
                        alert('Oops! Something went wrong.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Oops! Something went wrong.');
                });
        });
    });
</script>
