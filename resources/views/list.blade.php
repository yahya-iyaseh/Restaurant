@extends('layouts.app')
<style>
  @import url('https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap');

  body {
    background: #ffce9728 !important;

  }

  h2 {
    /* margin-top: 120px !important; */
    margin-top: 20px !important;
    text-shadow: 2px 2px 10px black;
  }

  .details {
    border: 1.5px solid 333;
    color: #212121;
    width: 100%;
    height: auto;
    box-shadow: 0px 0px 10px #212121
  }

  .cart {
    background-color: #212121;
    color: white;
    margin-top: 10px;
    font-size: 12px;
    font-weight: 900;
    width: 100%;
    height: 39px;
    padding-top: 9px;
    box-shadow: 0px 0px 20px #212121
  }

  .card {
    width: fit-content
  }

  .card-body {
    width: fit-content
  }

  .btn {
    border-radius: 0
  }

  .img-thumbnail {
    /* background: #333 !important; */
    border: none;
    /* min-height: 360px !important;
    min-width: 240px !important;*/
    min-height: 360px !important;
    width: 100% !important;
    height: 100% !important;
    object-fit: cover;
    object-position: center;
  }

  .card {
    background: white !important;
    box-shadow: 0 20px 40px rgba(0, 0, 0, .2);
    border-radius: 5px;
    padding-bottom: 10px;
    margin-left: 10%;
    font-family: 'Shadows+Into+Light', sans-serif !important
  }

  /* .hover:hover {
    transform: scale(1.04);
    transition: transform .15s linear
  } */
  .cont {
    /* border: 1px solid; */
    padding: 5px;
    /* width: 100%; */
    /* min-height: 1500px; */
  }

  .carousel-control-prev-icon,
  .carousel-control-next-icon {
    outline: black;
    border-radius: 50%;
    border: 5px solid black;
    box-shadow: 0 0 10px black;
    size: 15px;
  }

  .carousel-control-prev {
    margin-left: -15%;
  }

  .carousel-control-next {
    margin-right: -15%;
  }

  .bottom-line {
    border-bottom: 2px solid black;
    box-shadow: 3px 3px 10px black;
  }

  button:hover {
    transform: scale(1.04);
    transition: transform .15s linear
  }

  a:hover {
    transform: scale(1.04);
    transition: transform .15s linear
  }

  .hover:hover {
    transform: scale(1.04);
    transition: transform .15s linear
  }

  .up {
    height: 60vh;
    width: auto;
    background-image: url('images/outRestaurant.jpg');
    background-position: center;
    background-size: cover;
    background-attachment: fixed;
    background-repeat: no-repeat;

  }

</style>
@section('content')


  <div class="container">

    <div class="up">
      {{-- <img src="{{ asset('images/outRestaurant.jpg') }}" alt="Restaurant"> --}}
    </div>

    @foreach ($categories as $category)
      @if (count($category->food) > 0)
        <H2 class="text-center mb-2">{{ $category->name }}</H2>
        <div id="carouselExampleIndicators" class="carousel slide bottom-line" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="col-12 row cont">
                {{-- Card --}}
                @foreach ($category->food as $food)
                  <div class="container-fluid col-12 col-sm-6 col-md-4 col-lg-3 hover d-flex align-items-stretch">
                    <div class="card mx-auto">
                      <img src="{{ asset('images') }}/{{ $food->image }}" alt="" class="mx-auto img-thumbnail" width="360" height="200">
                      <div class="card-body text-center mx-auto">
                        <div class="cvp">
                          <h5 class="card-title font-weight-bold">{{ $food->name }}</h5>
                          <div class="align-items-end">
                            <p class="card-text"><strong>${{ $food->price }}</strong></p><a href="foods/{{ $food->id }}" class="btn details px-auto align-items-end">View details</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
          <a class="carousel-control-prev text-dark" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      @else

      @endif

    @endforeach





  </div>


@endsection
