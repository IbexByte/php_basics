<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php Basics</title>
</head>
<body>
    <h1>Welcome</h1>
    <ul>
        <?php foreach($tasks as $task) :  ?>
            <li> <?= $task->description ?> </li>
            <?php endforeach; ?>
    </ul>
</body>
</html>