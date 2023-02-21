<?php

namespace Tests\Unit;

use App\Models\Order;
use App\Models\User;
use App\Services\OrderService;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class OrderServiceTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;


    /**
     * Test Get All Orders From Service
     * @return void
     */
    public function test_get_all_orders(): void
    {
        $user = User::factory()->create();

        Order::factory(5)->create([
            'user_id' => $user->id
        ]);

        $order_service = new OrderService();

        $orders = $order_service->index([]);

        $this->assertEquals(5, $orders->count());
    }
}
