@extends('layouts.app')

@section('title')
Promotion List
@endsection

@section('body-title')
Promotion List 
@endsection



@section('content')
    <div class="d-flex flex-row-reverse">
        <a class="btn btn-info text-white btn-lg" href="{{ route('promotions.create') }}">Create Promotion</a>
    </div>
    <br>
    @if($search)
        <h2>Search result for "{{ $search }}" : </h2>
    @endif

    <div class="row">
        @foreach ( $promotions as $promotion)
            <div class="col-xl-4 ">
                <div class="card text-center" style="width: 25rem; margin-bottom: 10px; margin-top: 10px;">
                    <img src="https://media-exp1.licdn.com/dms/image/C4D0BAQEtPcuS0jOZwg/company-logo_200_200/0/1523001943274?e=2159024400&v=beta&t=fIaMqQiFChNjs325flIBsQ0p3JNvACKoatsoQzNvlWc" class="card-img-top" alt="Ynov Picture" >
                    <div class="card-body">
                        <h5 class="card-title mb-4">{{ $promotion->name }} | {{ $promotion->speciality }}</h5>
                        <p class="card-text">This promotion contains {{count($promotion->modules)}} modules and {{count($promotion->students)}} students.</p>
                        <div class="row  ">
                            <div class="col-12 mb-2 ">
                                <a href="{{ route('promotions.show', ['promotion' => $promotion]) }}" class="d-block btn btn-info text-white">Detail</a>
                            </div>
                            <div class="col-12 mb-2 ">
                                <a href="{{ route('promotions.edit', ['promotion' => $promotion]) }}" class="d-block btn btn-success text-white">Edit</a>
                            </div>
                            <div class="col-12 ">
                                <form class="d-grid" method="POST" action="{{route('promotions.destroy', ['promotion' => $promotion] )}}">
                                    @method("DELETE")
                                    @csrf
                                    <button type="submit" class="d-block btn btn-danger text-white">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection




