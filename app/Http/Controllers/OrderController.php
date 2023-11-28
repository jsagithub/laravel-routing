<?php

namespace App\Http\Controllers;
class OrderController
{
    public function show($orderId): string
    {
        return 'This is the order: ' . $orderId;
    }
    public function index(): string
    {
        return 'This is the orders list';
    }
}
