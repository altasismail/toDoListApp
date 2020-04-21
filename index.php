<?php
//connect to db
$db = mysqli_connect("localhost", "root", "", "todo");
if (isset($_POST["submit"])) {
    $task = $_POST["task"];
    mysqli_query($db, "INSERT INTO tasks (task) VALUES ('$task')");
    header('location:index.php');
}
$tasks = mysqli_query($db, "SELECT * FROM tasks");




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>to do list application with php and mysql</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="heading">
        <h2>To Do List App with PHP and MySQL</h2>

    </div>
    <form method="POST" action="index.php">
        <input type="text" name="task" class="task_input">
        <button type="submit" class="add_btn" name="submit">Add New Task</button>
    
    
    </form>

    <table>
        <thead>
            <tr>
                <th>N</th>
                <th>Task</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($tasks)) { ?>
            <tr>
                <td><?php echo $row ["id"]; ?></td>
                <td class="task"><?php echo $row ["task"]; ?></td>
                <td class="delete">
                    <a href="#">x</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    
    </table>
</body>
</html>