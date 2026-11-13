<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionnaire de tâches</title>
</head>
<body>
<h1>Liste des tâches</h1>
<ul>
<?php foreach ($tasks as $task): ?>
    <li>
        <a href="/DemoMVCAlpha/tasks/<?php echo $task['id']; ?>">
            <?php echo $task['title']; ?>
        </a>
    </li>
<?php endforeach; ?>
</ul>
</ul>
</body>
</html>