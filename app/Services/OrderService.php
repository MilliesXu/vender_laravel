<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;


class OrderService
{
    /**
     * Get All Orders
     * @param array $filter
     * @return Collection
     */
    public function index(array $filter): Collection
    {
        return Order::latest()->filter($filter)->get();
    }

    /**
     * Create Order
     * @param array $formfields
     * @return Order
     */
    public function store(array $formfields): Order
    {
        return Order::create($formfields);
    }
}
