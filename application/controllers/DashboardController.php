<?php
// DashboardController.php

class DashboardController extends framwork
{
    public $UserstoreModel;
    public $OrderModel;
    public function __construct()
    {
        parent::__construct(); // Ensure framework constructor is called
        $this->UserstoreModel = $this->model('UserstoreModel');
        $this->OrderModel = $this->model('OrderModel'); // Include OrderModel

        
    }

    public function dashboardpage()
    {
        // Use checkAccess middleware to allow access for roles 1 and 2
        $this->checkAccess([1]);
        $user=$this->UserstoreModel->getUsers();
        $storeowner=$this->UserstoreModel->getStoreOwners();
        $this->view('dashboard/dashboard',['data'=>$user,$storeowner]);
    }
    
    public function productcrudPage()
    {
        // Use checkAccess middleware to allow access for role 1 only
        $this->checkAccess([2]);
        
        $this->view('dashboard/pages/crudoperations/productcrud');
    }
    
    public function categoriescrudPage()
    {
        // Use checkAccess middleware to allow access for role 1 only
        $this->checkAccess([1]);

        $this->view('dashboard/pages/crudoperations/categoriescrud');
    }
    public function orderPage()
    {
        // Use checkAccess middleware to allow access for role 1 only
        session_start();
        if ($_SESSION['store_id']) {
            $store_id = $this->getSession('store_id');
        }
     
        $this->checkAccess([2]);

        $orders = $this->OrderModel->getOrdersByStoreId($store_id);
        $this->view('dashboard/pages/orders/ordertable', ['data' => $orders]);
    }
}
