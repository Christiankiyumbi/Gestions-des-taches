<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>todoApp|Nouvelle tâche</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <style>

        span
        {
            font-size: 13px;

        }

        label
        {
            font-weight: bolder;
        }

        table
        {
            border: 1px solid black;
            padding: 20px;
        }

        td
        {
            padding: 7px;
        }

        .link
        {
            margin: 10%;
        }
    </style>
    <body>
        <center>
            <form action="<?= site_url('validation/validerNouvelleTache'); ?>" method="post">
                <table class="link">
                    <caption>Nouvelle tâche</caption>
                    <tr>
                        <td><label for="description">Description:</label></td>
                        <td><input type="text" name="description" required> </td>
                    </tr>
                    <tr>
                        <td colspan="2"><span><?= form_error('description'); ?></span></td>
                    </tr>
                    <tr>
                        <td><label for="etat">Etat:</label></td>
                        <td>
                            <select name="etat">
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
                        <td><input type="submit" value="Créer"></td>
                        <td><a href="<?= site_url('accueil'); ?>">Retour</a></td>
                    </tr>
                </table>
            </form>
        </center>
    </body>
</html>