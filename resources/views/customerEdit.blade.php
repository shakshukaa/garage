@extends('layouts.app')

@section('content')
    <form action="{{ route('saveCustomerEdit', ['id' => $customer->id]) }}" method="post">
        {{ csrf_field() }}
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input name="name" value="{{ $customer->name }}" type="text" class="form-control" id="name" aria-describedby="name-help">
            <div id="name-help" class="form-text">Customer's name</div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input name="email" value="{{ $customer->email }}" type="email" class="form-control" id="email">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input name="phone" value="{{ $customer->phone }}" type="tel" class="form-control" id="phone">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
