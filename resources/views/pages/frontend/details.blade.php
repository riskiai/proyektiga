@extends('layouts.frontend')
@section('content')
<!--Section Detail Produk-->

<section id="detail-produk">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 pb-5">
                <img src="{{ $product->galleries()->exists() ? Storage::url($product->galleries->first()->url) : 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' }}"
                    alt="">
            </div>
            <div class="col-lg-6  position-relative">
                <h2>
                    {{$product->name}}
                </h2>
                <p>
                    {{$product->description}}
                </p>
                <p>
                    <b>Terjual : @foreach ($statistik as $item)
                        {{$item->total_penjualan}}
                        @endforeach </b>
                </p>
                <button type="button" class="btn  button-pesan "><a href="https://wa.me/+6281324770103"
                        style="color: #4E7258;" target="_blank">Pesan sekarang</a> </button>
            </div>
        </div>
        <div class="card-komentar mt-5">
            <div class="p-3">
                <h6>Comments</h6>
            </div>
            <div class="mt-2">
                @foreach ($product->comments as $item)

                <hr>
                <div class="d-flex flex-row p-3"> <img src="{{url('frontend/assets/image/user.png')}}"
                        style="width: 40px;height:40px" class="rounded-circle mr-3 me-3">
                    <div class="w-100">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-row align-items-center"><span class="mr-2 comment-name"><B>{{$item->name}}</B></span>
                            </div>
                        </div>
                        <small>{{$item->created_at}}</small>
                        <p class="text-justify comment-text mb-0 ">{{$item->body}}</p>
                    </div>
                </div>

                @endforeach

            </div>
            <form method="post" action="{{ route('comments.store', $product->id) }}" class = "row-cols-lg-auto g-3" >
                @csrf
                <div class="mb-3 col-sm-6 ">
                    <label for="nama" name="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="name" aria-describedby="nama">
                </div>
                <div class="form-floating col-sm-6 col-lg-auto">
                    <textarea class="form-control" name="body" placeholder="Leave a comment here" id="floatingTextarea"
                        style="height: 100px"></textarea>
                    <label for="floatingTextarea">Isi komentar...</label>
                </div>
                <button type="submit" class="btn btn-success mt-3">Tambahkan komentar</button>
            </form>
        </div>
</section>

<!--end Section Produk-->

<!--end Section Produk-->
@endsection
