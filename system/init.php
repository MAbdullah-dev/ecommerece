<?php
// Register a function to autoload classes
spl_autoload_register(function($className) {
    // Require the class file from the classes directory
    require "classes/$className.php";
});

// Instantiate a new Route object
$route = new Route;
