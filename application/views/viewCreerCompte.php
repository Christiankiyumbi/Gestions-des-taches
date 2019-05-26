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
        span  {  font-size: 13px;  }
        label {  font-weight: bolder; color: #474748; font-family: 'Arial sans'; }
        caption 
        {
            font-family: 'Arial sans'; 
            color: #1E90FF; 
            font-size: 25px; 
            margin: 15px;
            font-weight: bolder;
        }

        #login, #pwd, #confirmation
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

        td {padding : 3px}
        
        table
        {
            box-shadow:  0 0 18px #D0D0D0;
            border: 1px solid #d0d0d0;
            margin-top: 10%;
            padding: 30px;
            font-family: 'Arial sans'; 
        }
    </style>
    <body>
        <center>
            <form action="<?= site_url('user/new_user'); ?>" method="post">
            
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
                        <td><input type="text" name="pwd" id="pwd"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><span><?= form_error('pwd'); ?></span></td>
                    </tr>
                    <tr>
                        <td><label for="confirmation">Confirmation :</label></td>
                        <td><input type="text" name="confirmation" id="confirmation"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><span><?= form_error('confirmation'); ?></span></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Valider" id="btnValider"></td>
                    </tr>
                    <tr>
                        <td><a href="<?= site_url('accueil/authentification'); ?>">Retour</a></td>
                    </tr>
                </table>
            </form>
        </center>
    </body>
</html>