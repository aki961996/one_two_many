@extends('layouts.app')
@section('title','Create')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header ba-none row  justify-content-between">
                    <h4>
                        Add Category
                    </h4>
                    <a href="{{route('category.index')}}" class="btn btn-primary">Back</a>

                </div>
                <div class="card-body">
                    <form action="{{route('category.store')}}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name') }}">
                            @if($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
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