<?php

include 'functions.php';

$content = file_get_contents('head.html');
$content = $content.file_get_contents('newUser.html');
$content = $content.file_get_contents('bottom.html');

echo $content;

if (isset($_POST)) {
    $usersListFIleName = 'users.json';
    $users = loadUsers($usersListFIleName);

    $name = $_POST['name'];
    $email = $_POST['email'];

    $users[$email] = $name;

    file_put_contents($usersListFIleName, json_encode($users));

    $users = loadUsers($usersListFIleName);

    foreach ($users as $email => $name) {
        echo '<br/>';
        echo "{$email} => {$name} ";
    }
}

