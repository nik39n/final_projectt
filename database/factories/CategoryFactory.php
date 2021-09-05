<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */
namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory{
    protected $model = Category::class;

    public function definition()
        {   
            return [
                'name' => $this->faker->realText(rand(30, 40)),
                'content' => $this->faker->realText(rand(150, 200)),
                'slug' => $this->faker->slug(rand(1,10)),
            ];
        
        
        }
}





