<?php

    $display = (isset($_SESSION['display']) ? $_SESSION['display'] : '');
    unset($_SESSION['display']);

    function handle_redirected_display_changes($display)
    {
        if ($display == 'display_username_invalid')
        {
            /* Processing gets here but the function is never called */
            javascript_alter_content(
                'username',
                'class append',
                ' border-warning');
        }
    }

?>
