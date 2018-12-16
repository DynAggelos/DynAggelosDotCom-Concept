<?php

    function display_forum_home($page, $sql)
    {
        if (isset($_SESSION['username']))
        {
            $username = $_SESSION['username'];

            // Get Logged in User's ID
            $query = "SELECT member_id FROM members WHERE username = '$username'";
            $result = $sql->query($query);
            if ($sql->error)
            {
                if (DEBUG)
                    javascript_alert("$sql->error");
                else
                    javascript_alert('Sorry, something went wrong.');
            }

            // No Database Errors
            else
            {
                $temp_array = $result->fetch_assoc();
                $user_id = $temp_array['member_id'];

                $post_id = "";
                $post_time = "";
                $post_title = "";
                $post_body = "";

                $temp_array;                // Array containing temporary data

                $time_now = date("Y-m-d H:i:s");

                /* If New Post Exists, Add to DataBase */
                if (isset($_POST['new_post']))
                {
                    $post_body = $_POST['new_post'];
                    $user_id = $_POST['posting_member_id'];
                    $post_title = $_POST['new_title'];

                    $query = (
                        "INSERT INTO forum_posts (
                            post_id,
                            posting_member_id,
                            post_time,
                            post_title,
                            post_body)
                        VALUES(
                            '',
                            $user_id,
                            '$time_now',
                            '$post_title',
                            '$post_body')");

                    $result = $sql->query($query);
                    if ($sql->error)
                    {
                        if (DEBUG)
                            javascript_alert("$sql->error");
                        else
                            javascript_alert('Sorry, something went wrong.');
                    }
                }

                /* Display Post Form */
                include('forum_sections/forum_post_form.php');
            }
        }

        /* Display All Posts */
        $post_array = array("");    // Array containing data from a post

        $query = "SELECT * FROM forum_posts";
        $result = $sql->query($query);
        while ($post_array = $result->fetch_assoc())
        {
            // Get Username of Poster Using User ID
            $user_id = $post_array['posting_member_id'];
            $query = "SELECT username FROM members WHERE member_id = $user_id";
            $result_2 = $sql->query($query);

            if (!$temp_array = $result_2->fetch_assoc())
                return "";      // Exit function if missing data
            $username = $temp_array['username'];

            // Gather Other Data
            $post_id = $post_array['post_id'];
            $post_time = $post_array['post_time'];
            $post_title = $post_array['post_title'];

            // Display Post
            include('forum_sections/forum_post_link.php');
        }
    }

?>
