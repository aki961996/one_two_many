@extends('layouts.app')
@section('title','Update')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header ba-none row  justify-content-between">
                    <h4>
                        Update Products
                    </h4>
                    <a href="{{route('product.index')}}" class="btn btn-primary">Back</a>

                </div>
                <div class="card-body">
                    <form action="{{route('product.update')}}" method="POST">
                        @csrf

                        <input type="hidden" id="category_id" name="category_id" value="{{$product->id}}" />
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ $product->name}}">
                            @if($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                            @endif


                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Product price</label>
                            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price"
                                name="price" value="{{ $product->price}}">
                            @if($errors->has('price'))
                            <div class="invalid-feedback">
                                {{ $errors->first('price') }}
                            </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                </div>
                </form>
            </div>
        </div>


    </div>

</div>
</div>
</div>

@endsection