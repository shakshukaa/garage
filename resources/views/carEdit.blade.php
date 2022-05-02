@extends('layouts.app')

@section('content')
    <form action="{{ route('saveCarEdit', ['id' => $car->id]) }}" method="post">
        {{ csrf_field() }}
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input name="name" value="{{ $car->name }}" type="text" class="form-control" id="name" aria-describedby="name-help">
            <div id="name-help" class="form-text">Name of the car</div>
        </div>
        <div class="mb-3">
            <label for="rent-price" class="form-label">Rent price</label>
            <input name="price" value="{{ $car->price }}" type="number" class="form-control" id="name" aria-describedby="rent-price-help">
            <div id="rent-price-help" class="form-text">Rent price per day</div>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description" rows="5">{{ $car->description }}</textarea>
            <div id="description-help" class="form-text">Description of the car</div>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
