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
                        Category Details
                    </h4>
                    <a href="{{route('category.create')}}" class="btn btn-primary">Add Category</a>


                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <a href="{{route('category.edit', encrypt($category->id) )}}"
                                        class="btn btn-sm btn-primary">Edit</a>
                                    <form action="" method="POST" {{-- {{route('category.destroy', $category->id)}} --}}
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table </div>
                </div>


            </div>

        </div>
    </div>
</div>

@endsection