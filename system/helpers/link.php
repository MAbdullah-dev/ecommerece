<?php
// Function to link a CSS file
function linkCSS($cssPath){
    // Create the full URL to the CSS file
    $url = BASEURL . "/" . $cssPath;
    // Output the HTML link tag for the CSS file
    echo '<link rel="stylesheet" type="text/css" href="' . $url . '">';
}

// Function to link a JavaScript file
function linkJS($JSPath){
    // Create the full URL to the JavaScript file
    $url = BASEURL . "/" . $JSPath;
    // Output the HTML script tag for the JavaScript file
    echo '<script type="text/javascript" src="' . $url . '"></script>';
}
