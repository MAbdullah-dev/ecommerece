<?php


class HomeController extends framwork
{
    public $ProductModel;
    public $CartModel;

    public function __construct()
    {
        
        
        $this->helper('link');
        $this->ProductModel = $this->model('ProductModel');
        $this->CartModel = $this->model('CartModel');
        session_start();
        if (!isset($_SESSION['usgit initer_id'])) {
            $this->redirect('AuthController/loginpage');
        }
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
    public function forbidden()
    {
        $this->view('frontend/Unauthorizedaccess');
    }
    public function pagenotfound()
    {
        $this->view('frontend/pagenotfound');
    }
    
}
