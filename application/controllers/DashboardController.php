<?php 
class DashboardController extends framwork
{
    public $ProductModel;
    
    // public function __construct()
    // {
    //     $this->ProductModel=$this->model('ProductModel');;
        
    // }
    public function dashboardpage()
    {
        $this->view('dashboard/dashboard');
    }
    public function productcrudPage()
    {
        
        // print_r($categories);
        // die;
        $this->view('dashboard/pages/crudoperations/productcrud');
    }
    public function categoriescrudPage()
    {
        
        // print_r($categories);
        // die;
        $this->view('dashboard/pages/crudoperations/categoriescrud');
    }
    

}