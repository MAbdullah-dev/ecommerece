<?php
class OrderController extends framwork {
    public $OrderModel;
    public function __construct() {
        $this->helper('link');
        $this->OrderModel = $this->model('OrderModel'); // Include OrderModel
    }

    public function approveOrder($order_id)
    {

        $this->OrderModel->approveOrder($order_id);
        $this->redirect('DashboardController/orderpage');
    }

    public function viewOrderItems($order_id)
    {
        // session_start();
        // $store_id = $this->getSession('store_id');

        // if (!$store_id) {
        //     $this->redirect('/AuthController/loginpage');
        // }

        $orderItems = $this->OrderModel->getOrderItemsByOrderId($order_id);
        $this->view('dashboard/pages/orders/orderitems', ['data' => $orderItems]);
    }
}
?>
