<?php

    function javascript_alert($message, $wait_for_DOM = false)
    {
        $message = htmlspecialchars($message);
        $alert =
            "<script type=\"text/javascript\">useAlert("
            . "\"$message\", $wait_for_DOM)</script>";
        echo $alert;
    }

    function javascript_alter_content(
        $content_id,
        $alteration_method = 'replace',
        $new_content = '',
        $old_content = '')
    {
        $javascript_alteration =
            "<script type=\"text/javascript\">"
            . "alterContent("
                . "\"$content_id\","
                . "\"$alteration_method\","
                . "\"$new_content\","
                . "\"$old_content\");"
            . "</script>";

        echo $javascript_alteration;
    }

    function is_valid($type, $content)
    {
        if ($type === 'username')
            return preg_match('/^\w[\w\d\-\ ]{3,14}$/', $content);

        elseif ($type === 'password')
            return preg_match(
                '/^[\w\d\~\`\@\#\$\^\&\*\(\)\-\ ]{5,20}$/', $content);

        elseif ($type === 'email')
            return preg_match(
                '/([\w\-]+\@[\w\-]+\.[\w\-]+)/', $content);

        elseif ($type === 'recovery-question')
            return preg_match('/^[\w\d\,\. ]{7,25}$/', $content);

        elseif ($type === 'recovery-answer')
            return preg_match('/^[\w\d\,\. ]{7,25}$/', $content);

        elseif ($type === 'last-name')
            return preg_match('/^[a-z\-]{3,15}$/i', $content);

        elseif ($type === 'first-name')
            return preg_match('/^[a-z\-]{3,15}$/i', $content);

        elseif ($type === 'display-name')
            return preg_match('/^[a-z\-]{3,15}$/i', $content);

        // Catch-All
        else
            return false;
    }

    function sql_encode_decode($input, $do_encode = true)
    {
        //$sql_code = new SQLEncodeDecode();

        if ($do_encode === true)
        {
            $input = stripslashes($input);
            $input = htmlspecialchars($input);
            //$input = decode_htmlentities($input);
            //$input = $sql_code->encode($input);
        }
        else
        {
            //$input = $sql_code->decode($input);
            //$input = htmlentities($input);
        }

        return $input;
    }

?>
