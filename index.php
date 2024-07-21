<?php

include 'functions.php';

$content = file_get_contents('head.html');
$content = $content . file_get_contents('newUser.html');
$content = $content . file_get_contents('deleteUser.html');
$content = $content . file_get_contents('bottom.html');

echo $content;

print_r($_POST);

$usersListFileName = 'users.json';
$users = loadUsers($usersListFileName);

showUsers($users);

if ($_POST == []) {
    return;
}

$name = $_POST['name'];
$email = $_POST['email'];

if (isset($_POST['delUser'])) {
    $deleteUser = $_POST['delUser'];
    $users = deleteUser($users, $deleteUser);

    saveUsers($usersListFileName, $users);
}

if (array_key_exists($email, $users)) {
    echo '<strong>Такой пользователь уже существует</strong>';
} else {
    $users[$email] = $name;

    saveUsers($usersListFileName, $users);

    $users = loadUsers($usersListFileName);
}

showUsers($users);

