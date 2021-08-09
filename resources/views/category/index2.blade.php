@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <form action="{{ route('category.store') }}" method="post">@csrf --}}
            <div class="card">
                <div class="card-header">Categories</div>
                @if (Session::has('message-update'))
                <div class="alert alert-success fade show">
                    <strong>Success</strong> The Category Was Upadated
                </div>
                @endif
                @if (Session::has('message-delete'))
                <div class="alert alert-danger fade show">
                    <strong>Success</strong> The Category Was Deleated
                </div>
                @endif
                <div class="card-body">

                    @if (count($categories) > 0)
                    <table class="table table-striped">
                        <tr class="table-primary">
                            <th>*</th>
                            <th>Category Name</th>
                            <th>Edit</th>
                            <th>delete</th>
                        </tr>
                        @foreach ($categories as $key => $category)
                        <tr class="">
                            <th scope="row" class="align-middle">{{ $key + 1 }}</th>
                            <td class="align-middle"><b>{{ $category->name }}</b></td>
                            <td class="align-middle"><a href="{{ route('category.edit', [$category->id]) }}"
                                    class="btn btn-outline-success">Edit</a></td>
                            <td class="align-middle">
                                <form action="{{ route('category.destroy', [$category->id]) }}"
                                    onsubmit="return confirm('Are you sure?');" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger text-light" type="submit">Delete</button>
                                </form>
                                {{-- <input type="submit" class="btn btn-danger" value="{{ $category->id }}">
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Delete</button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            {{-- {{ method_field('DELETE') }} --}}
                                            {{-- <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Form.</h5>
                                                                    <button type="button" class="btn-close"data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are you sure you want to delete Category<b>{{ $category->name }}</b>
                                            ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                    </div>
                                </div>
                                </form>
                </div>
            </div>
            </td> --}}
            </td>
            </tr>
            @endforeach
            @else
            <div class="alert alert-warning">
                <b> No Categoires...</b>
            </div>
            </table>

            @endif
        </div>
    </div>
    {{-- </form> --}}
</div>
</div>
</div>
@endsection
