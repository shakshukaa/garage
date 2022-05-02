@extends('layouts.app')

@section('content')
    <div class="mb-5">
        <h5 class="text-dark">Car model: {{ $car->name }}</h5>
    </div>
    @if(!empty($dates_overlap) && $dates_overlap == true)
       <div class="alert alert-danger">Rental for chosen car already exist for selected date range. Please choose other dates</div>
    @endif
    @if(!empty($start_greater_than_end) && $start_greater_than_end == true)
        <div class="alert alert-danger">Start date cannot be greater than end date. Please choose correct date range</div>
    @endif
    <form action="{{ route('saveCarRental', ['id' => $car->id]) }}" method="post">
        {{ csrf_field() }}
        <input class="d-none" name="car_id" type="number" value={{ $car->id }} id="car_id" />

        <label for="customer_id">Customer</label>
        <select name="customer_id" class="form-select mb-3" required>
            <option value={{ $customers[0]->id }}>{{ $customers[0]->name }}</option>
            @foreach($customers as $customer)
                <option value={{ $customer->id }}>{{ $customer->name }}</option>
            @endforeach
        </select>

        <div class="mb-3">
            <label for="start">Start date:</label>
            <input class="form-control" name="start" type="date" id="start" required>
        </div>
        <div class="mb-3">
            <label for="end">End date:</label>
            <input class="form-control" name="end" type="date" id="end" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
