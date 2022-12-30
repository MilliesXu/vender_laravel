<?php

namespace Tests\Unit;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /**
     * Test Login Using Wrong Credentials
     *
     * @return void
     */
    public function test_login_wrong_credentials()
    {
        $user_service = new UserService();

        $result = $user_service->login([
            'email' => 'winzchip@gmail.com',
            'password' => 'erwinxu13'
        ]);

        $this->assertFalse($result);
    }

    /**
     * Test Login With Correct Credentials
     *
     * @return void
     */
    public function test_login_with_success()
    {
        User::factory()->create([
            'email' => 'winzchip@gmail.com',
            'password' => bcrypt('erwinxu13'),
        ]);
        $user_service = new UserService();

        $result = $user_service->login([
            'email' => 'winzchip@gmail.com',
            'password' => 'erwinxu13'
        ]);

        $this->assertTrue($result);
    }

    /**
     * Test Register Function With Success
     *
     * @return void
     */
    public function test_register_success()
    {
        $user_service = new UserService();

        $user = $user_service->register([
            'name' => 'Erwin Xu',
            'email' => 'winzchip@gmail.com',
            'password' => 'erwinxu13'
        ]);

        $this->assertEquals('winzchip@gmail.com', $user->email);
    }
}
