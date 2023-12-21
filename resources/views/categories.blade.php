<div class="container mt-4 mb-4">
    <h3 class="category-heading">Our Categories</h3>
    <div class="container mt-4">
        <img src="{{asset('/app/public/category_icons/6DvyRVyiUKAkrhnKLjAw4IpHvzxMoyZR7yzSNnil.png')}}" class="img-fluid rounded-circle profile-image" alt="Profile Image 1" data-toggle="tooltip" data-placement="bottom" title="Name 1">
        <img src="https://cdn-0.codingyaar.com/wp-content/uploads/bootstrap-profile-card-image.jpg" class="img-fluid rounded-circle profile-image" alt="Profile Image 2" data-toggle="tooltip" data-placement="bottom" title="Name 2">
        <img src="https://cdn-0.codingyaar.com/wp-content/uploads/bootstrap-profile-card-image.jpg" class="img-fluid rounded-circle profile-image" alt="Profile Image 3" data-toggle="tooltip" data-placement="bottom" title="Name 3">
        <img src="https://cdn-0.codingyaar.com/wp-content/uploads/bootstrap-profile-card-image.jpg" class="img-fluid rounded-circle profile-image" alt="Profile Image 4" data-toggle="tooltip" data-placement="bottom" title="Name 4">
        <img src="https://cdn-0.codingyaar.com/wp-content/uploads/bootstrap-profile-card-image.jpg" class="img-fluid rounded-circle profile-image" alt="Profile Image 5" data-toggle="tooltip" data-placement="bottom" title="Name 5">
        <img src="https://cdn-0.codingyaar.com/wp-content/uploads/bootstrap-profile-card-image.jpg" class="img-fluid rounded-circle profile-image" alt="Profile Image 6" data-toggle="tooltip" data-placement="bottom" title="Name 6">
        {{-- <img src="https://cdn-0.codingyaar.com/wp-content/uploads/bootstrap-profile-card-image.jpg" class="img-fluid rounded-circle profile-image" alt="Profile Image 7" data-toggle="tooltip" data-placement="bottom" title="Name 7"> --}}
      </div>
      
      <style>
        .container {
          margin-top: 20px;
          text-align: center;
        }
      
        .category-heading {
          text-decoration: underline;
          text-shadow: 2px 2px 2px rgba(255, 0, 0, 0.2);
        }
      
        .profile-image {
          width: 15%;
          border-radius: 50%;
          box-shadow: 0 0 10px rgba(0, 0, 0, .2);
          margin: 5px;
        }
      </style>
      
      <script>
        $(document).ready(function(){
          $('[data-toggle="tooltip"]').tooltip();
        });
      </script>
      
</div>