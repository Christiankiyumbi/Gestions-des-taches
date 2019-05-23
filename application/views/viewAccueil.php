<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>todoApp|Accueil</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <style>
        th { border: 1px solid black; padding: 15px; }
        li { display: inline;  padding: 15px;  }
        .hide { border: none;}
        h3  { color: green; }
        a { text-decoration: none; }
        .titleX
        {
            font-family: 'Consolas sans';
            color: #575758;
            font-size: 15px;
        }
    </style>
    <body>
        <h3 color="green">
            <?php echo '['. $this -> session -> login . '] connecté(e)'; ?>
        </h3>
        <center>
            <h1>todoApp</h1>
            <nav>
                <ul>
                    <li><a href="<?= site_url('accueil/nouvelleTache');?>">Nouvelle tâche</a></li>
                    <li><a href="<?= site_url('accueil/deconnexion'); ?>">Déconnexion</a></li>
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
                        <th colspan="4">Options</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="8"> <span class="titleX">Tâches en cours</span> </td>
                    </tr>
                    <?php 
                        $index = NULL;
                        if($fetch_data -> num_rows() > 0){
                            $index = 1;
                            foreach($fetch_data -> result() as $row)
                            {
                                $id = $this -> session -> id;
                                $en_cours = $row -> etat;
                                if($en_cours == false)
                                {
                                    ?>
                                        <tr>
                                            <td> <?php echo $index; ?> </td>
                                            <td> <?php echo $row -> description; ?> </td>
                                            <td> <?php echo 'en cours'; ?> </td>
                                            <td> <?php echo $row -> date_creation; ?> </td>
                                            <td colspan="2"> <a href="<?= site_url('validation/modifierTache/'. $row -> id . '/' . $id);?>">Modifier</a> </td>
                                            <td> <a href="<?= site_url('validation/afficherConfirmation/'. $row -> id . '/' . $id);?>">Supprimer</a></td>
                                            <td> <a href="<?= site_url('validation/marquerCommeFinie/'. $row -> id . '/' . $id);?>">Marquer comme "finie"</a></td>
                                        </tr>
                                    <?php
                                    $index++;
                                }
                            }
                        }
                        else
                        {
                            ?>
                                <tr><td colspan="8">Aucune tâche.</td></tr>
                            <?php
                        }
                    ?>                  
                    <tr>
                        <td colspan="8"><hr></td>
                    </tr>
                    <tr>
                        <td colspan="8"><span class="titleX">Tâches achevées</span></td>
                    </tr>
                    <?php 
                        $index = NULL;
                        if($fetch_data -> num_rows() > 0){
                            $index = 1;
                            foreach($fetch_data -> result() as $row)
                            {
                                $en_cours = $row -> etat;
                                if($en_cours == true)
                                {
                                    ?>
                                        <tr>
                                            <td> <?php echo $index; ?> </td>
                                            <td> <?php echo $row -> description; ?> </td>
                                            <td> <?php echo 'finie'; ?> </td>
                                            <td> <?php echo $row -> date_creation; ?> </td>
                                            <td colspan="2"> <a href="<?= site_url('validation/modifierTache/'.$row -> id);?>">Modifier</a> </td>
                                            <td> <a href="<?= site_url('validation/afficherConfirmation/'.$row -> id);?>">Supprimer</a></td>
                                            <td > <a href="<?= site_url('validation/marquerCommeFinie/'.$row -> id);?>">Marquer comme "en cours"</a></td>
                                        </tr>
                                    <?php
                                    $index++;
                                }
                            }
                        }
                        else
                        {
                            ?>
                                <tr><td colspan="3">Aucune tâche.</td></tr>
                            <?php
                        }
                    ?>           
                    <tr>
                        <td colspan="8"><hr></td>
                    </tr>       
                </tbody>
                <tfoot>
                    <tr>
                        <th class="hide"></th>
                        <th class="hide"></th>
                        <th class="hide"></th>
                        <th class="hide"></th>
                        <th colspan="4">
                            <span>
                                <a href="#">Supprimer toutes les tâches</a>
                            </span> 
                        </th>
                    </tr>
                </tfoot>
            </table>
            
        </center>
    </body>
</html>