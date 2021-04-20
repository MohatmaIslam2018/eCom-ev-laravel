<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            ['name' => 'Samsung mobile',
            'price' => '500',
            'category' => 'mobile',
            'description' => 'A device to touch lives',
            'gallery' => 'https://img.us.news.samsung.com/us/wp-content/uploads/2020/03/05160218/Galaxy-S20_S20_S20_Ultra_5G_full_rgb.png'
            ],

            ['name' => 'Sony Bravia',
            'price' => '400',
            'category' => 'tv',
            'description' => 'home theater sorounded sound',
            'gallery' => 'https://i.ytimg.com/vi/fnq0VrItpUk/maxresdefault.jpg'
            ],

            ['name' => 'iPhone',
            'price' => '700',
            'category' => 'mobile',
            'description' => 'A phone that can runs simultenously tasks without any intervension',
            'gallery' => 'https://fdn.gsmarena.com/imgroot/news/20/12/iphone-13-on-schedule/-1200w5/gsmarena_000.jpg'
            ],

            ['name' => 'LG fridge',
            'price' => '200',
            'category' => 'fridge',
            'description' => 'Fridge that keeps food ice cold',
            'gallery' => 'https://www.lg.com/us/images/refrigerators/md07504171/gallery/desktop-01.jpg'
            ],
        ]);
    }
}
