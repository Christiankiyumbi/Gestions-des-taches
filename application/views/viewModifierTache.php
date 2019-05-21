<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>todoApp|Modifier</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <style>
        
        td{
            padding: 7px;
        }
        
        .link{
            margin: 10%;
        }

        table
        {
            border: 1px solid #373737;
            padding: 15px;
        }
    </style>
    <body>
    <center>
            <?php
                if($fetch_data->num_rows() > 0){
                foreach($fetch_data->result() as $row)
                {
                    ?>
                        <form action="<?= site_url('validation/validerNouvelleTache'); ?>" method="post">
                            <table class="link">
                                <caption>Modifer tâche</caption>
                                <tr>
                                    <td><label for="description">Description :</label></td>
                                    <td><input type="text" name="description" value="<?= $row -> description; ?>" required <?= form_error('description');?> > </td>
                                </tr>
                                <tr>
                                    <td><label for="etat">Etat actuel :</label></td>
                                    <!--<td><input type="text" name="etat" value="<?= $row -> etat; ?>" required  ></td>-->
                                    <td>
                                        <select name="etat" id="etat">
                                            <option value="0">En cours</option>
                                            <option value="1">Finie</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="date_creation">Date création :</label></td>
                                    <td><input type="date" name="date_creation" value="<?= $row -> date_creation; ?>" id="date_creation" required ></td>
                                </tr>
                               
                                <tr>
                                    <td><input type="submit" value="Valider"></td>
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