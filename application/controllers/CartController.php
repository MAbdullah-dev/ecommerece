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

    public function checkout() {
        session_start();
        $user_id = $_SESSION['usgit initer_id']; // Correct the session key
        $cartItems = $this->cartModel->getCartItemsByUserId($user_id);
    
        if (empty($cartItems)) {
            echo json_encode(['status' => 400, 'message' => 'No items in cart']);
            return;
        }
    
        $orders = [];
        foreach ($cartItems as $item) {
            $orders[$item->store_id][] = $item;
        }
    
        foreach ($orders as $store_id => $items) {
            $grandTotal = 0;
            foreach ($items as $item) {
                $grandTotal += $item->total_price;
            }
    
            $order_id = $this->cartModel->createOrder($user_id, $store_id, $grandTotal);
    
            foreach ($items as $item) {
                $this->cartModel->addOrderItem($order_id, $item->product_id, $item->quantity, $item->total_price);
            }
        }
    
        $this->cartModel->clearCart($user_id);
    
        echo json_encode(['status' => 200, 'message' => 'Order placed successfully!']);
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
?>