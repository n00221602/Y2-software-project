<?php

namespace App\Http\Controllers\Admin;

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

        return view('admin.brands.index')->with('brands', $brands);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
        $this->middleware('auth');

        $brands = Brand::all();
        return view('admin.brands.create')->with('brands',$brands);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
        $this->middleware('auth');

        $request->validate([
        'brand_name' => 'required',
        'origin_country' => 'required',
        'ethical' => 'required',
        'rating' => 'required',
        'brand_logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('brand_logo')) {
            $image = $request->file('brand_logo');
            $imageName = time() . '.' . $image->extension();
            // store the image file in the public disk, under the brands directory.
            $image->storeAs('public/brands', $imageName);
            $brand_logo_name = 'storage/brands/' . $imageName;
        };

        Brand::create([
        'brand_name' => $request->brand_name,
        'origin_country' => $request->origin_country,
        'ethical' => $request->ethical,
        'rating' => $request->rating,
        'brand_logo' => $brand_logo_name,
        'created_at' => now(),
        'updated_at' => now()
        ]);

        return to_route('admin.brands.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        return view('admin.brands.show')->with('brand', $brand);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
        $this->middleware('auth');

        return view('admin.brands.edit')->with('brand',$brand);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
        $this->middleware('auth');

        if ($request->hasFile('brand_logo')) {
            $image = $request->file('brand_logo');
            $imageName = time() . '.' . $image->extension();
            $image->storeAs('public/brands', $imageName);
            $brand_logo_name = 'storage/brands/' . $imageName;
        }

        $brand->update([
            'brand_name' => $request->brand_name,
            'origin_country' => $request->origin_country,
            'ethical' => $request->ethical,
            'rating' => $request->rating,
            'brand_logo' => $brand_logo_name,
            'created_at' => now(),
            'updated_at' => now()
            ]);
            return to_route('admin.brands.show',$brand)->with('success','Brand updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $brand->delete();
        return to_route('admin.brands.index')->with('success', 'Brand deleted successfully');
    }
}
