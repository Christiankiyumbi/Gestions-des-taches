<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>todoApp|Inscription</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    
    <style>
        
        body
        {
            background-color: #fff;
        }

        table
        {
            margin-top: 15%;
            padding: 10px;
        }

    </style>
    
    <body>
        <center>
            <form action="<?= site_url('validation/nouvelUtilisateur'); ?>" method="post">
            
                <table>
                <caption>Inscription</caption>
                    <tr>
                        <td><label for="login">Login :</label></td>
                        <td><input type="text" name="login" id="login" value="<?= set_value('login')?>"></td>
                        <td><?= form_error('login'); ?></td>
                    </tr>
                    <tr>
                        <td><label for="pwd">Password :</label></td>
                        <td><input type="text" name="pwd"></td>
                        <td><?= form_error('pwd'); ?></td>
                    </tr>
                    <tr>
                        <td><label for="confirmation">Confirmation :</label></td>
                        <td><input type="text" name="confirmation"></td>
                        <td><?= form_error('confirmation'); ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Valider"></td>
                    </tr>
                    <tr>
                        <td><a href="<?= site_url('accueil/commencer'); ?>">Retour</a></td>
                    </tr>
                </table>
            </form>
        </center>
    </body>
</html>