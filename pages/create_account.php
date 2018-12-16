<?php

    // Initialize Variables
    $username = isset($_POST['username']) ? $_POST['username'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;
    $first_name = isset($_POST['first-name']) ? $_POST['first-name'] : null;
    $last_name = isset($_POST['last-name']) ? $_POST['last-name'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $display_name = isset(
        $_POST['display-name']) ? $_POST['display-name'] : null;
    $recovery_question = isset(
        $_POST['recovery-question']) ? $_POST['recovery-question'] : null;
    $recovery_answer = isset(
        $_POST['recovery-answer']) ? $_POST['recovery-answer'] : null;

    $temp_lowercase_username;
    $temp__lowercase_display_name;
    $temp_lowercase_email;
    $valid_data = false;     // Validation variable
    $invalid_input_style =
        'padding-left: 2px; padding-right: 2px; '
        . 'border: 2px solid var(--danger);';

    // Initial Validation Check (In Order of Importance)
    if (is_valid('first-name', $first_name))
    {
        if (is_valid('last-name', $last_name))
        {
            if (is_valid('email', $email))
            {
                if (is_valid('display-name', $display_name))
                {
                    if (is_valid('username', $username))
                    {
                        if (is_valid('password', $password))
                        {
                            if (is_valid(
                                'recovery-question', $recovery_question))
                            {
                                if (is_valid(
                                    'recovery-answer', $recovery_answer))
                                {
                                    $valid_data = true;
                                }
                                elseif ($username !== null)
                                {
                                    if (DEBUG)
                                    {
                                        javascript_alert(
                                            'Recovery answer invalid.', true);
                                    }
                                    javascript_alter_content(
                                        'recovery-answer-input',
                                        'style append',
                                        $invalid_input_style);
                                }
                            }
                            elseif ($username !== null)
                            {
                                if (DEBUG)
                                {
                                    javascript_alert(
                                        'Recovery question invalid.', true);
                                }
                                javascript_alter_content(
                                    'recovery-question-input',
                                    'style append',
                                    $invalid_input_style);
                            }
                        }
                        elseif ($username !== null)
                        {
                            if (DEBUG)
                            {
                                javascript_alert(
                                    'Password invalid.', true);
                            }
                            javascript_alter_content(
                                'password-input',
                                'style append',
                                $invalid_input_style);
                        }
                    }
                    elseif ($username !== null)
                    {
                        if (DEBUG)
                        {
                            javascript_alert(
                                'Username invalid.', true);
                        }
                        javascript_alter_content(
                            'username-input',
                            'style append',
                            $invalid_input_style);
                    }

                }
                elseif ($username !== null)
                {
                    if (DEBUG)
                    {
                        javascript_alert(
                            'Display name invalid.', true);
                    }
                    javascript_alter_content(
                        'display-name-input',
                        'style append',
                        $invalid_input_style);
                }
            }
            elseif ($username !== null)
            {
                if (DEBUG)
                {
                    javascript_alert(
                        'Email invalid.', true);
                }
                javascript_alter_content(
                    'email-input',
                    'style append',
                    $invalid_input_style);
            }
        }
        elseif ($username !== null)
        {
            if (DEBUG)
            {
                javascript_alert(
                    'Last name invalid.', true);
            }
            javascript_alter_content(
                'last-name-input',
                'style append',
                $invalid_input_style);
        }
    }
    elseif ($username !== null)
    {
        if (DEBUG)
        {
            javascript_alert(
                'First name invalid.', true);
        }
        javascript_alter_content(
            'first-name-input',
            'style append',
            $invalid_input_style);
    }

    // If Valid Input, Proceed
    if ($valid_data)
    {
        // Encode Username for Database
        $username = sql_encode_decode($username, true);
        $display_name = sql_encode_decode($display_name, true);
        $email = sql_encode_decode($email, true);

        // Make Lowercase Copy for Checking Duplicates
        $temp_lowercase_username = strtolower($username);
        $temp_lowercase_display_name = strtolower($display_name);
        $temp_lowercase_email = strtolower($email);

        // Check for Duplicate Email, Display Name, and Username in DataBase
        $query =
            "SELECT email
            FROM members
            WHERE LOWER(email) = '$temp_lowercase_email'";
        $result = $sql->query($query);
        $user_array = $result->fetch_assoc();
        if (
            $temp_lowercase_email !== strtolower(
                $user_array['email']))
        {
            $query =
                "SELECT display_name
                FROM members
                WHERE LOWER(display_name) = '$temp_lowercase_display_name'";
            $result = $sql->query($query);
            $user_array = $result->fetch_assoc();
            if (
                $temp_lowercase_display_name !== strtolower(
                    $user_array['display_name']))
            {
                $query =
                    "SELECT username
                    FROM members
                    WHERE LOWER(username) = '$temp_lowercase_username'";
                $result = $sql->query($query);
                $user_array = $result->fetch_assoc();
                if (
                    $temp_lowercase_username !== strtolower(
                        $user_array['username']))
                {
                    // If Duplicate Not Found, Encode Other Data for Database
                    $password = sql_encode_decode($password, true);
                    $first_name = sql_encode_decode($first_name, true);
                    $last_name = sql_encode_decode($last_name, true);
                    $email = sql_encode_decode($email, true);
                    $display_name = sql_encode_decode($display_name, true);
                    $recovery_question = sql_encode_decode(
                        $recovery_question, true);
                    $recovery_answer = sql_encode_decode(
                        $recovery_answer, true);

                    // Query
                    $query = ("INSERT INTO
                        members (
                            member_id,
                            member_type,
                            last_name,
                            first_name,
                            username,
                            password,
                            email,
                            display_name,
                            recovery_question,
                            recovery_answer)
                        VALUES (
                            '',
                            'normal',
                            '$last_name',
                            '$first_name',
                            '$username',
                            '$password',
                            '$email',
                            '$display_name',
                            '$recovery_question',
                            '$recovery_answer')");
                    $result = $sql->query($query);

                    // Handle Query Errors
                    if (DEBUG && $sql->error)
                        javascript_alert($sql->error, true);
                    elseif ($sql->error)
                    {
                        javascript_alert(
                            'There was an error. Please try again in a '
                            . 'little while.',
                            true);
                    }

                    // Else Success
                    else
                        javascript_alert(
                            'Success! Now you can login with your '
                            . 'username and password.',
                            true);
                }
                else
                {
                    if (DEBUG)
                        javascript_alert(
                            'Username already exists.', true);
                    else
                    {
                        javascript_alert(
                            'Please choose another username.', true);
                    }
                    javascript_alter_content(
                        'username-input',
                        'style append',
                        $invalid_input_style);
                }
            }
            else
            {
                if (DEBUG)
                    javascript_alert(
                        'Display name already in use.', true);
                else
                {
                    javascript_alert(
                        'Please choose a different display name.', true);
                }
                javascript_alter_content(
                    'display-name-input',
                    'style append',
                    $invalid_input_style);
            }
        }
        else
        {
            if (DEBUG)
                javascript_alert(
                    'Email already in use.', true);
            else
            {
                javascript_alert(
                    'Please use a different email address.', true);
            }
            javascript_alter_content(
                'email-input',
                'style append',
                $invalid_input_style);
        }
    }
?>

<h3>Create an Account</h3>

<form class="mx-5 mb-3 px-5" id="signup-form" name="signup-form" method="post" action="">
    <div class="form-group row">
        <div class="col">
            <label id="first-name-label" for="first-name">First Name</label>
            <input class="form-control" id="first-name-input" name="first-name" type="text" value="<? if($first_name !==null) echo $first_name; ?>">
        </div>
        <div class="col">
            <label id="last-name-label" for="last-name">Last Name</label>
            <input class="form-control" id="last-name-input" name="last-name" type="text" value="<? if($last_name !==null) echo $last_name ?>">
        </div>
    </div>

    <div class="form-group">
        <label id="email-label" for="email">Email</label>
        <input class="form-control" id="email-input" name="email" type="text" value="<? if($email !==null) echo $email ?>">
    </div>

    <div class="form-group">
        <label id="display-name-label" for="display-name">Display Name</label>
        <input class="form-control" id="display-name-input" name="display-name" type="text" value="<? if($display_name !==null) echo $display_name ?>">
    </div>

    <div class="form-group">
        <label for="username" id="username-label">Username</label>
        <input class="form-control" id="username-input" name="username" type="text" value="<? if($username !==null) echo $username ?>">
        <small class="form-text text-muted">Dashes (-), underscores(_), and spaces are the only permissible special characters. The first character must be a letter or underscore.</small>
    </div>

    <div class="form-group">
        <label id="password-label" for="password">Password</label>
        <input class="form-control" id="password-input" name="password" type="password" value="<? if($password !==null) echo $password ?>">
        <small class="form-text text-muted">Permissible characters are: letters, numbers, ~, `, @, #, $, ^, &, *, (, ), _, and -</small>
    </div>

    <div class="form-group">
        <label id="recovery-question-label" for="recovery-question">Account Recovery Question</label>
        <input class="form-control" id="recovery-question-input" name="recovery-question" type="text" value="<? if($recovery_question !==null) echo $recovery_question ?>">
        <small class="form-text text-muted">Must be 7-25 characters in length.</small>

        <label id="recovery-answer-label" for="recovery-answer">Account Recovery Answer</label>
        <input class="form-control" id="recovery-answer-input" name="recovery-answer" type="text" value="<? if($recovery_answer !==null) echo $recovery_answer ?>">
        <small class="form-text text-muted">Must be 7-25 characters in length.</small>
    </div>

    <input id="submit" name="submit" type="submit" value="Sign Up">
</form>
