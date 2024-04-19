@extends('layouts.app')

@section('content')

<nav class="navbar navbar-expand-md navbar-light shadow-sm mb-3" style="background-color: #a1f09f">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('./images/logo.png') }}" class="img-fluid" width="50px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class=" pt-1 navbar-nav me-auto">
                <h1 class="fs-2 me-4" style="font-family: 'Roboto'; font-style:italic">Ecognito</h1>

                @if (auth()->check() && auth()->user()->hasRole('admin'))
                    <x-nav-link class="fs-5 link-body-emphasis link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover" :href="route('admin.brands.index')" :active="request()->routeIs('brands.index')">
                        {{ __('All Brands') }}
                    </x-nav-link>

                @elseif(auth()->check() && auth()->user()->hasRole('user'))
                    <x-nav-link class="fs-5 link-body-emphasis link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover" :href="route('user.brands.index')" :active="request()->routeIs('brands.index')">
                        {{ __('View All Brands') }}
                    </x-nav-link>

                @endif

                @if (auth()->check() && auth()->user()->hasRole('admin'))
                    <x-nav-link class=" ms-2 fs-5 link-body-emphasis link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover" :href="route('admin.brands.create')" :active="request()->routeIs('brands.create')">
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

    <div class="container">
        <h1>All Brands</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Brand name</th>
                    <th>Country of origin</th>
                    <th>Ethical</th>
                    <th>Rating</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($brands as $brand)
                    <tr>
                        <td><a href="{{ route('admin.brands.show', $brand) }}" class=" fs-4 fw-bold link-offset-2 link-underline link-underline-opacity-0">{{ $brand->brand_name }}</a></td>
                        <td>{{ $brand->origin_country }}</td>
                        <td>{{ $brand->ethical }}</td>
                        <td>{{ $brand->rating }}</td>
                        <td>
                            @if ($brand->brand_logo)
                                <img src="{{ asset($brand->brand_logo) }}" alt="{{ $brand->title }}" width="100">
                            @else
                                No Image
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
