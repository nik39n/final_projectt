<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Product;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
class ProductFactory extends Factory{
        protected $model = Product::class;
        public function definition()
        {   
            return [
                'category_id' => $this->faker->randomDigit(rand(1,10 )) ,
                'brand_id' => $this->faker->randomDigit(rand(1,10 )) ,
                'name' => $this->faker->realText(rand(50, 100)),
                'content' => $this->faker->realText(rand(10,20)),
                'slug' => $this->faker->slug(rand(1,10)),
                'price' => $this->faker->randomDigit(rand(1000, 2000)),
            ];

        
        
        }
    }
