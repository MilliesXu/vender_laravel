<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Services\OrderService;


class OrderController extends Controller
{
    protected OrderService $order_service;

    public function __construct(OrderService $order_service)
    {
        $this->order_service = $order_service;
    }
}
