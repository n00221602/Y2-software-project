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

    <h3 class="text-center">Add Brand</h3>
    <form action="{{ route('admin.brands.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="brand_name">Brand Name</label>
            <input type="text" name="brand_name" id="brand_name" class="
            form-control {{ $errors->has('brand_name') ? 'is-invalid' : '' }}"
            value="{{ old('brand_name') }}" placeholder="Enter brand name">
            @if($errors->has('brand_name'))
                <span class="invalid-feedback">
                    {{ $errors->first('brand_name') }}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="origin_country">Origin Country</label>
            <input type="text" name="origin_country" id="origin_country" class="
            form-control {{ $errors->has('origin_country') ? 'is-invalid' : '' }}"
            value="{{ old('origin_country') }}" placeholder="Enter origin country">
            @if($errors->has('origin_country'))
                <span class="invalid-feedback">
                    {{ $errors->first('origin_country') }}
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="ethical">Is this brand ethical?</label><br>
            <input type="radio" name="ethical" id="ethical_yes" value="yes">
            <label for="ethical_yes">Yes</label>
            <input type="radio" name="ethical" id="ethical_no" value="no">
            <label for="ethical_no">No</label>
            @if($errors->has('ethical'))
                <span class="invalid-feedback">
                    {{ $errors->first('ethical') }}
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="rating">Brand Rating (0 - 100)</label><br>
            <input type="number" name="rating" id="rating" class="form-control {{ $errors->has('rating') ? 'is-invalid' : '' }}" value="{{ old('rating') }}" placeholder="Enter brand rating" min="0" max="100">
            @if($errors->has('rating'))
                <span class="invalid-feedback">
                    {{ $errors->first('rating') }}
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="brand_logo">Brand Logo</label><br>
            <input type="file" name="brand_logo" id="brand_logo" class="form-control-file {{ $errors->has('brand_logo') ? 'is-invalid' : '' }}" accept="brand_logo/*">
            @if($errors->has('brand_logo'))
                <span class="invalid-feedback">
                    {{ $errors->first('brand_logo') }}
                </span>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
