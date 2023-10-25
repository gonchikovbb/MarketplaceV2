<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data= Order::all();
        $products= Product::all();

        return view('orders.addOrder',['orders'=>$data, 'products'=>$products]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $data = $request->all();
        var_dump($data);die;

        $this->orderService->createOrder($data);

        return redirect()->route('orders.showOrders');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreOrderRequest $request, Order $order)
    {
        $data = $request->all();

        $this->orderService->updateTask($data, $order);

        return redirect()->route('orders.showOrders');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Order $order)
    {
        $userId = auth()->id();

        if ($order->user_id === $userId) {
            $this->orderService->deleteTask($order);
        }

        return redirect()->route('orders.showOrders');
    }

    /**
     * Display the specified resource.
     */
    public function showOrders()
    {
        $user = auth()->user();

        $orders = $user->orders()->paginate(5);

        $users = User::all();

        $products = Product::all();

        return view('orders.showOrders', [
            'orders' => $orders,
            'users'=>$users,
            'products'=>$products,
        ]);
    }

//    /**
//     * Add products.
//     */
//    public function addProducts(Request $request)
//    {
//        $orderId = $request->;
//        $productId = $request->product_id;
//        $count = $request->count;
//        $discount = $request->discount;
//        $cost = ;
//
//        $products = $request->all();
//
//        $user = auth()->user();
//
//        $orders = $user->orders()->paginate(5);
//
//        $users = User::all();
//
//        $products = Product::all();
//
//        return view('orders.showOrders', [
//            'orders' => $orders,
//            'users'=>$users,
//            'products'=>$products,
//        ]);
//    }


}
