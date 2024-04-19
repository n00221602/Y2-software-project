@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Brand view</h1>

        <table class="table table-hover">

            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>

            <tbody>
                <tr>
                    <td><strong> Brand Name </strong></td>
                    <td>{{ $brand->brand_name }}</td>
                </tr>

                <tr>
                    <td><strong> Origin country </strong></td>
                    <td>{{ $brand->origin_country }}</td>
                </tr>

                <tr>
                    <td><strong> Ethical </strong></td>
                    <td>{{ $brand->ethical }}</td>
                </tr>

                <tr>
                    <td><strong> Rating </strong></td>
                    <td>{{ $brand->rating }}</td>
                </tr>

                <tr>
                    <td>
                    <td><strong> Logo </strong></td>
                    @if ($brand->brand_logo)
                        <img src="{{ $brand->brand_logo }}" alt="{{ $brand->title }}" width="100">
                    @else
                        No Image
                    @endif
                    </td>
                </tr>

            </tbody>
        </table>
        <a href="{{ route('admin.brands.edit', $brand) }}">Edit Brand</a>
        <form action="{{ route('admin.brands.destroy', $brand) }}" method="post">
            @method('delete')
            @csrf
            <x-primary-button onclick="return confirm('Are you sure you want to delete?')">Delete </x-primary-button>
            </form>
    </div>
@endsection
