<?php include($_SERVER['DOCUMENT_ROOT'].'/require.php'); ?>
<!doctype html>
<html lang="en">
    <head>
        <?php include($_SERVER['DOCUMENT_ROOT'].'/includes/top.php'); ?>
    </head>
    <body class="d-flex flex-column h-100">

        <header>
            <?php include($_SERVER['DOCUMENT_ROOT'].'/includes/navbar.php'); ?>
        </header>        

        <main class="flex-shrink-0 mb-2">
            <div class="container">
                <div class="card bg-dark text-white">
                    <div class="card-header">
                        <?php 
                            $getId = intval($_GET['id']);
                            $user0 = getPseudo($getId);
                            $pseudo = $user0->fetch();
                        ?>
                            <div class="float-start">
                            <?php
                                if(isset($_SESSION['pseudo']))
                                {
                                    if($pseudo['pseudo'] == $_SESSION['pseudo']) { 
                                        echo 'Voir mon profil ('.$_SESSION['pseudo'].')';
                                    }
                                    else
                                    {
                                        echo 'Voir le profil de '.$pseudo['pseudo'];
                                    }
                                } 
                                else
                                {
                                    echo 'Voir le profil de '.$pseudo['pseudo'];
                                }
                            ?>
                            </div>
                            <div class="float-end">
                                <?php 
                                if(isset($_SESSION['pseudo'])) {
                                    if($pseudo['pseudo'] != $_SESSION['pseudo']) { 
                                ?>
                                        <a class="btn btn-primary btn-sm" href="/addfriend-<?= $getId; ?>" title="Demander en ami(e)"><i class="fas fa-user-plus"></i></a>
                                        <a class="btn btn-info btn-sm" href="/sendmp" title="Envoyer un message privé"><i class="fas fa-envelope"></i></a>
                                        <a class="btn btn-warning btn-sm" href="/signal-<?= $getId; ?>" title="Signaler ce membre"><i class="fas fa-exclamation-triangle"></i></a>
                                <?php 
                                    } 
                                }
                                ?>
                            </div>
                    </div>
                    <div class="card-body">
                        <?php 
                        if($_GET['id'] >= 1) {
                            $id = intval($_GET['id']);
                            $member = getMember($id);
                            while($data = $member->fetch()) {
                                sscanf($data['date_register'], "%4s-%2s-%2s %2s:%2s:%2s", $an, $mois, $jour, $heure, $min, $sec);  
                        ?>
                                <div class="table-responsive" style="margin-top:10px;">
                                    <table class="table table-bordered text-white">
                                        <tbody>
                                            <tr>
                                                <td style="width:20px;"><i class="far fa-user-circle"></i> <strong>Pseudo</strong></td>
                                                <td style="width:20px;"><?= $data['pseudo']; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width:20px;"><i class="fas fa-at"></i> <strong>Adresse e-mail</strong></td>
                                                <td style="width:20px;">Non visible</td>
                                            </tr>
                                            <tr>
                                                <td style="width:20px;"><i class="fas fa-user-graduate"></i> <strong>Grade</strong></td>
                                                <td style="width:20px;"><?= getGrade($data); ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width:20px;"><i class="fas fa-calendar"></i> <strong>Date d'inscription</strong></td>
                                                <td style="width:20px;"><?= $jour,'/',$mois,'/',$an; ?></td>
                                            </tr>    
                                            <tr>
                                                <td style="width:20px;"><i class="fas fa-sticky-note"></i> <strong>Description</strong></td>
                                                <td style="width:20px;"><?= $data['description'] ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                        <?php
                            }
                        }
                        else 
                        {
                            echo message('Le compte n\'existe pas.', 'danger');
                        }
                        ?>
                    </div>
                </div>
            </div>
        </main>

        <footer class="footer mt-auto py-3 bg-dark">
            <?php include($_SERVER['DOCUMENT_ROOT'].'/includes/footer.php'); ?>
        </footer>
        
        <?php include($_SERVER['DOCUMENT_ROOT'].'/includes/js.php'); ?>
    </body>
</html>