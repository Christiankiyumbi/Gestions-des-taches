<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Confirmation</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <style>
        h4  {  color: green;  }
        td { padding: 10px; padding-left: 13px; padding-right: 13px;}
        table {   margin: 10px;  }
        #option {  text-align: left;  margin-left: 25px; }
        
        table
        {
            box-shadow:  0 0 18px #D0D0D0;
            border: 1px solid #d0d0d0;
            margin-top: 7%;
            padding: 20px;
            font-family: 'Arial sans'; 
        }
        caption 
        {
            font-family: 'Arial sans'; 
            color: #1E90FF; 
            font-size: 25px; 
            margin: 15px;
            font-weight: bolder;
        }
        

        th 
        {  
            border: 1px solid #1E90FF;  
            padding: 10px;
            color: #fff;
            background-color:  #1E90FF;
        }
        
    </style>
    <body>
        <h4 color="green">
            <?php echo $this -> session -> login . ' (online)'; ?>
        </h4>
        <center>     
            <table>
                <caption>Voulez-vous supprimer cette tâche ?</caption>
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Etat</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(count($task) > 0)
                        {
                            //foreach($task -> result() as $row)
                            //{
                                $data = $task[0];
                                ?>
                                    <tr>
                                        <td> <?php echo $data -> description; ?> </td>
                                        <td> 
                                            <?php
                                                $etat = $data -> etat;
                                                if($etat == 1)
                                                {
                                                    echo 'fini';
                                                } 
                                                if($etat == 0)
                                                {
                                                    echo 'en cours';
                                                }?> 
                                        </td>
                                        <td> <?php echo $data -> date_creation; ?> </td>
                                    </tr>
                                <?php
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td>
                            <div id="option">
                                <a href="<?= site_url('tache/delete_task/'.$data -> id);?>">Supprimer</a>
                                <a href="<?= site_url('accueil'); ?>">Retour</a>
                            </div>
                        </td>
                    </tr>
                </tfoot>
                <?php  //}
            }
            ?>
            </table>
            
        </center>    
    </body>
</html>

    