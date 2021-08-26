<?php
/**
 * Function pour vérifier la connexion à son compte.
*/
function verifLogin($pseudo, $passwd)
{
    $db = dbConnect();

    //Si la variable pseudo & passwd existent (isset), ainsi que si elles ne sont pas vide (empty)
    if (isset($pseudo) && !empty($pseudo) && isset($passwd) && !empty($passwd)) {
        $req = $db->prepare('SELECT * FROM users WHERE pseudo = :pseudo');
        $req->execute(array('pseudo' => $pseudo));
        $user = $req->fetch();

        if ($user) {
            if (password_verify($passwd, $user['passwd'])) {
                $_SESSION['id'] = $user['id'];
                $_SESSION['pseudo'] = $user['pseudo'];
                echo message('Vous êtes maintenant connecté(e) à votre compte.', 'success');
                echo redirectTo('0', '/index');
            } else {
                // Le mot de passe est incorrecte 
                echo message('Une erreur s\'est produite lors de la connexion à votre compte, veuillez vérifier les identifiants.', 'warning');
            }
        }else{
            // L'utilisateur n'existe pas
            echo message('Une erreur s\'est produite lors de la connexion à votre compte, veuillez vérifier les identifiants.', 'warning');
        }
    } else {
        // Username ou password vide ou invalide.
        echo message('Une erreur s\'est produite lors de la connexion à votre compte, veuillez vérifier les identifiants.', 'warning');
    }
}