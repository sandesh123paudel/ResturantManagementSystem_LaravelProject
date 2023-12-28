
  
  <div class="nav-section main-menu navbar-light bg-light header ">
    <div class="container ">
      
        <nav class="navbar navbar-expand-lg ">
          <a class="navbar-brand" href="/">
              <img src="{{asset('/images/logo.svg')}}" alt="Image" width="80" height="80" alt="" class="mr-5">
          </a>
      
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <h2 style="font-family: cursive">Silver Point Restaurant</h2>

            <div class="ml-auto">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="/" style="color: black;">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/menu" style="color: black;">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about" style="color: black;">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/contact" style="color: black;">Contact Us</a>
                  </li>
                  
                
                
                  
                
            
                

                <li class="nav-item dropdown">
                  @auth
                      @if(Auth::user()->role=='admin')
                          <a class="nav-link dropdown-toggle" style="color: black;" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              {{ Auth::user()->name }}
                          </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="{{ route('admin.dashboard') }}" style="color: black;">Dashboard</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="{{ route('admin.logout') }}" style="color: black;">Logout</a>
                          </div>
                      @else
                          <a class="nav-link dropdown-toggle" style="color: black;" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              {{ Auth::user()->name }}
                          </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('admin.dashboard') }}" style="color: black;">Dashboard</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('admin.dashboard') }}" style="color: black;">Logout</a>
                        </div>
                      @endif
                  @else
                      <a class="nav-link dropdown-toggle" style="color: black;" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Register
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ route('login') }}" style="color: black;">Login</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="{{ route('register') }}" style="color: black;">SignUp</a>
                      </div>
                  @endauth
              </li>
              @auth
              <li class="nav-item">
               @php

                   $cartCount=App\Helpers\CartHelper::CartCount();
               @endphp
                    <a class="nav-link"  style="color: coral" href="{{url('/cart',Auth::user()->id)}}" style="color: black;">Cart[{{$cartCount}}]</a>
              
            </li>
            
              @endauth
              @guest
              <li class="nav-item">
               
                     <a class="nav-link" style="color: red" href="" style="color: black;">Cart[0]</a>
               
             </li>
              @endguest
            
              
              
              
              </ul>
            </div>
          </div>
        </nav>
      
  </div>
  </div>





