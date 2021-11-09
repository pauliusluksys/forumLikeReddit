<?php

namespace Database\Factories;
use Illuminate\Support\Str;
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
        $title = $this->faker->sentence;
        $slug = Str::slug($title, '-');
        return [
            'title' => $title,
            'body' => $this->faker->text,
            'is_draft' => rand(0,1),
            'slug' =>$slug,
            'community_id' => rand(1,30),
            'user_id' => rand(1,50),
        ];
    }
}
