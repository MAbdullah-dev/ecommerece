<?php
require_once '../system/classes/framwork.php';
class HomeController extends framwork
{
    public function home()
    {
        $this->view('frontend/home');
    }
    public function about()
    {
        $this->view('frontend/About');
    }
    public function contact()
    {
        $this->view('frontend/contact');
    }
} 