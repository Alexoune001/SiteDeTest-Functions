<?php
/**
 * Function pour vérifier la connexion à son compte.
*/
function verifLogin($pseudo, $passwd)
{
    $db = dbConnect();

    if(!empty($pseudo) AND !empty($passwd)) {
        $requser = $db->prepare("SELECT * FROM users WHERE pseudo = ? AND passwd = ?");
        $requser->execute(array($pseudo, $passwd));
        $userexist = $requser->rowCount();
        if($userexist == 1) {
            $userinfo = $requser->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['pseudo'] = $userinfo['pseudo'];
            echo message('Vous êtes maintenant connecté(e) à votre compte.', 'success');
            echo redirectTo('0','/index');
        }
        else
        {
            echo message('Veuillez vérifier le formulaire de connexion.', 'warning');
        }
    } 
    else
    {
        echo message('Les champs du formulaire ne peuvent pas être vide.', 'warning');
    }
}