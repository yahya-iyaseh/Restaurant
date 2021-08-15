@extends('layouts.app')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link rel="stylesheet" href="{{ URL::asset('css/show.css') }}">

@section('content')
  <div class="container mt-5 mb-5">
    <div class="card">
      <div class="row g-0">
        <div class="col-md-6 border-end">
          <div class="d-flex flex-column justify-content-center">
            <div class="main_image"> <img src="{{ asset('images') }}/{{ $food->image }}" id="main_product_image" width="350"> </div>
            <div class="thumbnail_images">
              <ul id="thumbnail">
                <li><img onclick="changeImage(this)" src="{{ asset('images') }}/{{ $food->image }}" width="70"></li>
                <li><img onclick="changeImage(this)" src="{{ asset('images') }}/{{ $food->image }}" width="70"></li>
                <li><img onclick="changeImage(this)" src="{{ asset('images') }}/{{ $food->image }}" width="70"></li>

              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="p-3 right-side">
            <div class="d-flex justify-content-between align-items-center">
              <h1>{{ $food->name }}</h1> <span class="heart"><i class='bx bx-heart'></i></span>
            </div>
            <div class="mt-2 pr-3 content">
              <h3>{{ $food->description }}</h3>
            </div>
            <h2>${{ $food->price }}</h2>
            <div class="ratings d-flex flex-row align-items-center">
              <div class="d-flex flex-row"> <i class='bx bxs-star'></i> <i class='bx bxs-star'></i> <i class='bx bxs-star'></i> <i class='bx bxs-star'></i> <i class='bx bx-star'></i> </div> <span>441 reviews</span>
            </div>
            <div class="buttons d-flex flex-row mt-5 gap-3"> <button class="btn btn-outline-dark">Buy Now</button> <button class="btn btn-dark">Add to Basket</button> </div>
            <div class="search-option"> <i class='bx bx-search-alt-2 first-search'></i>
              <div class="inputs"> <input type="text" name=""> </div> <i class='bx bx-share-alt share'></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    function changeImage(element) {

      var main_prodcut_image = document.getElementById('main_product_image');
      main_prodcut_image.src = element.src;


    }
  </script>
@endsection
