@extends('layouts.app')
@section('content')
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
                        <td><a href="{{ route('brands.show', $brand) }}" class=" fs-4 fw-bold link-offset-2 link-underline link-underline-opacity-0">{{ $brand->brand_name }}</a></td>
                        <td>{{ $brand->origin_country }}</td>
                        <td>{{ $brand->ethical }}</td>
                        <td>{{ $brand->rating }}</td>
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
@endsection
