<?php

    $page = '';
    $temp_page = (isset($_GET['page']) ? $_GET['page'] : 'home');

    // Encode Input for Database
    $temp_page = sql_encode_decode($temp_page, true);

    // Query
    $query = "SELECT page, display_title FROM pages WHERE page = '$temp_page'";
    $result = $sql->query($query);
    if ($sql->error)
        $page = 'home';
    else
    {
        $page_array = $result->fetch_assoc();
        $page = $page_array['page'];
        $title = $page_array['display_title'];
    }

?>
