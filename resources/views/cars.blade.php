@extends('layouts.app')

@section('content')
<div class="row">
    @foreach($cars as $car)
        <div class="col-md-3 mb-4">
            <div class="card">
                <img class="card-img-top" src="{{ $car->images[0] }}" />
                <div class="card-body">
                    <h5 class="text-dark card-title">{{ $car->name }}</h5>
                    <p class="text-primary card-text">Price: {{ $car->price }} UAH</p>
                    <div class="d-flex justify-content-between">
                        <a class="btn btn-primary" href="{{ route('car', ['id' => $car->id]) }}">
                            View Details
                        </a>
                        <a class="btn btn-danger" href="{{ route('deleteCar', ['id' => $car->id]) }}">
                            Delete
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="row">
    {{ $cars->links() }}
</div>
@endsection
