@extends('layouts.app')

@section('title')
Module List
@endsection

@section('body-title')
Module List 
@endsection

@section('content')
    <div class="d-flex flex-row-reverse mb-4">
        <a class="btn btn-lg btn-info text-white" href="{{ route('modules.create') }}">Create Module</a>
    </div>
    <br>

    @if($search)
        <h2>Search result for "{{ $search }}" : </h2>
    @endif

    <div class="row">
        @foreach ( $modules as $module)
        <div class="col-sm-6 mb-4">
            <div class="card text-center ">
                <div class="card-body">
                    <h5 class="card-title">{{ $module->name }}</h5>
                    <p class="card-text">{{ $module->description }}<br/>
                        This module is in {{ count($module->promotions) }} promotions and {{ count($module->students) }} students are registered.
                    </p>
                    <div class="row">
                        <div class="col-4">
                            <a href="{{route('modules.show', ['module' => $module] )}}" class="d-block btn btn-info text-white">Detail</a>
                        </div>
                        <div class="col-4">
                            <a href="{{route('modules.edit', ['module' => $module] )}}" class="d-block btn btn-success text-white">Edit</a>
                        </div>
                        <div class="col-4">
                            <form class="d-grid" method="POST" action="{{route('modules.destroy', ['module' => $module] )}}">
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




