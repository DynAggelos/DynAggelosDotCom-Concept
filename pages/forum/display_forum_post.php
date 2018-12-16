<?php
    function display_forum_post($page, $sql, $forum_post_id)
    {
        if (isset($forum_post_id))
        {
            $user_id = "";
            $username = "";
            $post_time = "";
            $post_title = "";
            $post_body = "";
            $post_count = 1;        // Top post counts as one

            $post_array = array("");    // Array containing data from a post
            $temp_array;                // Array containing temporary data

            $time_now = date("Y-m-d H:i:s");

            /* If New Response Exists, Add to DataBase */
            if (isset($_POST['response']))
            {
                $post_body = $_POST['response'];
                $user_id = $_POST['responding_member_id'];

                $query = (
                    "INSERT INTO forum_responses (
                        response_id,
                        responding_member_id,
                        post_id_responding_to,
                        response_time,
                        response_body)
                    VALUES(
                        '',
                        '$user_id',
                        '$forum_post_id',
                        '$time_now',
                        '$post_body')");

                $result = $sql->query($query);
            }

            /* Display Initial Post */
            // Get Post Data
            $query =
                "SELECT * FROM forum_posts WHERE post_id = $forum_post_id";
            $result = $sql->query($query);
            if (!$post_array = $result->fetch_assoc())
                return '';      // Exit function if missing data

            // Get Username of Poster Using User ID
            $user_id = $post_array['posting_member_id'];
            $query =
                "SELECT username FROM members WHERE member_id = $user_id";
            $result_2 = $sql->query($query);

            if (!$temp_array = $result_2->fetch_assoc())
                return "";      // Exit function if missing data
            $username = $temp_array['username'];

            // Gather Other Data
            $post_time = $post_array['post_time'];
            $post_title = $post_array['post_title'];
            $post_body = $post_array['post_body'];

            // Display Post
            include('forum_sections/forum_post.php');

            /* Display Any Responses */
            // Get Response Data
            $query =
                "SELECT * FROM forum_responses
                WHERE post_id_responding_to = $forum_post_id";
            $result = $sql->query($query);

            while ($post_array = $result->fetch_assoc())
            {
                // Get Username of Responder Using User ID
                $user_id = $post_array['responding_member_id'];
                $query =
                    "SELECT username FROM members
                    WHERE member_id = $user_id";
                if (!$result_2 = $sql->query($query))
                {
                    if (DEBUG)
                        javascript_alert($sql->error);

                    return '';
                }

                $temp_array = $result_2->fetch_assoc();
                $username = $temp_array['username'];

                // Gather Other Data
                $post_time = $post_array['response_time'];
                $post_body = $post_array['response_body'];

                $post_body = str_replace("\n", "<br>\n", $post_body);

                // Display Post
                include('forum_sections/forum_response.php');

                // Count Posts
                $post_count++;
            }

            /* Display Response Form */
            if (isset($_SESSION['username']))
                include('forum_sections/response_form.php');
        }
    }
?>
