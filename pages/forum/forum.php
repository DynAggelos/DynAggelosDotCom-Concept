<?php

    // Include Functions
    include("display_forum_post.php");
    include("display_forum_home.php");

    if (isset($_GET['post_id']))
    {
        $forum_post_id = $_GET['post_id'];
        
        echo "<a style=\"font-size: 1.25em;\" href=\"" . $_SERVER['PHP_SELF'] . "?page=forum\">&lt; Back</a><br><br>\n";

        display_forum_post($page, $sql, $forum_post_id);
    }
    else
    {
        display_forum_home($page, $sql);
    }
?>
