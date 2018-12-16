<h3>Add a Response</h3>
<form action="<?= $_SERVER['PHP_SELF'] . "?page=" . $page . "&post_id=" . $forum_post_id ?>" method="post" name="post_reply_form">
<textarea name="response" class="forum-input"></textarea><br>
<input type="hidden" name="responding_member_id" value="<?= $user_id ?>"><br>
<input type="submit" value="Reply" style=\"margin-left: 2.5em;\">
</form>
