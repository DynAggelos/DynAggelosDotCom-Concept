<?php

    require('../constants.php');

    // If DEBUG is Off, Redirect to Non-Existent Page
    if (!DEBUG)
    {
        $current_url = $_SERVER['PHP_SELF'];
        $current_url = rtrim($current_url, 'index.php');

        header("refresh: 0; url = {$current_url}index.html");
    }

    // Else, Do Setup
    else
    {
        require('../config.php');

        include_once('../utilities/common_functions.php');

        $time_now = Date('Y-m-d H:i:s');

        /* Create Tables */
        // Create the "pages" Table
        $query = ("CREATE TABLE IF NOT EXISTS pages (
            page_id int(11) NOT NULL auto_increment,
            page text NOT NULL,
            display_title text NOT NULL,
            description text NOT NULL,
            PRIMARY KEY (page_id))");

        $sql->query($query);
        if ($sql->error)
        {
            javascript_alert('Create Pages:\n' . $sql->error);
        }

        // Create the "members" Table
        $query = ("CREATE TABLE IF NOT EXISTS members (
            member_id int(11) NOT NULL auto_increment,
            member_type tinytext NOT NULL,
            last_name tinytext,
            first_name tinytext,
            username tinytext NOT NULL,
            password tinytext NOT NULL,
            email tinytext,
            display_name tinytext,
            recovery_question tinytext NOT NULL,
            recovery_answer tinytext NOT NULL,
            PRIMARY KEY (member_id))");

        $sql->query($query);
        if ($sql->error)
        {
            javascript_alert('Create Members:\n' . $sql->error);
        }

        // Create the "forum_posts" Table
        $query = ("CREATE TABLE IF NOT EXISTS forum_posts (
            post_id int(11) NOT NULL auto_increment PRIMARY KEY,
            posting_member_id int(11) NOT NULL,
            post_time datetime,
            post_title tinytext NOT NULL,
            post_body tinytext NOT NULL)");

        $sql->query($query);
        if ($sql->error)
        {
            javascript_alert('Create Forum Posts:\n' . $sql->error);
        }

        // Create the "forum_responses" Table
        $query = ("CREATE TABLE IF NOT EXISTS forum_responses (
            response_id int(11) NOT NULL auto_increment PRIMARY KEY,
            responding_member_id int(11) NOT NULL,
            post_id_responding_to int(11) NOT NULL,
            response_time datetime,
            response_body tinytext NOT NULL)");

        $sql->query($query);
        if ($sql->error)
        {
            javascript_alert('Create Forum Responses:\n' . $sql->error);
        }

        /* Populate Tables */
        // Populate the "pages" Table
        $query = ("INSERT INTO
            pages (
                page_id, page, display_title, description)
            VALUES (
                '1',
                'home',
                'Home',
                'Your connection to projects managed by Joshua "
                    . "Gerrity.')");

        $sql->query($query);
        if ($sql->error)
        {
            javascript_alert('Insert into Pages:\n' . $sql->error);
        }

        $query = ("INSERT INTO
            pages (
                page_id, page, display_title, description)
            VALUES (
                '2',
                'create-account',
                'Create Account',
                'Create an account at DynAggelos.com.')");

        $sql->query($query);
        if ($sql->error)
        {
            javascript_alert('Insert into Pages:\n' . $sql->error);
        }

        $query = ("INSERT INTO
            pages (
                page_id, page, display_title, description)
            VALUES (
                '3',
                'images',
                'Image Page',
                'Check out some images from Joshua Gerrity\'s projects.')");

        $sql->query($query);
        if ($sql->error)
        {
            javascript_alert('Insert into Pages:\n' . $sql->error);
        }

        $query = ("INSERT INTO
            pages (
                page_id, page, display_title, description)
            VALUES (
                '4',
                'forum',
                'Forum',
                'Chat about anything DynAggelos-related on the forum.')");

        $sql->query($query);
        if ($sql->error)
        {
            javascript_alert('Insert into Pages:\n' . $sql->error);
        }

        // Populate the "members" Table
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
                '1',
                'webmin',
                'Gerrity',
                'Joshua',
                'SomeGuy',
                'HiddyHoNeighbor',
                'abc@123.com',
                'Joshua',
                'The model of your first car?',
                'Focus')");

        $sql->query($query);
        if ($sql->error)
        {
            javascript_alert('Insert into Member:\n' . $sql->error);
        }

        // Populate the "forum_posts" Table
        $query = (
            "INSERT INTO forum_posts (
                post_id,
                posting_member_id,
                post_time,
                post_title,
                post_body)
            VALUES (
                '1',
                '1',
                '$time_now',
                'Welcome',
                'Welcome to the DynAggelos forum! Please be kind and curtious while interacting with others here.')");

        $sql->query($query);
        if ($sql->error)
        {
            javascript_alert('Insert into Member:\n' . $sql->error);
        }
    }

?>
