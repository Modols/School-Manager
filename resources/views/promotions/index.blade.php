@extends('layouts.app')

@section('title')
    Promotion List
@endsection

@section('body-title')
Promotion List
@endsection

@section('content')
<div class="row">
    @foreach ( $promotions as $promotion)
        <div class="col-sm-4">
            <div class="card" style="width: 18rem; margin-bottom: 10px; margin-top: 10px;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $promotion->name }} | {{ $promotion->speciality }}</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection




