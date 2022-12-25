<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /**
     * Get Register Page With Authentification And Get Redirect
     *
     * @return void
     */
    public function test_get_register_page_with_authentification_redirect()
    {
        $user = User::factory()->create();

        /** @var \Illuminate\Contracts\Auth\Authenticatable $user  */
        $response = $this->actingAs($user)->get('/user/register');

        $response->assertRedirect('/');
    }

    /**
     * Get Register Page With Success
     *
     * @return void
     */
    public function test_get_register_page_success()
    {
        $response = $this->get('/user/register');

        $response->assertViewIs('user.register');
    }

    /**
     * Test Post Register With Authentification And Get Redirect
     *
     * @return void
     */
    public function test_post_register_with_authentification_get_redirect()
    {
        $user = User::factory()->create();

        /** @var \Illuminate\Contracts\Auth\Authenticatable $user  */
        $response = $this->actingAs($user)->post('/user', [
            'name' => 'Erwin Xu',
            'email' => 'winzchip@gmail.com',
            'password' => 'erwinxu13',
            'password_confirmation' => 'erwinxu13'
        ]);

        $response->assertRedirect('/');
    }

    /**
     * Test Post Register With Invalid Name Get Session Invalid
     *
     * @return void
     */
    public function test_post_register_with_invalid_name()
    {
        $response = $this->post('/user', [
            'name' => 'Er',
            'email' => 'winzchip@gmail.com',
            'password' => 'erwinxu13',
            'password_confirmation' => 'erwinxu13'
        ]);

        $response->assertInvalid(['name']);
    }

    /**
     * Test Post Register With Invalid Email Get Session Invalid
     *
     * @return void
     */
    public function test_post_register_with_invalid_email()
    {
        $user = User::factory()->create([
            'email' => 'winzchip@gmail.com'
        ]);

        $response = $this->post('/user', [
            'name' => 'Er',
            'email' => 'winzchip@gmail.com',
            'password' => 'erwinxu13',
            'password_confirmation' => 'erwinxu13'
        ]);

        $response->assertInvalid(['email']);
    }

    /**
     * Test Post Register With Invalid Password Get Session Invalid
     *
     * @return void
     */
    public function test_post_register_with_invalid_password()
    {
        $response = $this->post('/user', [
            'name' => 'Erwin Xu',
            'email' => 'winzchip@gmail.com',
            'password' => 'erw',
            'password_confirmation' => 'erw'
        ]);

        $response->assertInvalid(['password']);
    }

    /**
     * Test Post Register With Invalid Password Confirmation Get Session Invalid
     *
     * @return void
     */
    public function test_post_register_with_invalid_password_confirmation()
    {
        $response = $this->post('/user', [
            'name' => 'Erwin Xu',
            'email' => 'winzchip@gmail.com',
            'password' => 'erwinxu13',
            'password_confirmation' => 'erwinxu'
        ]);

        $response->assertInvalid(['password']);
    }

    /**
     * Test Post Register With Success
     *
     * @return void
     */
    public function test_post_register_with_success()
    {
        $response = $this->post('/user', [
            'name' => 'Erwin Xu',
            'email' => 'winzchip@gmail.com',
            'password' => 'erwinxu13',
            'password_confirmation' => 'erwinxu13'
        ]);

        $response->assertRedirect('/');
        $response->assertSessionHas('success', 'Successfully registered and login');
    }
}
