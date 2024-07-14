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