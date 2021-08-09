@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('category.store') }}" method="post">
                @csrf
            <div class="card">
                <div class="card-header">Create category</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"style="background: #e0e0e0; margin-bottom: 10px;">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">create</button>
                        <a href="{{ route('category.index') }}" class="btn btn-outline-secondary">Go Back</a>
                    </div>
                </div>
            </div>
        </form>
        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif
        </div>
    </div>
</div>

@endsection
