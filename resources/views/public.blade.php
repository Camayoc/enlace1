@extends('layouts.byuser')

@section('content')

@php
    $rss = [
        "twitch" => "https://www.twitch.tv/",
        "twitter" => "https://twitter.com/home",
        "facebook" => "https://www.facebook.com/",
    ];
@endphp
<div class="container">
    @foreach ($rss as $key => $item)
    <div class="row justify-content-center padding">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $key }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{ $item }}
                    </div>
                </div>
            </div>
            <br>
        </div>
    @endforeach
</div>
@endsection
