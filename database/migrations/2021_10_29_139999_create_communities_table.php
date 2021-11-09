<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
//'name' => $this->faker->title,
//'description' => $this->faker->text,
//'is_private' => rand(0,1),
//'community_theme' =>NULL,
//'access_level' => 'public',
//'adults_only' => 'no',
//'user_id' => rand(1,3),

    public function up()
    {
        Schema::create('communities', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->text('description');
            $table->string('access_level');
            $table->boolean('adults_only');
            $table->timestamps();
            $table->unsignedBigInteger('community_category_id');
            $table->unsignedBigInteger('creator_id');
            $table->foreign('community_category_id')->references('id')->on('community_categories')->onDelete('cascade');
            $table->foreign('creator_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('communities');
    }
}
