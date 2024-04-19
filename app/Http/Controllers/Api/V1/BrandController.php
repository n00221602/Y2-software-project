<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\BrandResource;

class BrandController extends Controller
{

    public function index()
    {
        return BrandResource::collection(Brand::all());
    }
    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        return BrandResource::make($brand);
    }
}
