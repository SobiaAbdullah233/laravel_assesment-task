@extends('layouts.app')
@section('content')
    <div class="container">
        <div>
            {{ @$product ? "Edit" : "Create New" }} Product
        </div>
        <div>
            <form action="{{ @$product ? route('products.update', @$product->id) : route('products.store') }}" method="post">
                @csrf
                @if(@$product)
                    @method('put')
                @endif
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="{{ @$product->name }}" required>
                </div>
                <div class="mb-3 mt-3">
                    <label for="description" class="form-label">Description:</label>
                    <input type="text" class="form-control" id="description" placeholder="Enter Description" name="description" value="{{ @$product->description }}" required>
                </div>
                <div class="mb-3 mt-3">
                    <label for="price" class="form-label">Price:</label>
                    <input type="number" class="form-control" id="price" placeholder="Enter Price" name="price" value="{{ @$product->price }}" required>
                </div>
                <div class="mb-3 mt-3">
                    <label for="quantity" class="form-label">Quantity:</label>
                    <input type="number" class="form-control" id="quantity" placeholder="Enter Quantity" name="quantity" value="{{ @$product->quantity }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
