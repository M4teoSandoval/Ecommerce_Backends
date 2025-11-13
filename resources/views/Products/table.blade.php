@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0">
                <h4>Products Table</h4>
            </div>
            <div>
                <a class="btn btn-primary m-3" href='{{ route('admin.products.create') }}' type="button">
                    Add new Product
                </a>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            {{-- <th>Description</th> --}}
                            <th>Price</th>
                            <th>Brand</th>
                            <th>Category</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                {{-- <td>{{ $product->description }}</td> --}}
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->brand_id }}</td>
                                <td>{{ $product->category_id }}</td>
                                <td>{{ $product->created_at }}</td>
                                <td>{{ $product->updated_at }}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $products->links() }}
                </div>


            </div>
        </div>
    </div>
@endsection
