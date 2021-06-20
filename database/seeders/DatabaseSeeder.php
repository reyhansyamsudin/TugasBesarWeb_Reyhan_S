<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
            'name'=>'admin'
            ,'role'=>'admin'
            ,'email'=>'admin@admin.com'
            ,'password'=>bcrypt('12345678')
            ,'phone_number'=>'085608014111'
        ]
      );
     //vendors
     DB::table('vendors')->insert(
            [
            'name_vendor'=>'Honda'
        ]
      );
     DB::table('vendors')->insert(
            [
            'name_vendor'=>'Toyota'
        ]
      );
     DB::table('vendors')->insert(
            [
            'name_vendor'=>'Daihatsu'
        ]
      );
     //cars
     DB::table('cars')->insert(
            [
            'name_car'=>'Brio',
            'type_car'=>'Matic',
            'doors'=>'4',
            'seats'=>'6',
            'img_car'=>'https://akcdn.detik.net.id/visual/2020/08/18/sienta-welcab-2_169.jpeg?w=650',
            'vendor_id'=>1,
            'day_price'=>250000,
            'fine'=>100000
        ]
      );
     DB::table('cars')->insert(
            [
            'name_car'=>'Yaris',
            'type_car'=>'Manual',
            'doors'=>'4',
            'seats'=>'6',
            'img_car'=>'https://akcdn.detik.net.id/visual/2020/08/18/sienta-welcab-2_169.jpeg?w=650',
            'vendor_id'=>1,
            'day_price'=>250000,
            'fine'=>100000
        ]
      );
     DB::table('cars')->insert(
            [
            'name_car'=>'Sigra',
            'type_car'=>'Manual',
            'doors'=>'4',
            'seats'=>'6',
            'img_car'=>'https://akcdn.detik.net.id/visual/2020/08/18/sienta-welcab-2_169.jpeg?w=650',
            'vendor_id'=>1,
            'day_price'=>250000,
            'fine'=>100000
        ]
      );
    }
}
