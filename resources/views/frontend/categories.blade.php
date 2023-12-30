<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

<div class="container mt-4 mb-4">
    <h3 class="category-heading">Our Specialities</h3>
    <div id="categoryCarousel" class="slick-carousel">
        @foreach ($viewcategories as $category)
            <div class="profile-content">
                <a style="text-decoration: none" href="{{ route('products.searchSort', ['category' => $category->id]) }}">
                    <img src="{{ asset('storage/' . $category->category_icon) }}"
                    class="img-fluid rounded-circle profile-image" alt="Profile Image 1">
                <p class="category-name " style="color: rgba(23, 10, 10, 0.729); ">{{ $category->name }}</p>
                </a>

            </div>
        @endforeach
    </div>

    <style>
        .profile-container {
            border-radius: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .2);
            margin: 0 5px;
           
            align-items: stretch;
            width: 90%;
           
        }


        .profile-content {
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .slick-initialized .slick-slide {
            display: flex;
        }

        .category-name {
            margin-top: 5px;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }

        .category-heading {
            text-decoration: underline;
            text-align: center;
            text-shadow: 2px 2px 2px rgba(97, 92, 92, 0.605);
        }

        .profile-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            box-shadow: 0 0 10px rgba(0, 0, 0, .2);
            max-width: 100%;
            /* Ensure images are responsive */
        }
    </style>

    <script>
        $(document).ready(function() {
            $('#categoryCarousel').slick({
                slidesToShow: 5,
                slidesToScroll: 3,
                infinite: false,
                draggable: true,
                responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        infinite: false
                    }
                }],
                lazyLoad: 'ondemand',
                speed: 500,
            });
        });
    </script>
</div>
