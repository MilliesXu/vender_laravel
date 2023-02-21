<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CreateOrderController extends OrderController
{

    /**
     * Show Create Order Page
     * @param Request $request
     * @return View
     */
    public function __invoke(Request $request): View
    {
        return view('order.create');
    }
}
