<?php

    $error = (isset($_SESSION['err']) ? $_SESSION['err'] : '');
    unset($_SESSION['err']);

    function handle_redirected_error_modals($error)
    {
        if ($error === 'login_credentials_missing')
            javascript_alert('Please fill in both fields to login.');

        elseif ($error === 'login_credentials_invalid')
            javascript_alert(
                'Wrong username and/or password. Please try again.');

        elseif ($error === 'general')
            javascript_alert(
                'Sorry, something went wrong.');
    }

?>
