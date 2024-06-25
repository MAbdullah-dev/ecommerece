<?php
class OrderModel extends Database
{
    public function getOrdersByStoreId($store_id)
    {
        $sql = "
            SELECT o.*, u.name AS user_name 
            FROM orders o
            JOIN users u ON o.user_id = u.id
            WHERE o.store_id = :store_id";
        $this->Query($sql, [':store_id' => $store_id]);
        return $this->fetchAll();
    }

    public function getOrderItemsByOrderId($order_id)
    {
        $sql = "
            SELECT oi.*, p.name AS product_name 
            FROM order_items oi
            JOIN products p ON oi.product_id = p.id
            WHERE oi.order_id = :order_id";
        $this->Query($sql, [':order_id' => $order_id]);
        return $this->fetchAll();
    }

    public function approveOrder($order_id)
    {
        $sql = "UPDATE orders SET status = 'approved' WHERE id = :order_id";
        $this->Query($sql, [':order_id' => $order_id]);
        return $this->rowCount() > 0;
    }
}
?>
