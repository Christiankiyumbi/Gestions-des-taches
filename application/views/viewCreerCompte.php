<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>todoApp|Inscription</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <style>
        body {  background-color: #fff;  } 
        label   {   font-weight: bolder;      }
        span  {  font-size: 13px;  }
        table
        {
            border: 1px solid #373738;
            margin-top: 15%;
            padding: 20px;
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
                    </tr>
                    <tr>
                        <td colspan="2"><span><?= form_error('login'); ?></span></td>
                    </tr>
                    <tr>
                        <td><label for="pwd">Password :</label></td>
                        <td><input type="text" name="pwd"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><span><?= form_error('pwd'); ?></span></td>
                    </tr>
                    <tr>
                        <td><label for="confirmation">Confirmation :</label></td>
                        <td><input type="text" name="confirmation"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><span><?= form_error('confirmation'); ?></span></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Valider"></td>
                    </tr>
                    <tr>
                        <td><a href="<?= site_url('accueil/authentification'); ?>">Retour</a></td>
                    </tr>
                </table>
            </form>
        </center>
    </body>
</html>