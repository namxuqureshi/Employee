<?php

use app\Product;
use app\Shop;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 50; $i++) {
//            $temp = Department::create(array(
//                'name' => $faker->name,
//                'location' => $faker->locale
//            ));
//            Admin::create(array(
//                'name' => $faker->name,
//                'password' => bcrypt('infinity'),
//                'username' => "admin".$i,
//                'dept_id' => $temp->id
//            ));
            Product::create(array(
                'name' => $faker->name,
                'price' => $faker->numberBetween(200, 4000)
            ));
            Shop::create(array(
                'name' => $faker->name,
//                'price' => $faker->numberBetween(200, 4000)
            ));

        }
    }
}
