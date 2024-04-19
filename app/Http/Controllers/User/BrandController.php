<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        $brands = Brand::all();

        return view('user.brands.index')->with('brands', $brands);
    }
    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        $user = Auth::user();
        $user->authorizeRoles('user');

        return view('user.brands.show')->with('brand', $brand);
    }
}
