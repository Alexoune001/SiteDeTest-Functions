<?php include('require.php'); ?>
<!doctype html>
<html lang="en">
    <head>
        <?php include('includes/top.php'); ?>
    </head>
    <body class="d-flex flex-column h-100">

        <header>
            <?php include('includes/navbar.php'); ?>
        </header>        

        <main class="flex-shrink-0 mb-2">
            <div class="container">
                <div class="card bg-dark text-white">
                    <div class="card-header">Liste des membres</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-white">
                                <thead class="text-center fw-bold">
                                    <tr>
                                        <td>#</td>
                                        <td>Pseudo</td>
                                        <td>Groupe</td>
                                        <td>Date d'inscription</td>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php
                                        $members = getMembers();
                                        while($data = $members->fetch())
                                        {
                                            sscanf($data['date_register'], "%4s-%2s-%2s %2s:%2s:%2s", $an, $mois, $jour, $heure, $min, $sec); 
                                    ?>
                                            <tr>
                                                <td><?= $data['id'] ?></td>
                                                <td><a href="profil-<?= $data['id'] ?>" class="link"><?= $data['pseudo'] ?></a></td>
                                                <td><?= getGrade($data); ?></td>
                                                <td><?= $jour,'/',$mois,'/',$an; ?></td>
                                            </tr>
                                    <?php
                                        }
                                        $members->closeCursor();
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer class="footer mt-auto py-3 bg-dark">
            <?php include('includes/footer.php'); ?>
        </footer>
        
        <?php include('includes/js.php'); ?>
    </body>
</html>