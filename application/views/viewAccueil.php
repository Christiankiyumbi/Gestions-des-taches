<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>todoApp|Accueil</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <style>
        th 
        {
            color : #fff;
            font-size : 17px;
            background-color: #1E90FF;
            border: 1px solid #1E90FF; 
            padding: 7px; 
            padding-left : 35px;
            padding-right : 35px;
        }
        
        li { display: inline;  padding: 15px;  }
        .hide { border: none;}
        .menu 
        { 
            color: #fff;
            background-color: #1E90FF;
            border: 1px solid #1E90FF;
            text-align: center;
            text-decoration: none; 
            padding: 5px;
            padding-left: 17px;
            padding-right: 17px;
        }
        h4  { color: green; }
        a 
        { 
            text-decoration: none; 
            padding: 5px;
            color: #474748;
            font-weight: bolder;
        }

        caption { color : #575758; padding: 10px;}
        table {  margin-top: 3%; }
        .secondary { font-size : 12px; }
        
        .titleX
        {
            font-family: 'Consolas sans';
            color: #575758;
            font-size: 15px;
        }
    </style>
    <body>
        <h4 color="green">
            <?php echo $this -> session -> login . ' (online)'; ?>
        </h4>
        <center>
            <h1>todoApp</h1>
            <nav>
                <ul>
                    <li><a class="menu" href="<?= site_url('accueil/nouvelle_tache');?>">Nouvelle tâche</a></li>
                    <li><a class="menu" href="<?= site_url('user/deconnexion'); ?>">Déconnexion</a></li>
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
                        if(count($tasks) > 0)
                        {
                            $index = 1;
                            foreach($tasks -> result() as $task)
                            {
                                //$task = $tasks[0];
                                $id = $this -> session -> id;
                                $en_cours = $task -> etat;
                                if($en_cours == false)
                                {
                                    ?>
                                        <tr>
                                            <td> <?php echo $index; ?> </td>
                                            <td> <?php echo $task -> description; ?> </td>
                                            <td> <?php echo 'en cours...'; ?> </td>
                                            <td> <?php echo $task -> date_creation; ?> </td>
                                            <td colspan="2" class="secondary"> <a href="<?= site_url('tache/recover_task/'. $task -> id . '/' . $id);?>">Modifier</a> </td>
                                            <td class="secondary"> <a href="<?= site_url('tache/deleled_task_confirmation/'. $task -> id . '/' . $id);?>">Supprimer</a></td>
                                            <td class="secondary"> <a href="<?= site_url('tache/finished_task/'. $task -> id . '/' . $id);?>">Marquer comme [finie]</a></td>
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
                        if(count($tasks) > 0){
                            $index = 1;
                            foreach($tasks -> result() as $task)
                            {
                                //$task = $tasks[0];
                                $id = $this -> session -> id;
                                $en_cours = $task -> etat;
                                if($en_cours == true)
                                {
                                    ?>
                                        <tr>
                                            <td> <?php echo $index; ?> </td>
                                            <td> <?php echo $task -> description; ?> </td>
                                            <td> <?php echo 'fini'; ?> </td>
                                            <td> <?php echo $task -> date_creation; ?> </td>
                                            <td colspan="2" class="secondary"> <a href="<?= site_url('tache/recover_task/'.$task -> id . '/' . $id);?>">Modifier</a> </td>
                                            <td class="secondary"> <a href="<?= site_url('tache/deleled_task_confirmation/'.$task -> id . '/' . $id);?>">Supprimer</a></td>
                                            <td class="secondary"> <a href="<?= site_url('tache/task_in_progress/'.$task -> id . '/' . $id);?>">Marquer comme [en cours]</a></td>
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
                </tfoot>
            </table>
            
        </center>
    </body>
</html>