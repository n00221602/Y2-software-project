@extends('layouts.app')

@section('content')
    <h3 class="text-center">Add Brand</h3>
    <form action="{{ route('brands.store') }}" method="post" enctype="multipart/form-data">
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
