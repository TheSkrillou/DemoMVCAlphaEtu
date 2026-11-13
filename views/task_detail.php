<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail de la tâche</title>
</head>
<body>
    <h1>Détail de la tâche #<?php echo $task['id']; ?></h1>
    <p><strong>Titre :</strong> <?php echo $task['title']; ?></p>
    
    
    <a href="/DemoMVCAlpha/tasks">Retour à la liste des tâches</a>
</body>
</html>