

  <!--Navbar-->
  <nav class="navbar navbar-expand-lg  navbar-dark  nav-color position-fixed w-100 ">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="{{url('frontend/assets/image/logo.png ')}}"  style="width:45px;height45px"> Asap Cair
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item mx-3">
            <a class="nav-link active" aria-current="page" href="{{route('index')}}">BERANDA</a>
          </li>
          <li class="nav-item mx-3 ">
            <a class="nav-link active" href="{{route('index')}}#produk">PRODUK</a>
          </li>
          <li class="nav-item mx-3 ">
            <a class="nav-link active" href="{{route('index')}}#profile">PROFILE</a>
          </li>
          <li class="nav-item mx-3 ">
            <a class="nav-link active" href="{{route('index')}}#map">TENTANG</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<!--End Navbar-->
