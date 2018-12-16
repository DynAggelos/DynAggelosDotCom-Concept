<?php

    // Convert the Date and Time from the Database into a More Readable Format
    $post_time = date('F jS, Y \a\t g:m a', strtotime($post_time));

?>

<strong style="font-size: 1.25em;"><?= $username ?></strong> says:<br>
<em>(<?= $post_time ?>)</em><br>
<div class="forum-post">
    <?= $post_body ?>
</div>

<hr style="width: 100%; margin-top: 2em; margin-bottom: 2em; opacity: 0.5;">
