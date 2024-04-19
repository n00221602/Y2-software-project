<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        $brands = [
            [
                'brand_name' => 'Vans',
                'origin_country' => 'Vietnam',
                'ethical' => 'Yes',
                'rating' => 65,
                'brand_logo' => ('/storage/brands/vans_logo.jpg'),
            ],
            [
                'brand_name' => 'Adidas',
                'origin_country' => 'Indonesia',
                'ethical' => 'Yes',
                'rating' => 56,
                'brand_logo' => '/storage/brands/adidas_logo.jpg',
            ],
            [
                'brand_name' => 'Primark',
                'origin_country' => 'China',
                'ethical' => 'No',
                'rating' => 40,
                'brand_logo' => '/storage/brands/primark_logo.png',
            ],
            [
                'brand_name' => 'ASOS',
                'origin_country' => 'China',
                'ethical' => 'No',
                'rating' => 50,
                'brand_logo' => '/storage/brands/asos_logo.png',
            ],
            [
                'brand_name' => 'Shein',
                'origin_country' => 'China',
                'ethical' => 'No',
                'rating' => 7,
                'brand_logo' => '/storage/brands/shein_logo.png',
            ],
            [
                'brand_name' => 'Under Armour',
                'origin_country' => 'Malasia',
                'ethical' => 'No',
                'rating' => 28,
                'brand_logo' => '/storage/brands/underarmour_logo.jpg',
            ],
            [
                'brand_name' => 'Hollister Co.',
                'origin_country' => 'Cambodia',
                'ethical' => 'No',
                'rating' => 33,
                'brand_logo' => '/storage/brands/hollister_logo.jpg',
            ],
            [
                'brand_name' => 'Pull & Bear',
                'origin_country' => 'Turkey',
                'ethical' => 'No',
                'rating' => 50,
                'brand_logo' => '/storage/brands/pullandbear_logo.png',
            ],
            [
                'brand_name' => 'Urban Outfitters',
                'origin_country' => 'China',
                'ethical' => 'No',
                'rating' => 13,
                'brand_logo' => '/storage/brands/urbanoutfitters_logo.png',
            ],
            [
                'brand_name' => 'Puma',
                'origin_country' => 'Vietnam',
                'ethical' => 'Yes',
                'rating' => 66,
                'brand_logo' => '/storage/brands/puma_logo.jpg',
            ],
        ];

        foreach ($brands as $brand) {
            Brand::create($brand);
        }
    }
}
