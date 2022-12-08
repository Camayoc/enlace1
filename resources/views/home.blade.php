@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <links-manager>
                    @if (auth()->user()->enlace == null)
                        <completing-link prepend="{{ url('/') . '/link/' }}"></completing-link>
                    @endif
                </links-manager>
            </div>
        </div>
    </div>
@endsection
