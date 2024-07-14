<?php

include 'functions.php';

$content = file_get_contents('head.html');
$content = $content.file_get_contents('newUser.html');
$content = $content.file_get_contents('bottom.html');

echo $content;

print_r($_GET);

//echo 'name: ' . $_GET['name'];
$usersListFIleName = 'users.json';
$users = loadUsers($usersListFIleName);

$users[] = $_GET['name'];
//var_dump($users);

file_put_contents($usersListFIleName, json_encode($users));

$users = loadUsers($usersListFIleName);

echo '<br/>';
print_r($users);
