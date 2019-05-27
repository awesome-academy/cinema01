<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Movie;

class MovieTest extends TestCase
{
    /** 
     * @test
     */
    public function it_can_create_a_movie () 
    {
        $data = [
            'name' => $this->faker->word,
            'type' => $this->faker->word,
            'producer' => $this->faker->name,
            'country' => $this->faker->country,
            'cast' => $this->faker->name,
            'time' => $this->faker->numberBetween(10, 150),
            'content' => $this->faker->word,
            'day_start' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'directors' => $this->faker->word,
            'image' => $this->faker->word,
            'trailer' => $this->faker->url,
            'status' => $this->faker->numberBetween(1, 3),
        ];
        $movieRepo = new Movie;
        $movie = $movieRepo->make($data);
      
        $this->assertInstanceOf(Movie::class, $movie);
        $this->assertEquals($data['name'], $movie->name);
        $this->assertEquals($data['type'], $movie->type);
        $this->assertEquals($data['producer'], $movie->producer);
        $this->assertEquals($data['country'], $movie->country);
        $this->assertEquals($data['cast'], $movie->cast);
        $this->assertEquals($data['time'], $movie->time);
        $this->assertEquals($data['content'], $movie->content);
        $this->assertEquals($data['day_start'], $movie->day_start);
        $this->assertEquals($data['directors'], $movie->directors);
        $this->assertEquals($data['image'], $movie->image);
        $this->assertEquals($data['trailer'], $movie->trailer);
        $this->assertEquals($data['status'], $movie->status);
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
}
