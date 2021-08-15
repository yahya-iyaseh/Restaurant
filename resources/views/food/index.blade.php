@extends('layouts.app')
<style>
  td {
    text-align: center;
    vertical-align: middle;
    overflow: hidden;
  }

  form {
    margin: 0;
    padding: 0;
  }

  img {
    object-fit: cover;
    width: 100%;
    height: 300px;
    min-width: 240px
  }

</style>
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card w-100">
          <div class="card-header">
            <h2>Foods</h2>
          </div>

          <div class="card-body">
            @if (Session::has('message-update'))
              <div class="alert alert-success fade show">
                <strong>Success</strong> The Food Was Upadated
              </div>
            @endif
            @if (Session::has('message-delete'))
              <div class="alert alert-danger fade show">
                <strong>Success</strong> The Food Was Deletead
              </div>
            @endif
            @if (count($foods) > 0)


              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">price</th>
                    <th scope="col">category</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($foods as $key => $food)
                    <tr class="">
                      <td><img src="{{ asset('images') }}/{{ $food->image }}" alt="" width="300"></td>
                      <td>{{ $food->name }}</td>
                      <td>{{ $food->description }}</td>
                      <td>${{ $food->price }}</td>
                      <td>{{ $food->category->name }}</td>
                      <td><a href="{{ route('food.edit', [$food->id]) }}" class="btn btn-primary">Edit</a></td>
                      <td>
                        <form action="{{ route('food.destroy', [$food->id]) }}" method="post" onsubmit="return confirm('Are you sure?')">
                          @csrf
                          @method('DELETE')
                          <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                      </td>
                    </tr>


                  @endforeach
                  <tr>
                    <td colspan="8">
                      <div class="d-grid gap-2">
                        <a href="{{ route('food.create') }}" class="btn btn-success" type="button">Create New Food</a>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
              {{ $foods->links() }}
            @else
              <div class="alert alert-warning">There is no Foods</div>
              <div class="d-grid gap-2">
                <a href="{{ route('food.create') }}" class="btn btn-success" type="button">Create New Food</a>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
