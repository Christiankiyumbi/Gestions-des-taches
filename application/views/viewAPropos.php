<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>todoApp | A propos</title>
</head>

<style>
    body
    {
        background-color: #f0f0f0;
        font-family: "Arial";
    }

    p
    {
        font-size: 20px;
        color: #676768;
    }

    div
    {
        background-color: white;
        box-shadow:  0 0 18px #D0D0D0;
        padding: 15px;
        margin: 3%;
    }

    nav, ul, li
    {
        padding: 5px;
        margin-left: 3%;
    }
    h1
    {
        color: #1E90FF;
        text-align: center;
    }
</style>

<body>

    <div>
        <h1>todoApp</h1>
        <h3>Description</h3>
        <p>TODO-APP est une application WEB de gestion des tâches personnelles, elle permet
        à l’utiliser des créer des tâches avant de les effectuer et de suivre un planning tracé
        par lui-même.</p> 

        <h3>Fonctionnalités</h3>
        <p>L’application TODO-APP doit permettre de :</p> 
        <ul>
            <li>Créer un compte utilisateur</li>
            <li>S’authentifier</li>
            <li>Créer une nouvelle tâche</li>
            <li>Afficher les tâches en cours dans l’ordre de priorité par date</li>
            <li>Afficher les tâches effectuées</li>
            <li>Supprimer une tâche</li>
            <li>Modifier une tâche</li>
        </ul>
        <a href="<?= site_url('accueil');?>">Back</a>
    </div>
    
</body>
</html>