<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>todoApp|Nouvelle tâche</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <style>
        span {  font-size: 13px;  }
        label  {     font-weight: bolder; }
        h4   {  color: green;   }
        td {   padding: 7px;  }
        .link  {  margin: 7%;  }

        #etat, #date_creation, #description
        {
            padding: 5px;
            border-radius: 3px;
            border:  1px solid #D0D0D0;
        }

        caption 
        {
            font-family: 'Arial sans'; 
            color: #1E90FF; 
            font-size: 25px; 
            margin: 15px;
            font-weight: bolder;
        }

        #btnCreer
        {
            text-align: center;
            border: 1px solid #1E90FF;
            color: #fff;
            padding: 5px;
            padding-left: 17px;
            padding-right: 17px;
            background-color: #1E90FF;
        }
        
        table
        {
            box-shadow:  0 0 18px #D0D0D0;
            border: 1px solid #d0d0d0;
            margin-top: 10%;
            padding: 20px;
            font-family: 'Arial sans'; 
        }
        
    </style>
    <body>
        <h4>
            <?php echo '['. $this -> session -> login . '] connecté(e)'; ?>
        </h4>
        <center>
            <form action="<?= site_url('tache/create_task'); ?>" method="post">
                <table class="link">
                    <caption>Nouvelle tâche</caption>
                    <tr>
                        <td><label for="description">Description:</label></td>
                        <td><input type="text" name="description" id="description" required> </td>
                    </tr>
                    <tr>
                        <td colspan="2"><span><?= form_error('description'); ?></span></td>
                    </tr>
                    <tr>
                        <td><label for="etat">Etat:</label></td>
                        <td>
                            <select name="etat" id="etat">
                                <option value="0">En cours</option>
                                <option value="1">Finie</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="date_creation">Date création:</label></td>
                        <td><input type="date" name="date_creation" id="date_creation" required ></td>
                    </tr>
                    <tr>
                        <td><input type="submit" id="btnCreer" value="Créer"></td>
                        <td><a href="<?= site_url('accueil'); ?>">Retour</a></td>
                    </tr>
                </table>
            </form>
        </center>
    </body>
</html>