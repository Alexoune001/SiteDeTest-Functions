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
                    <div class="card-header">Se connecter à l'espace membre</div>
                    <div class="card-body">
                        <?php 
                            if(isset($_POST['validate']))
                            {
                                $pseudo = htmlspecialchars($_POST['pseudo']);
                                $passwd = sha1($_POST['passwd']);
                                verifLogin($pseudo, $passwd);
                            }
                        ?>
                        <form method="POST">
                            <input type="text" name="pseudo" class="form-control bg-dark text-white mb-2" placeholder="Entrez votre pseudo" />
                            <input type="password" name="passwd" class="form-control bg-dark text-white mb-2" placeholder="Entrez votre mot de passe" />
                            <input type="submit" name="validate" class="btn btn-primary btn-sm" value="Se connecter" />
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