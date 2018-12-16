<title><?= $title ?></title>
<meta name="description" content="<?= $description ?>.">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="resources/css/bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="resources/css/main.css">
<?php

    if ($theme === 'light')
    {
        ?><link rel="stylesheet" href="resources/css/light-theme.css"><?php
    }
    elseif ($theme === 'dark')
    {
        ?><link rel="stylesheet" href="resources/css/dark-theme.css"><?php
    }
    elseif ($theme === 'no-blue')
    {
        ?><link rel="stylesheet" href="resources/css/no-blue-theme.css"><?php
    }
    
?>
<!-- <link rel="icon" href="../../favicon.ico" type="image/x-icon"> -->
<!-- <link rel="icon" href="../../favicon.png" type="image/x-icon"> -->

<script src="resources/js/jquery/jquery.slim.min.js"></script>
<script src="resources/js/popper/popper.min.js"></script>
<script src="resources/js/bootstrap/bootstrap.js"></script>
<script src="resources/js/main.js"></script>
