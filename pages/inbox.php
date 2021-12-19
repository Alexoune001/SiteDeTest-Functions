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
                    <div class="card-header">Boîte de réception</div>
                    <div class="card-body">
                        <?php
                        if(isset($_SESSION['id'])) 
                        { 
                        ?>
                            <div class="table-responsive" style="margin-top:10px;">
                                <table class="table table-bordered table-dark table-hover">
                                    <thead class="text-center">
                                        <tr>
                                            <th scope="col">Expéditeur</th>
                                            <th scope="col">Titre</th>
                                            <th scope="col">Reçu le</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $dest = $_SESSION['pseudo'];
                                        $inbox = getInbox($dest);
                                        while($data = $inbox->fetch()) {
                                            sscanf($data['date_envoi'], "%4s-%2s-%2s %2s:%2s:%2s", $an, $mois, $jour, $heure, $min, $sec);  
                                    ?>
                                        <tr>
                                            <td class="text-center" style="width:200px;"><?= $data['expediteur'] ?></td>
                                            <td><?= $data['titre'] ?></td>
                                            <td class="text-center" style="width:100px;"><?= $jour,'/',$mois,'/',$an; ?>
                                            <td class="text-center" style="width:25px;"><a class="btn btn-sm btn-primary" href="/viewmp-<?= $data['id'] ?>"><i class="fas fa-eye"></i></a></td>
                                        </tr>
                                    <?php } ?>    
                                    </tbody>
                                </table>
                            </div>
                        <?php
                        }
                        else 
                        {
                            echo message('Vous devez être <a href="/login" class="link">connecté(e)</a> pour voir cette page.', 'warning');
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