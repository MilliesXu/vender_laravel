<?php

namespace Tests\Unit;

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
     * Test Get User From Order
     * @return void
     */
    public function test_get_user_from_order(): void
    {
        $user1 = User::factory()->create();

        User::factory(5)->create();

        /** @var Order $order */
        $order = Order::factory()->create([
            'user_id' => $user1->id
        ]);

        $user = $order->user();

        $this->assertEquals(1, $user->count());
        $this->assertTrue($user->first()->is($user1));
    }


    /**
     * Test Filter In Order
     * @return void
     */
    public function test_order_filter(): void
    {
        $user = User::factory()->create();

        /** @var Order $order */
        $order = Order::factory()->create([
            'name' => 'TS-001',
            'user_id' => $user->id
        ]);

         Order::factory(5)->create([
             'user_id' => $user->id
         ]);

        $orders = Order::filter(['search' => '001'])->get();

        $this->assertEquals(1, $orders->count());
        $this->assertEquals($order->id, $orders[0]->id);
    }
}
