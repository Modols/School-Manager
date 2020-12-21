@foreach ( $collection as $promotion)
    <div class="col-sm-6  text-center" >
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">{{ $promotion->name }}</h5>
                <p class="card-text">{{ $promotion->speciality }}</p>
                <a href="{{ route('promotions.show', ['promotion'=>$promotion]) }}" class=" btn btn-info text-white">Detail</a>
            </div>
        </div>
    </div>
@endforeach