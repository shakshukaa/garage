@extends('layouts.app')

@section('content')
    <h1>Create Customer</h1>
    <form action="{{ route('saveCustomerCreate') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input name="name" type="text" class="form-control" id="name" aria-describedby="name-help">
            <div id="name-help" class="form-text">Customer's name</div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input name="email" type="email" class="form-control" id="email">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input name="phone" type="tel" class="form-control" id="phone">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
