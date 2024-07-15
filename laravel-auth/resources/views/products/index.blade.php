@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="fs-3 text-center">
            Products
        </div>
        <div class="text-center my-3">
            <a href="{{route('products.create')}}" class="btn btn-primary">Create Product</a>
        </div>

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Error!</strong> {{ session('error') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr class="align-middle">
                        <td>{{$product->name}}</td>
                        <td>{{ $product->description }}</td>
                        <td>${{ $product->price }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td class="d-flex gap-2">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info">Edit</a>
                            <form action="{{route('products.destroy', $product->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
