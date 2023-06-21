@extends('layouts.frontend')
@section('content')
    <section id="detail_profile ">
        <div class="container ">
            <div class="row">
                @foreach ($profile as $item )
                <div class="col-12">
                    <img src="{{ $item->url ? Storage::url($item->url) : 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' }}" style="width: 100%">
                </div>
                <div class="col-12 mt-3">
                    <h3>{{$item->title}}</h3>
                    <p>
                        {!! $item->body !!}
                    </p>
                </div>
                @endforeach
            </div>
        </div>

    </section>
@endsection
