<?php

$json = file_get_contents('todoList.json');
$jsonArray = json_decode($json, true);

$todoName = $_POST['todo_name'];
unset($jsonArray[$todoName]);

file_put_contents('todoList.json', json_encode($jsonArray, JSON_PRETTY_PRINT));

header('Location: index.php');