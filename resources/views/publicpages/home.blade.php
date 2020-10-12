@extends('layouts.app')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>



@section('content')
<!DOCTYPE html>
<html>
 <head>

            <style>
                .nav-item{
                  padding: 1vh;

                }

              .head {
                background: url('{{asset('images/head.jpg')}}') no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
              }



              .container{
              padding: 25px;
              }

              .footer{

                left: 0;
                bottom: 0;
                width: 100%;
                background-color: #e6ffe6;
                  }
                  .name{
                    margin-top:2vh;
                    padding: 2vh;
                   float:right;
                  }

                  .product_list{
                        margin:400px;
                    }


                </style>
 </head>

 <body>
        <br />




    <div class="container-fluid">
        <div class="row">
           <div class="col-sm-12">
             <div class="head" style="height:60vh;"></div>

             <div class="jumbotron">
                <h1 class="display-4">Join Now</h1>
                <p class="lead">More often than not, a new ecommerce entrepreneur is thinking about a cool invention for solving problems somewhere around the house. Or maybe they're considering ways to source products for their online stores from China and amaze customers with service, speed, and quality.</p>
                <hr class="my-4">
                <p>Regardless of the type of food that you plan on sending out to customers, there are conventional rules to be followed. The easy part is thinking about what to sell, and it isn't that difficult configure your own online store.</p>
                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
             </div>
           </div>
        </div>
    </div>


      <div class="row">
            <div class="container">
                    <center>
                            <div class="col-sm-8">

                                    @if (count($adData)>0)



                                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">

                                                    <div class="carousel-item active">
                                                            <img class="d-block w-100" src="{{asset('fb.jpg')}}" alt="Second slide">
                                                    </div>
                                                    @foreach ($adData as $adData)


                                                    {{-- <img class="img-responsive" style="max-height: 30vh;" src="" alt="image"> --}}

                                                    <div class="carousel-item">
                                                            <img class="d-block w-100" src="data:image;base64,{{$adData->image}}" alt="Second slide">
                                                    </div>

                                                    @endforeach


                                            </div>
                                          </div>



                                    @else
                                        <p>No Advertisements found</p>
                                    @endif

                            </div>
                    </center>

            </div>
      </div>
      </html>
      @endsection

