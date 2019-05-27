<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Cinema;
use App\Models\Movie;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class BrowseTest extends TestCase
{
    /**
     * @test
     * @return [type] [description]
     */
    public function a_guest_can_browse_booking()
    {
        $response = $this->get('/booking');

        $response->assertStatus(200);
    }
    /**
     * @test
     * @return [type] [description]
     */
    public function a_user_can_browse_booking()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->get('/booking');

        $response->assertStatus(200);
    }
    /**
     * @test
     * @return [type] [description]
     */
    public function a_guest_cannot_browse_admin()
    {
        $response = $this->get('/admin');

        $response->assertRedirect('/login');
    }
    /**
     * @test
     * @return [type] [description]
     */
    public function a_user_cannot_browse_admin()
    {
        $user = factory(User::class)->make([
            'role' => 3,
        ]);
        $response = $this->actingAs($user)->get('/admin');

        $response->assertRedirect('/login');
    }
    /**
     * @test
     * @return [type] [description]
     */
    public function an_admin_can_browse_admin()
    {
        $user = factory(User::class)->make([
            'role' => 1,
        ]);
        $response = $this->actingAs($user)->get('/admin');

        $response->assertStatus(200);
    }
    /**
     * @test
     * @return [type] [description]
     */
    public function a_guest_can_browse_login()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
    /**
     * @test
     * @return [type] [description]
     */
    public function a_user_cannot_browse_login()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->get('/login');

        $response->assertRedirect('/');
    }
    /**
     * @test
     * @return [type] [description]
     */
    public function a_guest_cannot_edit_cinema()
    {
        $cinema = factory(Cinema::class)->create();
        $response = $this->json('get', route('cinema.edit', ['id' => $cinema->id]));

        $response->assertRedirect('/login');
    }
    /**
     * @test
     * @return [type] [description]
     */
    public function a_user_cannot_edit_cinema()
    {
        $cinema = factory(Cinema::class)->create();
        $user = factory(User::class)->make([
            'role' => 3,
        ]);
        $response = $this->actingAs($user)->json('get', route('cinema.edit', ['id' => $cinema->id]));

        $response->assertRedirect('/login');
    }
    /**
     * @test
     * @return [type] [description]
     */
    public function an_admin_can_edit_cinema()
    {
        $cinema = factory(Cinema::class)->create();
        $user = factory(User::class)->make([
            'role' => 1,
        ]);
        $response = $this->actingAs($user)->json('get', route('cinema.edit', ['id' => $cinema->id]));

        $response->assertStatus(200);
    }
}
