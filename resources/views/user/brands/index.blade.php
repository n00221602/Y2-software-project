@extends('layouts.app')

@section('content')
<head>
    <link rel="icon" type="image/x-icon" href="/public/images/favicon.ico">
</head>

<nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: #6ec76b">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <!-- Navigation Links -->
                @if (auth()->check() && auth()->user()->hasRole('admin'))
                    <x-nav-link :href="route('admin.brands.index')" :active="request()->routeIs('brands.index')">
                        {{ __('All Brands') }}
                    </x-nav-link>
                @elseif(auth()->check() && auth()->user()->hasRole('user'))
                    <x-nav-link :href="route('user.brands.index')" :active="request()->routeIs('brands.index')">
                        {{ __('All Brands') }}
                    </x-nav-link>

                @endif

                @if (auth()->check() && auth()->user()->hasRole('admin'))
                    <x-nav-link :href="route('admin.brands.create')" :active="request()->routeIs('brands.create')">
                        {{ __('Add Brand') }}
                    </x-nav-link>
                @endif

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<body>
    <div class="container-fluid">
        <div class = "d-flex justify-content-center">
        <h1>Browse Brands</h1>
        </div>
        <div class="row justify-content-center align-items-end">
            @foreach ($brands as $brand)
                <div class="col-3 border border-2 border-success text-center m-2">
                    @if ($brand->brand_logo)
                        <img src="{{ $brand->brand_logo }}" alt="{{ $brand->title }}" class="img-fluid py-2" style="height: 175px">
                    @else
                        No Image
                    @endif
                    <div>
                    <a href="{{ route('user.brands.show', $brand) }}"
                        class= "fs-3 fw-bold text-primary link-underline link-underline-opacity-0 link-offset-1-hover link-underline-opacity-75-hover">
                        Browse {{ $brand->brand_name }}</a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</body>

    {{-- <footer>
        <div class = "container-fluid bg-secondary-subtle mb-0" style = "height:300px">
            <h1>Footer</h1>
        </div>
    </footer> --}}
@endsection






















{{-- @section('content')
    <div class="container">
        <h1>Browse Brands</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Brand name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($brands as $brand)
                    <tr>
                        <td><a href="{{ route('user.brands.show', $brand) }}" class=" fs-4 fw-bold link-offset-2 link-underline link-underline-opacity-0">{{ $brand->brand_name }}</a></td>
                        <td>
                            @if ($brand->brand_logo)
                                <img src="{{ $brand->brand_logo }}" alt="{{ $brand->title }}" width="100">
                            @else
                                No Image
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection --}}
