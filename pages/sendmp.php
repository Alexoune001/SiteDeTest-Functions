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
                    <div class="card-header">Envoyer un message privé</div>
                    <div class="card-body">
                        <?php
                        if($_GET['id'] >= 1) {
                            if(isset($_SESSION['id'])) 
                            { 
                                if(isset($_POST['validate']))
                                {
                                    $exp = $_SESSION['pseudo'];
                                    $dest = $_POST['destinataire'];
                                    $titre = $_POST['titre'];
                                    $message = html_entity_decode($_POST['message']);
                                    getSendMsgPrivate($exp, $dest, $titre, $message);
                                }

                                $getId = intval($_GET['id']);
                                $user0 = getPseudo($getId);
                                $pseudo = $user0->fetch();
                                if(!empty($pseudo)){
                                    if($pseudo['pseudo'] != $_SESSION['pseudo']) { 
                        ?>
                                    <form method="POST">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            <input type="text" name="destinataire" class="form-control bg-dark text-white" value="<?= $pseudo['pseudo'] ?>" readonly />
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i class="fas fa-comment-dots"></i></span>
                                            <input type="text" name="titre" class="form-control bg-dark text-white" />
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i class="fas fa-paragraph"></i></span>
                                            <textarea class="form-control bg-dark text-white" name="message" col="8" rows="6"></textarea>                               
                                        </div>
                                        <input type="submit" name="validate" class="btn btn-primary btn-sm" value="Envoyer le message privé" />                            
                                    </form>
                        <?php
                                    }
                                    else 
                                    {
                                        echo message('Vous ne pouvez pas envoyer un message privé à vous même.', 'warning'); 
                                    }
                                }
                                else 
                                {
                                    echo message('Le compte n\'existe pas.', 'danger');
                                }
                            }
                            else 
                            {
                                echo message('Vous devez être <a href="/login" class="link">connecté(e)</a> pour contacter le membre.', 'warning');
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