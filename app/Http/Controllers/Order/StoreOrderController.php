<?php

namespace App\Http\Controllers\Order;

use App\Http\Requests\OrderRequest;
use Illuminate\Http\RedirectResponse;
use Throwable;

class StoreOrderController extends OrderController
{
    /**
     * Store Order Controller
     * @param OrderRequest $request
     * @return RedirectResponse
     */
    public function __invoke(OrderRequest $request): RedirectResponse
    {
        try {
            $formfields = $request->validated();
            $formfields['user_id'] = auth()->id();

            $this->order_service->store($formfields);

            return redirect('/order')->with('success', 'Successfully create an order');
        } catch (Throwable $exception) {
            return back()->with('errors', 'Something Wrong');
        }
    }
}
