<?php

class Route {
    // Default controller if no other controller is specified in the URL
    protected $controller = 'HomeController';
    
    // Placeholder for the method, initialized as an empty array
    protected $method = 'home';
    
    // Placeholder for parameters, initialized as an empty array
    protected $params = [];

    // Constructor function runs when an object of the Route class is instantiated
    public function __construct() {
        // Get the URL and split it into parts
        $url = $this->url();
        
        // If the URL is not empty
        if (!empty($url)) {
            // Check if a controller file corresponding to the first part of the URL exists
            if (file_exists("../application/controllers/" . $url[0] . ".php")) {
                // Set the controller to the first part of the URL
                $this->controller = $url[0];
                // Remove the controller part from the URL array
                unset($url[0]);
            } else {
                // Display a 404 error if the controller file does not exist
                echo "404 sorry $url[0] not found ";
            }
        }
        
        // Include the controller file
        require_once "../application/controllers/" . $this->controller . ".php";
        
        // Instantiate the controller class
        // This line creates a new instance of the class whose name is stored in $this->controller
        $this->controller = new $this->controller;
        //method include
        if (isset($url[1]) && !empty($url[1])) {
            if (method_exists($this->controller,$url[1])) {
                $this->method=$url[1];
                unset($url[1]);
        
            }else{
                echo "404 sorry $url[1] not found ";
            }
        }
        if (isset($url)) {
            $this->params=$url;
        }else{
            $this->params=[];
        }
        call_user_func_array([$this->controller,$this->method],$this->params);
    }

    // Function to process and return the URL parts
    public function url() {
        // Check if a URL parameter is set
        if (isset($_GET['url'])) {
            // Get the URL parameter
            $url = $_GET['url'];
            // Trim any trailing slashes
            $url = rtrim($url, '/');
            // Sanitize the URL to remove invalid characters
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // Split the URL into an array using '/' as a delimiter
            $url = explode('/', $url);

            // Return the processed URL array
            return $url;
        }
    }
}

?>