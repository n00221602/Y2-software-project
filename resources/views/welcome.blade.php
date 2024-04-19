@extends('layouts.app')

@section('content')

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

    <div class="container mx-5">
        <div class="row justify-content-center">
            <div>
                <h1>Hello World</h1>
                <h3>This is a laravel-bootstrap template</h3>
                <div class="mt-5">
                    <button type="button" class="btn btn-primary">Primary</button>
                    <button type="button" class="btn btn-secondary">Secondary</button>
                    <button type="button" class="btn btn-success">Success</button>
                    <button type="button" class="btn btn-danger">Danger</button>
                    <button type="button" class="btn btn-warning">Warning</button>
                    <button type="button" class="btn btn-info">Info</button>
                    <button type="button" class="btn btn-light">Light</button>
                    <button type="button" class="btn btn-dark">Dark</button>

                    <button type="button" class="btn btn-link">Link</button>
                </div>

                <div class="row row-cols-1 row-cols-md-3 g-4 mt-5">
                    <div class="col">
                        <div class="card">
                            <img src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-social.png"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a longer card with supporting text below as a natural lead-in
                                    to additional content. This content is a little bit longer.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-social.png"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a longer card with supporting text below as a natural lead-in
                                    to additional content. This content is a little bit longer.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-social.png"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a longer card with supporting text below as a natural lead-in
                                    to additional content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-social.png"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a longer card with supporting text below as a natural lead-in
                                    to additional content. This content is a little bit longer.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
