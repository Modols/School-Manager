@foreach ( $collection as $module)
    <div class="col-sm-6  text-center" >
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">{{ $module->name }}</h5>
                <p class="card-text">{{ $module->description }}</p>
                <a href="{{route('modules.show', ['module' => $module] )}}" class=" btn btn-lg btn-info text-white">Detail</a>
            </div>
        </div>
    </div>
@endforeach