@extends('layouts.app')
@section('title','Category')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            {{-- show msg --}}
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <div class="card">
                <div class="card-header ba-none row  justify-content-between">
                    <h4>
                        Products Details
                    </h4>
                    <a href="{{route('product.create')}}" class="btn btn-primary">Add Products</a>


                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Product name</th>
                                <th>Product price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product as $products)
                            <tr>
                                <td>{{ $products->id }}</td>
                                <td>{{ $products->category->name }}</td>
                                <td>{{ $products->name }}</td>
                                <td>{{ $products->price }}</td>
                                <td>
                                    <a href="{{route('product.edit', encrypt($products->id) )}}"
                                        class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{route('product.destroy', encrypt($products->id))}} --}}"
                                        method="POST" {{-- {{route('category.destroy', $category->id)}} --}}
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- pagination --}}
                {{ $product->links() }}

            </div>


        </div>

    </div>
</div>
</div>

@endsection