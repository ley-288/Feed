<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;


class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            
            'user_id' => User::factory(),
            'body' => $this->faker->sentence,
            'image' => 'image.jpg',
        ];
    }
}

//$factory->define(Post::class, function (Faker $faker) {
//    return [
//        'user_id' => factory(User::class),
//        'body' => $faker->sentence,
//        'image' => 'image.jpg',
//    ];
//});

