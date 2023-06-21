@extends('layouts.frontend')
@section('content')

    <!--Slider Section-->
    <section id="Slider">
        <div id="carouselExampleCaptions" class="carousel slide position-relative" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="{{url('frontend/assets/image/slider.png')}}
              " class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Asap Cair untuk Luka</h5>
                <p>Asap Cair Luka ini digunakan untuk mengobati berbagai macam penyakit luar seperti luka diabetes , maupun luka yang lainnya.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="{{url('frontend/assets/image/slider.png ')}}" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Asap Cair untuk Hama</h5>
                <p>Asap Ciar Hama digunakan untuk meningkatkan kualitas tanah dan menetralisir asam tanah, membunuh hama tanaman dan mengontrol pertumbuhan tanaman, pengusir serangga dan cocok bagi para petani.</p>
              </div>
            </div>
          </div>
          <button type="button" class="btn  button-pesan position-absolute top-50 start-50 translate-middle"><a href="https://wa.me/+6281324770103" style="color: #4E7258;" target="_blank">Pesan sekarang</a> </button>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </section>
    <!--End Hero section-->

    <!--Section about-->
      <section id="about">
        <div class="container">
          <div class="row">
            <div class="col-12 text-center text-about ">
              <h5>Asap Cair Dari Desa Tenajar</h5>
              <p>Terdapat dua jenis Asap Cair yaitu :
                Asap cair untuk luka dan juga Asap cair untuk hama
                terdapat banyak manfaat dari asap cair ini diantaranya :
                Asap Cair untuk Hama digunakan untuk meningkatkan kualitas tanah dan menetralisir asam tanah,
                membunuh hama tanaman dan mengontrol pertumbuhan tanaman, pengusir serangga dan cocok bagi para petani.
                dan juga Asap Cair untuk Luka ini digunakan untuk mengobati berbagai macam penyakit luar seperti luka diabetes , maupun luka yang lainnya
              </p>
            </div>
          </div>
        </div>

      </section>
    <!--End section about-->

    <!--Our services-->
      <section id="services">
        <div class="container">
          <div class="row">
            <div class="col-sm-6  offset-lg-3 offset-md-3">
              <h2 class="module-title font-alt">Produk  Kami</h2>
              <div class="module-subtitle font-serif">Asap Cair</div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 col-md-3 col-lg-3">
              <div class="alt-features-item">
                <div class="alt-features-icon"><span class="icon-strategy"></span></div>
                <h3 class="alt-features-title font-alt">Asap cair untuk hama</h3>meningkatkan kualitas tanah
              </div>
              <div class="alt-features-item">
                <div class="alt-features-icon"><span class="icon-tools-2"></span></div>
                <h3 class="alt-features-title font-alt">Asap Cair untuk hama</h3>menetralisir asam tanah
              </div>
              <div class="alt-features-item">
                <div class="alt-features-icon"><span class="icon-target"></span></div>
                <h3 class="alt-features-title font-alt">Asap Cair untuk hama</h3>membunuh hama tanaman dan mengontrol pertumbuhan tanaman
              </div>
              <div class="alt-features-item">
                <div class="alt-features-icon"><span class="icon-tools"></span></div>
                <h3 class="alt-features-title font-alt">Asap Cair untuk hama</h3> pengusir serangga dan cocok bagi para petani.
              </div>
            </div>
            <div class="col-md-6 col-lg-6 hidden-xs hidden-sm">
              <div class="alt-services-image align-center position-relative">
                <img src="{{url('frontend/assets/image/produk1.png ')}}" alt="Feature Image">
                <button type="button" class="btn  button-pesan position-absolute bottom-0 start-50 translate-middle"><a href="https://wa.me/+6281324770103" style="color: #4E7258;" target="_blank">Pesan Sekarang</a>
                </button>
              </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
              <div class="alt-features-item">
                <div class="alt-features-icon"><span class="icon-camera"></span></div>
                <h3 class="alt-features-title font-alt">Asap cair untuk luka</h3>mempercepat proses penyembuhan luka maupun sariawan.
              </div>
              <div class="alt-features-item">
                <div class="alt-features-icon"><span class="icon-mobile"></span></div>
                <h3 class="alt-features-title font-alt">Asap Cair untuk luka</h3>mempercepat penyembuhan sariawan dengan meningkatkan pertumbuhan jaringan ikat atau kolagen..
              </div>
              <div class="alt-features-item">
                <div class="alt-features-icon"><span class="icon-linegraph"></span></div>
                <h3 class="alt-features-title font-alt">Asap cair untuk luka</h3>mempercepat penyembuhan luka bakar.
              </div>
              <div class="alt-features-item">
                <div class="alt-features-icon"><span class="icon-basket"></span></div>
                <h3 class="alt-features-title font-alt">Asap cair untuk luka</h3>mengandung senyawa aktif fenol dan asam yang bersifat antibakteri dan antioksidan.
              </div>
            </div>
          </div>
        </div>
      </section>
    <!--End Our servicez-->




    <!--section Testimonial-->
    <section id="testimonial">
      <div id="carouselExampleControls" class="carousel slide text-center carousel-dark" data-mdb-ride="carousel">
        <div class="carousel-inner">

        @foreach ( $testimonials as $testimonial )

          <div class="carousel-item {{  $testimonial->id == '2' ? 'active' : ''  }}">
            <img class="rounded-circle shadow-1-strong mb-4"
            src="{{ $testimonial->url ? Storage::url($testimonial->url) : 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' }}"
            alt=""   style="width: 150px;" />
            <div class="row d-flex justify-content-center">
              <div class="col-lg-8">
                <h5 class="mb-3">{{$testimonial->nama}}</h5>
                <p><b>{{$testimonial->pekerjaan}}</b></p>
                <p class="text-muted komentar">
                  <i class="fas fa-quote-left pe-2"></i>
                {{ $testimonial->komentar}}
                </p>
              </div>
            </div>
          </div>

          @endforeach

        </div>
        <button class="carousel-control-prev" type="button" data-mdb-target="#carouselExampleControls"
          data-mdb-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-mdb-target="#carouselExampleControls"
          data-mdb-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section>
        <!--End testimonial Section-->


    <!--Produk section-->
    <section id="produk">
      <div class="container">

        <div class="row mb-5">
          <div class="col-12 text-center">
            <h2>Daftar Produk</h2>
          </div>
        </div>

        <div class="row">

        @foreach ($products as $product )

          <div class="col-lg-6 col-md-6 mb-4 d-flex justify-content-evenly">
            <div class="card p-2 "style="width: 22re;">
              <img
              src="{{ $product->galleries()->exists() ? Storage::url($product->galleries->first()->url) : 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' }}"
                style="height: 400px">
              <div class="card-body">
                <h4>
                    {{$product->name}}
                </h4>
                <p class="mb-3 lh-sm pt-3 mb-5">
                    <b> Rp. {{number_format($product->price) }}</b>
                  <span class="text-success d-block py-2"></span>{{Str::limit($product->description,50)}}</span>
                </p>
                <button class="btn button-detail position-absolute bottom-0 start-50 translate-middle"><a href="{{route('details',$product->id)}}">Lihat detail</a> </button>
              </div>
          </div>
         </div>

          @endforeach
            </div>
      </div>
    </section>
    <!--End Produk section-->



    <div class="row mb-3 mt-5">
        <div class="col-12 text-center">
          <h2>Profile Desa Tenajar</h2>
        </div>
      </div>

    <section id="profile">
        <div class="container">
            @foreach ($profile as $item )
            <div class="row mb-5 profile">
                <div class="col-12 col-sm-5  offset-sm-1 text-center ">
                    <img  src="{{ $item->url ? Storage::url($item->url) : 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' }}" alt="" style="height: 330px">
                </div>
                <div class="col-12 col-sm-6 text-center pt-5 sejarah">
                    <h3>{{$item->title}}</h3>


                    <p>{!! Str::limit($item->body,300) !!}</p>
                    <a href="{{route('profile',$item->id)}}">Lihat Selengkapnya....</a>


                    {{-- <p>{!! Str::limit($item->body,200) !!}</p>
                    <a href="{{route('profile',$item->id)}}">lihat selengkapnya....</a>
>>>>>>> 87b612b60831d30af28b7dbf9e7357e0b965b0b2 --}}
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!--Chart penjualan-->
    <section id="chart">
      <div class="container">
        <h2 class="text-center"> Statistik Hasil penjualan Asap Cair</h2>
        <canvas id="myChart"></canvas>
      </div>
    </section>
    <!--end Chart-->

    <!--Map -->
    <section id="map">
      <div class="container">
        <h3 class="text-center pb-3">
          Lokasi Kami
        </h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31712.53881398196!2d108.3446102129546!3d-6.513159532658096!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6ec3b900933e75%3A0x9de0796167974b16!2sTenajar%2C%20Kertasemaya%2C%20Indramayu%20Regency%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1686650707522!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>      </div>
    </section>
    <!--End Map-->

     <!--Chart-->
     <script>
        var labels =  {{ Js::from($labels) }};
        var users =  {{ Js::from($data) }};
        const data = {
        labels: labels,
        datasets: [{

            label: 'Total Penjualan Asap Cair',

            backgroundColor: 'rgb(81,202,169)',

            borderColor: 'rgb(98, 224, 185)',

            data: users,

        },]};

        const config = {

        type: 'bar',

        data: data,

        options: {}

        };

        const myChart = new Chart(

        document.getElementById('myChart'),

        config

);
      </script>

@endsection

