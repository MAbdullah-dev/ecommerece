<?php

class CartController extends framwork
{
    private $cartModel;

    public function __construct()
    {
        $this->cartModel = $this->model('CartModel');
    }

    public function addToCart()
    {
        session_start();
        $product_id = $this->input('product_id');
        $quantity = $this->input('quantity');
        $user_id = $_SESSION['usgit initer_id']; // Assume user is logged in

        if (empty($quantity)) {
            echo json_encode(['status' => 400, 'message' => 'Quantity is required']);
            return;
        }

        $this->cartModel->addToCart($user_id, $product_id, $quantity);
        echo json_encode(['message' => 'Product added to cart successfully!']);
    }

    public function checkout()
    {
        session_start();
        $user_id = $_SESSION['usgit initer_id']; // Assume user is logged in
        $cartItems = $this->cartModel->getCartItemsByUserId($user_id);

        $grandTotal = 0;
        $store_id = null;
        foreach ($cartItems as $item) {
            $grandTotal += $item->total_price;
            $store_id = $item->store_id; 
        }

        // Create order
        $order_id = $this->cartModel->createOrder($user_id, $store_id, $grandTotal);

        // Add items to order_items table
        foreach ($cartItems as $item) {
            $this->cartModel->addOrderItem($order_id, $item->product_id, $item->quantity, $item->total_price);
        }

        // Clear the cart
        $this->cartModel->clearCart($user_id);

        echo json_encode(['status' => 200, 'message' => 'Order placed successfully!', 'order_id' => $order_id]);
    }

    public function updateQuantity()
    {
        session_start();
        $product_id = $this->input('product_id');
        $quantity = $this->input('quantity');
        $user_id = $_SESSION['usgit initer_id'];

        if (empty($quantity)) {
            echo json_encode(['status' => 400, 'message' => 'Quantity is required']);
            return;
        }

        $this->cartModel->updateCartQuantity($user_id, $product_id, $quantity);
        echo json_encode(['status' => 200, 'message' => 'Quantity updated successfully']);
    }

    public function removeItem()
    {
        session_start();
        $product_id = $this->input('product_id');
        $user_id = $_SESSION['usgit initer_id'];

        $this->cartModel->removeFromCart($user_id, $product_id);
        echo json_encode(['status' => 200, 'message' => 'Item removed successfully']);
    }
}
