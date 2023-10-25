<?php

namespace App\Services;

use App\Exceptions\SaveOrderExeptions;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class OrderService
{
    private ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function createOrder(array $data)
    {
        var_dump($data);die;

        DB::beginTransaction();

        try {
        $order = new Order();
        $order->customer = $data['customer'];
        $order->phone = $data['phone'];
        $order->user_id = auth()->id();
        $order->type = $data['type'];
        $order->status = $data['status'];

        $order->save();

        $products = $data;
        $this->productService->addProducts($products, $order->id);

        DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            throw new SaveOrderExeptions("Don't save order with products",0, $e);
        }
    }

    public function updateTask(array $data, Order $order)
    {
        $order->customer = $data['customer'];
        $order->phone = $data['phone'];
//        $order->created_at = $data['created_at'];
//        $order->completed = $data['completed'];
        $order->user_id = auth()->id();
        $order->type = $data['type'];
        $order->status = $data['status'];

        $order->save();
    }

    public function deleteTask(Order $order)
    {
        $order->delete();
    }
}
