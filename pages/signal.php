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
                    <div class="card-header">Signaler un membre</div>
                    <div class="card-body">
                        <?php
                            echo message('Le signalement doit avoir une raison <strong>valable</strong> afin que notre équipe puisse agir correctement sur le membre.', 'info');
                        ?>
                        <form method="POST">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-exclamation-triangle"></i></span>
                                <input type="text" name="pseudo" class="form-control bg-dark text-white" placeholder="Entrez le pseudo du membre à signaler" />
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-paragraph"></i></span>
                                <textarea class="form-control bg-dark text-white" name="raison" rows="4">Veuillez entrer votre raison du signalement.</textarea>
                            </div>
                            <input type="submit" name="validate" class="btn btn-primary btn-sm" value="Signaler le membre" />                            
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