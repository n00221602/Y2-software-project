@extends('layouts.app')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="./images/favicon.ico">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
            rel="stylesheet">
        <style>
            header {
                display: flex;
                flex-direction: column;
                text-align: center;
            }

            .topSection {
                display: flex;
                justify-content: center;
                align-items: center;
                font-family: 'Bebas Neue';
                background-color: #ffffff;
                height: 200px;
            }


            .saleSection .content{
                display: flex;
                justify-content: center;
                padding-left: 20px;
                flex-direction: column;
                font-family: 'Bebas Neue';
            }

            .saleSection .image {
                display: flex;
                justify-content: flex-end;
            }

            .carousel {
                display: flex;
                justify-content: center;
                font-family: 'Bebas Neue'
            }

            .carousel-text {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            footer {
                display: flex;
                justify-content: center;
                align-items: flex-end;
                background-color: #333333;
                color: white;
                padding: 10px;
                text-align: center;
                height:200px;
            }
        </style>
    </head>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-0">
            <div class="container-fluid px-2">
                <a class="navbar-brand" href="#"><img src="{{ $brand->brand_logo }}" width="100"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Browse Clothing
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Shop Men's</a></li>
                                <li><a class="dropdown-item" href="#">Shop Women's</a></li>
                                <li><a class="dropdown-item" href="#">Shop Unisex</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-dark" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>

    </header>

    <body>
        <div class="container-fluid p-0">

            <div class="topSection mb-2">
                <div class="content">
                    <h1 class="display-1 mb-0">Welcome to {{ $brand->brand_name }}.</h1>
                </div>
            </div>

            {{-- Carousel --}}
            <div id="carouselExampleIndicators" class="carousel slide mb-4">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner w-100" style="height: 400px">
                    <div class="carousel-item active">
                        <div class="carousel-text" style="height:400px; background-color:rgb(191, 177, 223)">
                            <h1 class="display-3">Shop Men's Clothing.</h1>
                        </div>
                    </div>

                    <div class="carousel-item h-50">
                        <div class="carousel-text" style="height:400px; background-color:rgb(195, 132, 132)">
                            <h1 class="display-3">Shop Women's Clothing.</h1>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="carousel-text" style="height:400px; background-color:rgb(249, 231, 116)">
                            <h1 class="display-3">Shop Unisex Clothing.</h1>
                        </div>
                    </div>

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            {{-- Sale --}}
            <div class="image mb-4">
                <img src="{{ asset('./images/sale.jpg') }}" class="img-fluid">
            </div>

        </div>


        {{-- Footer --}}
        <footer>
            <p>&copy; 2024 {{ $brand->brand_name }}. All rights reserved to {{ $brand->brand_name }}</p>
        </footer>

    </body>

    </html>
@endsection
