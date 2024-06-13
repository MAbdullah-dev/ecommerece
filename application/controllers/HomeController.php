<?php
class HomeController extends framwork
{
    public $ProductModel;

    public function __construct()
    {
        $this->ProductModel=$this->model('ProductModel');
    }
    public function home()
    {
        $this->view('frontend/home');
    }
    public function about()
    {
        $this->view('frontend/about');
    }
    public function contact()
    {
        $this->view('frontend/contact');
    }
    public function blog()
    {
        $this->view('frontend/blog');
    }
    public function shop()
    {
        $data = $this->ProductModel->showData();
        $this->view('frontend/shop',['data'=>$data]);
    }
    public function product_detail($id)
    {  
        $product = $this->ProductModel->getProductById($id);
        $this->view('frontend/product_detail',['product' => $product]);
    }
} 