<?php
class FrontendController extends framwork
{
    public function about()
    {
        $this->view('frontend/About');
    }
    public function contact()
    {
        $this->view('frontend/contact');
    }
}