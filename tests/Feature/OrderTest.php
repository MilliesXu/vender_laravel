<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;


    /**
     * Test Get Orders As Guest Get Redirected
     * @return void
     */
    public function test_get_all_orders_as_guest(): void
    {
        $response = $this->get('/order/');

        $response->assertRedirect('/user/login');
    }


    /**
     * Test Get All Orders With Filter With Success
     * @return void
     */
    public function test_get_all_orders_with_success(): void
    {
        $user = User::factory()->create();

        Order::factory(5)->create([
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)->get('/order/');

        $response->assertViewIs('order.index');
    }


    /**
     * Test Create Order As Guest Get Redirected
     * @return void
     */
    public function test_create_order_as_guest(): void
    {
        $response = $this->get('/order/create');

        $response->assertRedirect('/user/login');
    }


    /**
     * Test Create Order With Success
     * @return void
     */
    public function test_create_order_with_success(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/order/create');

        $response->assertViewIs('order.create');
    }
}
