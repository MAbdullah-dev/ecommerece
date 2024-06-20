<?php
// DashboardController.php

class DashboardController extends framwork
{
    public function __construct()
    {
        parent::__construct(); // Ensure framework constructor is called
    }

    public function dashboardpage()
    {
        // Use checkAccess middleware to allow access for roles 1 and 2
        $this->checkAccess([1, 2]);

        $this->view('dashboard/dashboard');
    }

    public function productcrudPage()
    {
        // Use checkAccess middleware to allow access for role 1 only
        $this->checkAccess([1, 2]);

        $this->view('dashboard/pages/crudoperations/productcrud');
    }

    public function categoriescrudPage()
    {
        // Use checkAccess middleware to allow access for role 1 only
        $this->checkAccess([1]);

        $this->view('dashboard/pages/crudoperations/categoriescrud');
    }
}
