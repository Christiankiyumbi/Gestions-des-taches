<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Confirmation</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
        <script src="main.js"></script>
    </head>
    <style>
        .link{
            margin-top: 15%;
            margin-left: 20%;
            margin-right: 20%;
            padding: 15px;

        }
        th{
            border: 1px solid black;
            padding: 7px;
        }
        table{
            margin: 10px;
            font-weight: bolder;
        }
        #option{
            text-align: left;
            margin-left: 25px;
        }
    </style>
    <body>
        <center>
        <fieldset class="link">
            <legend>Suppression de tâche</legend>
            <label for="question">Voulez-vous supprimer cette tâche ?</label>
                                        
            <table>
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Heure début</th>
                        <th>Heure fin</th>
                        <th>Date début</th>
                        <th>Date fin</th>
                        <th>Commentaire</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                         if($print_data->num_rows() > 0){
                            foreach($print_data->result() as $row)
                            {
                                ?>
                                    <tr>
                                        <td> <?php echo $row -> descriptionTache; ?> </td>
                                        <td> <?php echo $row -> heureDebut; ?> </td>
                                        <td> <?php echo $row -> heureFin; ?> </td>
                                        <td> <?php echo $row -> dateDebut; ?> </td>
                                        <td> <?php echo $row -> dateFin; ?> </td>
                                        <td> <?php echo $row -> commentaire; ?> </td>
                                    </tr>
                                <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
            <div id="option">
                <a href="<?= site_url('accueil/supprimerTache/'.$row -> idTache);?>">Supprimer</a>
             <a href="<?= site_url('accueil'); ?>">Retour</a>
            </div>
        </fieldset>
        </center>    
    </body>
</html>

    