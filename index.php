<?php

    require('./constants.php');
    require('./config.php');

    include_once('./utilities/common_classes.php');
    include_once('./utilities/common_functions.php');

    include('./handlers/handle_session.php');
    include('./handlers/handle_page_data.php');
    include('./handlers/handle_redirected_error_modals.php');
    include('./handlers/handle_redirected_display_changes.php');

    /* Select a Site Theme */
    $theme = 'default';

    if (isset($_POST['style-selector']))
    {
        $in_a_month = time() + (60 * 60 * 24 * 32);
        setcookie(
            'theme-choice',
            $_POST['style-selector'],
            $in_a_month,
            WEBSITE_ROOT,
            DOMAIN);

        if ($_POST['style-selector'] === 'light')
        {
            $theme = 'light';
        }
        elseif ($_POST['style-selector'] === 'dark')
        {
            $theme = 'dark';
        }
        elseif ($_POST['style-selector'] === 'no-blue')
        {
            $theme = 'no-blue';
        }
    }
    elseif (isset($_COOKIE['theme-choice']))
    {
        if ($_COOKIE['theme-choice'] === 'light')
        {
            $theme = 'light';
        }
        elseif ($_COOKIE['theme-choice'] === 'dark')
        {
            $theme = 'dark';
        }
        elseif ($_COOKIE['theme-choice'] === 'no-blue')
        {
            $theme = 'no-blue';
        }
    }

?>

<!DOCTYPE html>
<html>
<head lang="en">

    <?php include('./html_sections/head.php'); ?>

</head>

<body>
    <header>
        <?php include('./html_sections/header.php'); ?>
    </header>

    <div class="container">
    <main class="mt-3 mb-3">
        <?php include('./html_sections/main.php') ?>
    </main>
    </div>

    <footer class="bg-dark text-light pt-4 pb-2">
        <?php include('./html_sections/footer.php'); ?>
    </footer>

</body>

<?php

    handle_redirected_error_modals($error);
    handle_redirected_display_changes($display);

?>
</html>


<?php

    //

?>
