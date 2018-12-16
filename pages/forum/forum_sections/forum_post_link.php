<?php

    // Convert the Date and Time from the Database into a More Readable Format
    $post_time = date('\o\n F jS, Y \a\t g:m a', strtotime($post_time));

?>

<a href="<?= $_SERVER['PHP_SELF'] . "?page=forum&post_id=" . $post_id ?>">
    <div class="forum-post-link">
        <span><?= $post_title ?></span><br>
        <em>Posted <?= $post_time; ?> by <?= $username ?></em><br></span>
    </div>
</a>
