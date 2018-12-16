<h3>Add a New Post</h3>
<form action="<?= $_SERVER['PHP_SELF'] . "?page=" . $page ?>" method="POST" name="post_form">
    <input type="text" name="new_title" class="forum-input">
        <textarea name="new_post" class="forum-input"></textarea><br>
        <input type="hidden" name="posting_member_id" value="<?= $user_id ?>">
        <input type="submit" value="Post" style="margin-left: 2.5em;">
</form>

<hr style="width: 100%; margin-top: 2em; margin-bottom: 2em; opacity: 0.5;">
