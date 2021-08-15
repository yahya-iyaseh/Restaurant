@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h2>Categories</h2>
          </div>

          <div class="card-body">
            @if (Session::has('message-update'))
              <div class="alert alert-success fade show">
                <strong>Success</strong> The Category Was Upadated
              </div>
            @endif
            @if (Session::has('message-delete'))
              <div class="alert alert-danger fade show">
                <strong>Success</strong> The Category Was Deletead
              </div>
            @endif
            @if (count($categories) > 0)


              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($categories as $key => $category)
                    <tr>
                      <th scope="row">{{ $key + 1 }}</th>
                      <td>{{ $category->name }}</td>
                      <td><a href="{{ route('category.edit', [$category->id]) }}" class="btn btn-primary">Edit</a></td>
                      <td>
                        <form action="{{ route('category.destroy', [$category->id]) }}" method="post" onsubmit="return confirm('Are you sure?')">
                          @csrf
                          @method('DELETE')
                          <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                      </td>
                    </tr>

                    
                  @endforeach
                  <tr>
                    <td colspan="4">
                      <div class="d-grid gap-2">
                        <a href="{{ route('category.create') }}" class="btn btn-success" type="button">Create New Category</a>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            @else
              <div class="alert alert-warning">There is no Categorey</div>
              <div class="d-grid gap-2">
                        <a href="{{ route('category.create') }}" class="btn btn-success" type="button">Create New Category</a>
                      </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
