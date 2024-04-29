<?php

$todoName = $_POST['todo_name'] ?? false;


if ($todoName) {
    if (file_exists('todoList.json')) {
        $json = file_get_contents('todoList.json');
        $jsonArray = json_decode($json, true);
    }else{
        $jsonArray = [];
    }
    $jsonArray[$todoName] = ['completed' => false];
    file_put_contents('todoList.json', json_encode($jsonArray, JSON_PRETTY_PRINT));
}


header('Location: index.php');