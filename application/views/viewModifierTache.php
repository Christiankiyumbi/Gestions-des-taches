<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>todoApp | Modifier</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
        <script src="main.js"></script>
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
            <?php
                if($print_data->num_rows() > 0){
                foreach($print_data->result() as $row)
                {
                    ?>
                        <form action="<?= site_url('validation/validerNouvelleTache'); ?>" method="post">
                            <table class="link">
                                <caption>Nouvelle tâche</caption>
                                <tr>
                                    <td><label for="description">Description</label></td>
                                    <td><input type="text" name="description" value="<?= $row -> descriptionTache; ?>" required <?= form_error('description');?> > </td>
                                </tr>
                                <tr>
                                    <td><label for="heureDebut">Heure début</label></td>
                                    <td><input type="time" name="heureDebut" value="<?= $row -> heureDebut; ?>" required <?= form_error('heureDebut');?> ></td>
                                </tr>
                                <tr>
                                    <td><label for="heureFin">Heure fin</label></td>
                                    <td><input type="time" name="heureFin" value="<?= $row -> heureFin; ?>" id="heureFin" required <?= form_error('heureFin');?> ></td>
                                </tr>
                                <tr>
                                    <td><label for="dateDebut">Date début</label></td>
                                    <td><input type="date" name="dateDebut" value="<?= $row -> dateDebut; ?>" required <?= form_error('dateDebut');?>></td>
                                </tr>
                                <tr>
                                    <td><label for="dateFin">Date fin</label></td>
                                    <td><input type="date" name="dateFin" value="<?= $row -> dateFin; ?>" required <?= form_error('dateFin');?> ></td>
                                </tr>
                                <tr>
                                    <td><label for="commentaire">Commentaire</label></td>
                                    <td><textarea name="commentaire" id="commentaire" cols="30" rows="2" <?= form_error('commentaire');?> > <?= $row -> commentaire; ?> </textarea></td>
                                </tr>
                                <tr>
                                    <td><input type="submit" value="Modifier"></td>
                                    <td><a href="<?= site_url('accueil'); ?>">Retour</a></td>
                                </tr>
                            </table>
                        </form>
                    <?php
                }
            }
            ?>
        </center>
    </body>
</html>