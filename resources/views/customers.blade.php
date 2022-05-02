@extends('layouts.app')

@section('content')
<div class="row">
    @foreach($customers as $customer)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-dark"><span class="fw-bold">Name:</span> {{ $customer->name }}</h5>
                    <h5 class="text-dark"><span class="fw-bold">Phone:</span> {{ $customer->phone }}</h5>
                    <h5 class="text-dark"><span class="fw-bold">Email:</span> {{ $customer->email }}</h5>
                    <div class="d-flex justify-content-between mt-4">
                        <a class="btn btn-primary" href="{{ route('customerEdit', ['id' => $customer->id]) }}">Edit details</a>
                        <a class="btn btn-danger" href="{{ route('deleteCustomer', ['id' => $customer->id]) }}">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="row">
    {{ $customers->links() }}
</div>
@endsection
