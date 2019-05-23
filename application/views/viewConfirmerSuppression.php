<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Confirmation</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <style>
        .link{
            margin-top: 15%;
            margin-left: 20%;
            margin-right: 20%;
            padding: 15px;

        }
        h3  {  color: green;  }
        th {  border: 1px solid black;  padding: 7px;   }
        table {   margin: 10px;  font-weight: bolder;  }
        #option {  text-align: left;  margin-left: 25px; }
    </style>
    <body>
        <h3 color="green">
            <?php echo '['. $this -> session -> login . '] connecté(e)'; ?>
        </h3>
        <center>
        <fieldset class="link">
            <legend>Suppression de tâche</legend>
            <label for="question">Voulez-vous supprimer cette tâche ?</label>
                                        
            <table>
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Etat</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                         if($fetch_data->num_rows() > 0){
                            foreach($fetch_data->result() as $row)
                            {
                                ?>
                                    <tr>
                                        <td> <?php echo $row -> description; ?> </td>
                                        <td> <?php echo $row -> etat; ?> </td>
                                        <td> <?php echo $row -> date_creation; ?> </td>
                                    </tr>
                                <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
            <div id="option">
                <a href="<?= site_url('validation/supprimerTache/'.$row -> id);?>">Supprimer</a>
             <a href="<?= site_url('accueil'); ?>">Retour</a>
            </div>
        </fieldset>
        </center>    
    </body>
</html>

    