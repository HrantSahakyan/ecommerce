<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image_name' => 'digital_' . $this->faker->numberBetween(10,22) . '.jpg',
            'imageable_type' => 'product',
            'imageable_id' => $this->faker->unique->numberBetween(1,22)
        ];
    }
}
