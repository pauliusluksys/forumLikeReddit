<?php

namespace Database\Factories;

use App\Models\PostComment;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostCommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PostComment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'body' => $this->faker->text,
            'parent_id' => NULL,
            'user_id' => rand(1,20),
            'post_id' => rand(1,20),
            'deleted_at' => NULL,
        ];
    }
}
