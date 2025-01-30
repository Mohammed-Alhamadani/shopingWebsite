<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories=[
            ['id'=>1,'name'=>'Vegetables','description'=>'Organic Vegetables','imagepath'=>''],
            ['id'=>2,'name'=>'Vegetables','description'=>'Non Organic Vegetables','imagepath'=>''],
            ['id'=>3,'name'=>'Fruits','description'=>'Organic Fruits','imagepath'=>''],
            ['id'=>4,'name'=>'Fruits','description'=>'Non Organic Fruits','imagepath'=>''],
        ];
        DB::table('categories')->insertOrIgnore($categories);

        for($i=1;$i<=25;$i++){
            Product::create([
                'name'=>'Product'.$i,
                'description'=>'This is Product Number '. $i,
                'price'=>rand(10,100),
                'quantity'=>rand(1,50),
                'imagepath'=>'',
                'category_id'=>rand(1,4),
            ]);
        }
    }
}
