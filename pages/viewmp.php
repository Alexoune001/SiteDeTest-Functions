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
                    <div class="card-header">Lire un message privé</div>
                    <div class="card-body">
                        <?php
                        if($_GET['id'] >= 1) {
                            if(isset($_SESSION['id'])) 
                            { 
                                $getId = intval($_GET['id']);
                                $dest = $_SESSION['pseudo'];  
                                $view_mp = getReadMsgPrivate($getId, $dest);
                                if ($view = $view_mp->fetch()) {
                                    if($view['destinataire'] == $_SESSION['pseudo']) { 
                                        sscanf($view['date_envoi'], "%4s-%2s-%2s %2s:%2s:%2s", $an, $mois, $jour, $heure, $min, $sec);  
                        ?>
                                        <a href="/inbox" class="btn btn-sm btn-secondary mb-2"><i class="fas fa-chevron-left"></i> Retour</a>
                                        <div class="row">
                                            <div class="col-md-3 mb-2">
                                                <div class="card bg-dark text-white">
                                                    <div class="card-header text-center fw-bold">
                                                        INFORMATIONS
                                                    </div>
                                                    <div class="card-body bg-dark text-white">
                                                        <strong>Expéditeur</strong> : <br />
                                                            <?= $view['expediteur'] ?> <br />
                                                        <strong>Date d'envoie</strong> : <br />
                                                            <?= $jour,'/', $mois, '/', $an ?> <br />
                                                        <strong>Heure d'envoie</strong> : <br />
                                                            <?= $heure, ':', $min ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-9 mb-2">
                                                <div class="card bg-dark text-white">
                                                    <div class="card-header fw-bold"><?= $view['titre'] ?></div>
                                                    <div class="card-body"><?= $view['message'] ?></div>
                                                </div>
                                            </div>
                                        </div>
                        <?php    
                                    }
                                    else 
                                    {
                                        echo message('Une erreur a été rencontrée.', 'warning'); 
                                    }
                                }
                                else 
                                {
                                    echo message('Une erreur a été rencontrée.', 'warning');
                                }
                            }
                            else
                            {
                                echo message('Vous devez être <a href="/login" class="link">connecté(e)</a> pour contacter le membre.', 'warning');
                            }
                        }
                        else 
                        {
                            echo message('Une erreur s\'est produite.', 'danger');
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