<?php

$todos = [];
if (file_exists('todoList.json')) {
    $json = file_get_contents('todoList.json');
    $todos = json_decode($json, true);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="newTodo.php" method="POST">
        <input type="text" name="todo_name" placeholder="Enter your todo" />
        <button>New Todo</button>
    </form>
 
    <?php foreach ($todos as $todoName => $todo) : ?>
        <?php  ?>
        <div style="margin-bottom: 20px">
            <form style="display: inline-block" action="change_status.php" method="post">
                <input type="hidden" name="todo_name" value="<?php echo $todoName ?>">
                <input type="checkbox" <?php echo $todo['completed'] ? 'checked' : '' ?>>
            </form>
            <span <?php echo $todo['completed'] ? 'style="text-decoration: line-through;"' : '' ?>>
                <?php echo $todoName; ?>
            </span>
            <form style="display: inline-block" action="delete.php" method="post">
                <input type="hidden" name="todo_name" value="<?php echo $todoName ?>">
                <button>Delete</button>
            </form>
        </div>
    <?php endforeach ?>

    <script>
        const checkboxes = document.querySelectorAll('input[type=checkbox]');
        checkboxes.forEach(ch => {
            ch.onclick = function() {
                this.parentNode.submit();
            };
        })
    </script>
</body>

</html>