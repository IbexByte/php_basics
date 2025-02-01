<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Basics</title>
</head>
<body>
    <h1>Welcome</h1>
    
    
    <!-- Form to input description -->
    <form action="create/task" method="post">
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="4" cols="50"></textarea><br><br>
        <input type="submit" value="Save Description">
    </form>

    <ul>
        <?php foreach($tasks as $task) :  ?>
            <li> <?= $task->description ?> </li>
            <?php endforeach; ?>
    </ul>
</body>
</html>