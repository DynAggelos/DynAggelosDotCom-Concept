<?php

    // Clear Session
    session_start();
    session_destroy();
    
    // Determine Page to Redirect Back To
    $redirect_back_to = (
        $_GET['page'] != 'home' ? '?page=' . $_GET['page'] : '');
    
    // Reload the Home Page
    header("refresh: 0; url = ..$redirect_back_to");

?>