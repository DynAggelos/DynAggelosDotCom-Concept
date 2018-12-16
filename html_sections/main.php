<?php

    if ($page === 'home')
    {
        include('./pages/home.php');
    }
    elseif ($page === 'create-account')
    {
        include('./pages/create_account.php');
    }
    elseif ($page === 'images')
    {
        include('./pages/image-page.php');
    }
    elseif ($page === 'forum')
    {
        include('./pages/forum/forum.php');
    }

?>
