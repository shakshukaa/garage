@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div id="car-images-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($car->images as $image)
                    @if($loop->first)
                    <div class="carousel-item active">
                        <img src="{{ $image }}" class="d-block w-100">
                    </div>
                    @else
                        <div class="carousel-item">
                            <img src="{{ $image }}" class="d-block w-100">
                        </div>
                    @endif
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#car-images-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#car-images-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        </div>
        <div class="col-md-4">
            <h2 class="display-6">{{ $car->name }}</h2>
            <p class="text-dark text-body">{{ $car->description }}</p>
            <span class="text-primary d-block">Price: {{ $car->price }} UAH</span>
            <div class="mt-3">
                <a href="{{ route('carEdit', ['id' => $car->id]) }}" type="button" class="btn btn-primary">
                    Edit Car
                </a>
                <a href="{{ route('carRental', ['id' => $car->id]) }}" type="button" class="btn btn-success">
                    Rent Car
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2 class="display-7 mt-5">Rent list</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Rental id</th>
                        <th scope="col">Customer name</th>
                        <th scope="col">Customer email</th>
                        <th scope="col">Customer phone</th>
                        <th scope="col">Start date</th>
                        <th scope="col">End date</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rentals as $rental)
                        <tr>
                            <th scope="col">{{ $rental->id }}</th>
                            <td>{{ $rental->customer->name }}</td>
                            <td>{{ $rental->customer->email }}</td>
                            <td>{{ $rental->customer->phone }}</td>
                            <td>{{ $rental->start }}</td>
                            <td>{{ $rental->end }}</td>
                            @if(!$rental->is_completed)
                            <td>
                                <a class="btn btn-outline-success" href="{{ route('completeRental', ['carId' => $car->id, 'rentalId' => $rental->id]) }}">
                                    <i class="bi bi-check"></i> Mark as completed
                                </a>
                            </td>
                            @else
                            <td>
                                <span class="text-success font-weight-bold">
                                    Rental successfully completed
                                </span>
                            </td>
                            @endif
                            <td>
                                <a class="btn btn-outline-danger" href="{{ route('deleteRental', ['carId' => $car->id, 'rentalId' => $rental->id]) }}">
                                    <i class="bi bi-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
