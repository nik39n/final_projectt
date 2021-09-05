<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Support\Str;

use Faker\Generator as Faker;

use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Brand::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
        $name = $this->faker->realText(rand(150, 200));
        return [
            'name' => $this->faker->name,
            'content' => $this->faker->text,
            'slug' => $this->faker->name,
        ];
        
    
       
    }
}
