<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>todoApp | Nouvelle tâche</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
        
    </head>
    <style>
        td{
            padding: 7px;
        }
        .link{
            margin: 10%;
        }
    </style>
    <body>
        <center>
            <form action="<?= site_url('validation/validerNouvelleTache'); ?>" method="post">
                <table class="link">
                    <caption>Nouvelle tâche</caption>
                    <tr>
                        <td><label for="description">Description</label></td>
                        <td><input type="text" name="description" required <?= form_error('description');?> > </td>
                    </tr>
                    <tr>
                        <td><label for="heureDebut">Heure début</label></td>
                        <td><input type="time" name="heureDebut" required <?= form_error('heureDebut');?> ></td>
                    </tr>
                    <tr>
                        <td><label for="heureFin">Heure fin</label></td>
                        <td><input type="time" name="heureFin" id="heureFin" required <?= form_error('heureFin');?> ></td>
                    </tr>
                    <tr>
                        <td><label for="dateDebut">Date début</label></td>
                        <td><input type="date" name="dateDebut" required <?= form_error('dateDebut');?>></td>
                    </tr>
                    <tr>
                        <td><label for="dateFin">Date fin</label></td>
                        <td><input type="date" name="dateFin" required <?= form_error('dateFin');?> ></td>
                    </tr>
                    <tr>
                        <td><label for="commentaire">Commentaire</label></td>
                        <td><textarea name="commentaire" id="commentaire" cols="30" rows="2" <?= form_error('commentaire');?> ></textarea></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Créer"></td>
                        <td><a href="<?= site_url('accueil'); ?>">Retour</a></td>
                    </tr>
                </table>
            </form>
        </center>
    </body>
</html>