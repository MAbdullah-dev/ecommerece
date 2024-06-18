<?php


class HomeController extends framwork
{
    public $ProductModel;
    public $CartModel;

    public function __construct()
    {
        
        // if ($_SESSION == "") {
        //     $this->redirect('AuthController/loginpage');
        // }
        $this->helper('link');
        $this->ProductModel = $this->model('ProductModel');
        $this->CartModel = $this->model('CartModel');
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
        $this->view('frontend/shop', ['data' => $data]);
    }
    public function product_detail($id)
    {
        $product = $this->ProductModel->getProductById($id);

        $this->view('frontend/product_detail', ['data' => $product]);
    }
    public function checkout()
    {
        session_start();
        $user_id = $_SESSION['usgit initer_id']; // Assume user is logged in
        $cartItems = $this->CartModel->getCartItemsByUserId($user_id);
        $this->view('frontend/checkout',['data'=>$cartItems ]);
    }
    
}
