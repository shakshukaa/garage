@extends('layouts.app')

@section('content')
    <h1>Create Car</h1>
    <form action="{{ route('saveCarCreate') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input name="name" type="text" class="form-control" id="name" aria-describedby="name-help">
            <div id="name-help" class="form-text">Name of the car</div>
        </div>
        <div class="mb-3">
            <label for="rent-price" class="form-label">Rent price</label>
            <input name="price" type="number" class="form-control" id="name" aria-describedby="rent-price-help">
            <div id="rent-price-help" class="form-text">Rent price per day</div>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description" rows="5"></textarea>
            <div id="description-help" class="form-text">Description of the car</div>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Images of car</label>
            <input name="image[]" accept="image/png, image/gif, image/jpeg" class="form-control" type="file" id="images" multiple>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
