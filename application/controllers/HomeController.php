<?php
class HomeController extends framwork
{
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
        $this->view('frontend/shop');
    }
} 