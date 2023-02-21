<?php

namespace App\Http\Controllers\Order;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Throwable;

/**
 *
 */
class IndexOrderController extends OrderController
{

    /**
     * Get All Orders Controller
     * @param Request $request
     * @return View | RedirectResponse
     */
    public function __invoke(Request $request): View | RedirectResponse
    {
        try {
            $orders = $this->order_service->index([$request['search']]);
            return view('order.index', ['orders' => $orders]);
        } catch (Throwable $exception) {
            return back()->with('error', 'Something wrong');
        }

    }
}
