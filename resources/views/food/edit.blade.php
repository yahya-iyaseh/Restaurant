@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        @if (Session::has('message'))
          <div class="alert alert-success fade show">{{ Session::get('message') }}</div>
        @endif
        <form action="{{ route('food.update', [$food->id]) }}" method="post" enctype="multipart/form-data">@csrf
          @method('PUT')
          <div class="card">
            <div class="card-header">update Food</div>

            <div class="card-body">
              <div class="form-group">

                <input type="text" name="name" class="form-control mb-2 @error('name') is-invalid @enderror" placeholder="Name" value="{{ $food->name }}">
                @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror

                <div class="form-floating mb-2">
                  <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ $food->description }}</textarea>
                  <label for="floatingTextarea">Description</label>
                  @error('description')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <input type="number" name="price" class="form-control mb-2 @error('price') is-invalid @enderror" placeholder="price" value="{{ $food->price }}">
                @error('price')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror

                <select name="category" class="form-select mb-2 @error('category') is-invalid @enderror" aria-label="Default select example">
                  <option value="">Select Category</option>

                  @foreach (App\models\category::all() as $category)
                    <option value="{{ $category->id }}" @if ($category->id == $food->category->id) selected @endif>{{ $category->name }}</option>
                  @endforeach
                </select>
                @error('category')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror


                <input class="form-control mb-3 @error('image') @enderror" type="file" name="image">
                @error('image')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror


                <div class="d-grid gap-2 form-group mb-2">
                  <input type="submit" value="Update" class="btn btn-primary text-ligth control" type="submit">
                </div>

                <div class="d-grid gap-2 form-group mb-2">
                  <a href="{{ route('food.index') }}" class="btn btn-dark text-light control">Back</a>
                </div>

              </div>

            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
