<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /**
     * Get Login Page Without Authentification
     *
     * @return void
     */
    public function test_get_login_page_with_success()
    {

        $response = $this->get('/user/login');

        $response->assertViewIs('user.login');
    }

    /**
     * Get Login Page With Authentification And Redirected To Home Page
     *
     * @return void
     */
    public function test_get_login_page_with_redirect()
    {
        $user = User::factory()->create();

        /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
        $response = $this->actingAs($user)->get('/user/login');

        $response->assertRedirect('/');
    }

    /**
     * Test Login with wrong email 
     *
     * @return void
     */
    public function test_post_login_with_wrong_email()
    {
        User::factory()->create([
            'password' => 'erwinxu13'
        ]);

        $response = $this->post('/user/login', [
            'email' => 'winzchip@gmail.com',
            'password' => 'erwinxu13'
        ]);

        $response->assertInvalid(['email']);
    }

    /**
     * Test Post Login With Wrong Password
     *
     * @return void
     */
    public function test_post_login_with_wrong_password()
    {
        User::factory()->create([
            'email' => 'winzchip@gmail.com',
            'password' => 'erwinxu13'
        ]);

        $response = $this->post('/user/login', [
            'email' => 'winzchip@gmail.com',
            'password' => '123456'
        ]);

        $response->assertSessionHasErrors();
    }

    /**
     * Test Post Login With Credentials Get Redirect
     *
     * @return void
     */
    public function test_post_login_with_credentials_redirect()
    {
        $user = User::factory()->create();

         /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
        $response = $this->actingAs($user)->post('/user/login', [
            'email' => 'winzchip@gmail.com',
            'password' => '123456'
        ]);

        $response->assertRedirect('/');
    }

    /**
     * Test Post Login With Success
     *
     * @return void
     */
    public function test_post_login_with_success()
    {
        User::factory()->create([
            'email' => 'winzchip@gmail.com',
            'password' => bcrypt('erwinxu13')
        ]);

        $response = $this->post('/user/login', [
            'email' => 'winzchip@gmail.com',
            'password' => 'erwinxu13'
        ]);

        $response->assertRedirect('/');
        $response->assertSessionHas('success', 'Successfully login');

    }
}
