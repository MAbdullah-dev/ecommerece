<?php
class CartModel extends Database
{
    public function addToCart($user_id, $product_id, $quantity)
    {
        $sql = "SELECT * FROM cart WHERE user_id = :user_id AND product_id = :product_id";
        $params = [':user_id' => $user_id, ':product_id' => $product_id];
        $this->Query($sql, $params);

        if ($this->rowCount() > 0) {
            $sql = "UPDATE cart SET quantity = quantity + :quantity 
                    WHERE user_id = :user_id AND product_id = :product_id";
            $params = [
                ':user_id' => $user_id,
                ':product_id' => $product_id,
                ':quantity' => $quantity
            ];
        } else {
            $sql = "INSERT INTO cart (user_id, product_id, quantity) 
                    VALUES (:user_id, :product_id, :quantity)";
            $params = [
                ':user_id' => $user_id,
                ':product_id' => $product_id,
                ':quantity' => $quantity
            ];
        }

        return $this->Query($sql, $params);
    }

    public function getCartItemsByUserId($user_id)
    {
        $sql = "SELECT c.*, p.name AS product_name, p.price AS unit_price, (c.quantity * p.price) AS total_price, p.store_id 
                FROM cart c
                JOIN products p ON c.product_id = p.id
                WHERE c.user_id = :user_id";
        $params = [':user_id' => $user_id];
        $this->Query($sql, $params);

        return $this->fetchAll();
    }

    public function updateCartQuantity($user_id, $product_id, $quantity)
    {
        $sql = "UPDATE cart SET quantity = :quantity WHERE user_id = :user_id AND product_id = :product_id";
        $params = [
            ':user_id' => $user_id,
            ':product_id' => $product_id,
            ':quantity' => $quantity
        ];
        return $this->Query($sql, $params);
    }

    public function removeFromCart($user_id, $product_id)
    {
        $sql = "DELETE FROM cart WHERE user_id = :user_id AND product_id = :product_id";
        $params = [
            ':user_id' => $user_id,
            ':product_id' => $product_id
        ];
        return $this->Query($sql, $params);
    }

    public function createOrder($user_id, $store_id, $grand_total)
    {
        $sql = "INSERT INTO orders (user_id, store_id, grand_total, status) VALUES (:user_id, :store_id, :grand_total, 'pending')";
        $params = [
            ':user_id' => $user_id,
            ':store_id' => $store_id,
            ':grand_total' => $grand_total
        ];
        $this->Query($sql, $params);
        return $this->conn->lastInsertId();
    }

    public function addOrderItem($order_id, $product_id, $quantity, $totalprice)
    {
        $sql = "INSERT INTO order_items (order_id, product_id, quantity, totalprice) VALUES (:order_id, :product_id, :quantity, :totalprice)";
        $params = [
            ':order_id' => $order_id,
            ':product_id' => $product_id,
            ':quantity' => $quantity,
            ':totalprice' => $totalprice
        ];
        return $this->Query($sql, $params);
    }

    public function clearCart($user_id)
    {
        $sql = "DELETE FROM cart WHERE user_id = :user_id";
        return $this->Query($sql, [':user_id' => $user_id]);
    }
}
