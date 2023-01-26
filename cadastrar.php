<?php

if (isset($_POST['login'])) {
    if (isset($_POST['username']) && ($_POST['username'] = !null)) {
        $username = filter_input(
            INPUT_POST,
            'username',
            FILTER_SANITIZE_SPECIAL_CHARS
        );
    }

    if (isset($_POST['password']) && ($_POST['password'] = !null)) {
        $password = filter_input(
            INPUT_POST,
            'password',
            FILTER_SANITIZE_SPECIAL_CHARS
        );
    }
}