<?php

namespace App\Services;

use App\Models\OrderItem;
use App\Models\Product;

class productService
{
    public function addProducts(array $products, int $orderId)
    {
        foreach ($products as $product) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $orderId;
            $orderItem->product_id = $product->id;
            $orderItem->count = $product->count;
            $orderItem->discount = $product->discount;
            $orderItem->cost = $orderItem->count*$orderItem->discount;

            $orderItem->save();
        }
    }
}
