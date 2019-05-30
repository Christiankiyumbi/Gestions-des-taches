<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>todoApp|Modifier</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <style>
        *{font-family:"Arial";}
        span  {  font-size: 13px;   } 
        td {  padding: 7px;  }
        .link {  margin: 7%;  }
        h4   {  color: green;  }
        
        table
        {
            box-shadow:  0 0 18px #D0D0D0;
            border: 1px solid #d0d0d0;
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

        #description, #etat, #date_creation, #id
        {
            padding: 5px;
            border-radius: 3px;
            border:  1px solid #D0D0D0;
        }

        #btnValider
        {
            text-align: center;
            border: 1px solid #1E90FF;
            color: #fff;
            padding: 5px;
            padding-left: 17px;
            padding-right: 17px;
            background-color: #1E90FF;
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
            <?php
                if(count($task) > 0)
                {
                    $data = $task[0];
                    ?>
                        <form action="<?= site_url('tache/update_task'); ?>" method="post">
                            <table class="link">
                                <caption>Modifer tâche</caption>
                                <tr>
                                    <td><label for="description">Description :</label></td>
                                    <td><input type="text" name="description" id="description" value="<?= $data-> description; ?>" required > </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><span><?= form_error('description'); ?></span></td>
                                </tr>
                                <tr>
                                    <td><label for="etat">Etat actuel :</label></td>
                                    <td>
                                        <select name="etat" id="etat" value="<?= $data -> etat; ?>">
                                            <option value="0">En cours</option>
                                            <option value="1">Finie</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="date_creation">Date création :</label></td>
                                    <td><input type="date" name="date_creation" value="<?= $data -> date_creation; ?>" id="date_creation" required ></td>
                                </tr>
                                <tr>
                                    <td><input type="text" id="id" name="id" value="<?= $data -> id?>"></label></td>
                                </tr>
                               
                                <tr>
                                    <td><input type="submit" value="Valider" id="btnValider" autofocus></td>
                                    <td><a href="<?= site_url('accueil'); ?>">Retour</a></td>
                                </tr>
                            </table>
                        </form>
                    <?php
                }
                else
                {
                    ?>
                    <form action="<?= site_url('tache/update_task'); ?>" method="post">
                            <table class="link">
                                <caption>Modifer tâche</caption>
                                <tr>
                                    <td>Error</label></td>
                                </tr>
                            </table>
                        </form>
                    <?php
                }
            ?>
        </center>
    </body>
</html>