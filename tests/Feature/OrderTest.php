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
     *
     * @return void
     */
    public function test_get_all_orders_as_guest(): void
    {
        $response = $this->get('/order/');

        $response->assertRedirect('/user/login');
    }

    public function test_get_all_orders_with_success(): void
    {
        $user = User::factory()->create();

        Order::factory(5)->create([
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)->get('/order/');

        $response->assertViewIs('order.index');
    }
}
