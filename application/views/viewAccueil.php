<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>todoApp | Accueil</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <style>
        th{
            border: 1px solid black;
            padding: 15px;
        }
        
        li{
            display: inline;
            padding: 15px;
        }

        a{
            text-decoration: none;
        }

    </style>
    <body>
        <center>
            <h1>todoApp</h1>
            <nav>
                <ul>
                    <li><a href="<?= site_url('accueil/nouvelleTache');?>">Nouvelle tâche</a></li>
                    <li><a href="#">Tâches effectué(es)</a></li>
                    <li><a href="#">Tâches en cours</a></li>
                    <li><a href="<?= site_url('accueil/commencer'); ?>">Fermer</a></li>
                </ul>
            </nav>
            <table>
                <caption>Liste des tâches</caption>
                <thead>
                    <tr>
                        <th>n°</th>
                        <th>Description</th>
                        <th>Etat</th>
                        <th>Date création</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $index = NULL;
                        if($fetch_data->num_rows() > 0){
                            $index = 1;
                            foreach($fetch_data->result() as $row)
                            {
                                
                                ?>
                                    <tr>
                                        <td> <?php echo $index; ?> </td>
                                        <td> <?php echo $row -> description; ?> </td>
                                        <td> <?php echo $row -> etat; ?> </td>
                                        <td> <?php echo $row -> date_creation; ?> </td>
                                        <td> <a href="<?= site_url('accueil/modifierTache/'.$row -> id);?>">Modifier</a> </td>
                                        <td> <a href="<?= site_url('accueil/afficherConfirmation/'.$row -> id);?>">Supprimer</a></td>
                                    </tr>
                                <?php
                                $index++;
                            }
                        }else{
                            ?>
                                <tr><td colspan="3">Aucune tâche.</td></tr>
                            <?php
                        }
                    ?>
                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </center>
    </body>
</html>