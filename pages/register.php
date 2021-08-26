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
                    <div class="card-header">Formulaire d'inscription</div>
                    <div class="card-body">
                        <?php 
                            if(isset($_POST['validate'])) {	
                                $pseudo = htmlspecialchars($_POST['pseudo']);
                                $mail = htmlspecialchars($_POST['mail']);
                                $mail2 = htmlspecialchars($_POST['mail2']);
                                $passwd = password_hash($_POST['passwd'], PASSWORD_ARGON2I);
                                $passwd2 = password_hash($_POST['passwd2'], PASSWORD_ARGON2I);
                                verifRegister($pseudo, $passwd, $passwd2, $mail, $mail2);
                            }
                        ?>
                        <form method="POST">
                            <input type="text" name="pseudo" class="form-control bg-dark text-white mb-2" placeholder="Votre pseudo" />
                            <input type="password" name="passwd" class="form-control bg-dark text-white mb-2" minlength="3" placeholder="Votre mot de passe" />
                            <input type="password" name="passwd2" class="form-control bg-dark text-white mb-2" minlenght="3" placeholder="Confirmer votre mot de passe" />
                            <input type="email" name="mail" class="form-control bg-dark text-white mb-2" placeholder="Votre adresse e-mail" />
                            <input type="email" name="mail2" class="form-control bg-dark text-white mb-2" placeholder="Confirmer votre adresse e-mail" />
                            <input type="submit" name="validate" class="btn btn-primary btn-sm" value="Valider mon inscription" />
                        </form>
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