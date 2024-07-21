<?php

function save($user)
{

}

function loadUsers($fileName)
{
    $content = file_get_contents($fileName);
    $loadedUsers = json_decode($content, true);

    return $loadedUsers;
}

function deleteUser($users, $usersKey)
{
    unset($users[$usersKey]);

    return $users;
}

function showUsers($users)
{
    foreach ($users as $email => $name) {
        echo '<br/>';
        echo "{$email} => {$name} ";
    }
}

function saveUsers($fileName, $users)
{
    file_put_contents($fileName, json_encode($users, JSON_PRETTY_PRINT));
}