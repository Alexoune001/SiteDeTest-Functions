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

                    <div class="card-header">Editer mon profil</div>
                    <div class="card-body">
                        <?php 
                            if(isset($_SESSION['id'])) 
                            {
                        ?>
                                <form method="POST">
                                <?php 
                                    $id = intval($_SESSION['id']);
                                    $member = getMember($id);
                                    $data = $member->fetch();
                                ?>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                                        <input type="text" name="oldmail" class="form-control bg-dark text-white" value="<?= $data['email'] ?>" />
                                    </div>

                                    <div class="input-group mb-3">
                                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                                        <input type="text" name="newmail" class="form-control bg-dark text-white" placeholder="Entrez votre nouvelle adresse e-mail" />
                                    </div>

                                    <div class="input-group mb-3">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                        <input type="text" name="oldpass" class="form-control bg-dark text-white" placeholder="Entrez votre mot de passe actuel" />
                                    </div>

                                    <div class="input-group mb-3">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                        <input type="text" name="newpass" class="form-control bg-dark text-white" placeholder="Entrez votre nouveau mot de passe" />
                                    </div>

                                    <div class="input-group mb-3">
                                        <span class="input-group-text"><i class="fas fa-sticky-note"></i></span>
                                        <textarea name="description" class="form-control bg-dark text-white" rows="4"><?= html_entity_decode($data['description']); ?></textarea>
                                    </div>

                                    <input type="submit" name="validate" class="btn btn-primary btn-sm" value="Valider les modifications" />
                                </form>
                        <?php
                            } 
                            else
                            {
                                echo message('Vous n\'êtes pas connecté(e).', 'warning');
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