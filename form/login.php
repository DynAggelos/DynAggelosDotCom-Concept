<?php

    require('../constants.php');

    // Clear Session if (Somehow) Exists
    if (isset($_SESSION['username']))
    {
        $_SESSION = null;
        session_destroy();
    }

    // Start New Session
    session_start();

    require '../config.php';
    require_once '../utilities/common_classes.php';
    require_once '../utilities/common_functions.php';

    // Determine Page to Redirect Back To
    $redirect_back_to = (
        $_GET['page'] != 'home' ? '?page=' . $_GET['page'] : '');

    // Determine User Credentials
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    /* Test for Errors */
    // Output Error if Missing Credentials
    if ($username === '' || $password === '')
    {
        $_SESSION['err'] = 'login_credentials_missing';
    }

    // Validate Username and Password
    elseif (
        !is_valid('username', $username)
        || !is_valid('password', $password))
    {
        $_SESSION['err'] = 'login_credentials_invalid';
        $_SESSION['display'] = 'display_username_invalid';
    }

    // If No Problems, Query Database with Username
    else
    {
        // Encode Username and Password for Database
        $username = sql_encode_decode($username, true);
        $password = sql_encode_decode($password, true);

        // Query
        $query = "SELECT username, password, display_name FROM members WHERE members.username = '$username'";
        $result = $sql->query($query);
        if ($sql->error)
        {
            $_SESSION['err'] = 'login_credentials_invalid';
        }

        // If No Database Errors, Test Password
        else
        {
            $user_array = $result->fetch_assoc();

            if ($password === $user_array['password'])
            {
                $_SESSION['username'] = $username;
                $_SESSION['name'] = $user_array['display_name'];
            }
            else
            {
                $_SESSION['err'] = 'login_credentials_invalid';
            }
        }
    }

    // Reload the Home Page
    header("refresh: 0; url = ..$redirect_back_to");
?>
