<?php
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
            echo redirectIndex();
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

function message($message, $type)
{
    if ($type == "warning" || $type == "danger") {
        $message = '<div class="alert alert-'.$type.'">
            <i class="fas fa-exclamation-triangle"></i> <strong>Erreur:</strong> ' . $message . '
        </div>';
    } elseif ($type == "success" || $type == "primary" || $type == "info") {
        $message = '<div class="alert alert-'.$type.'">
            <i class="fas fa-check-circle"></i>' . $message . '
        </div>';
    }

    return $message;
}

function redirectIndex() 
{
    $redirect = '<meta http-equiv="refresh" content="0;URL=/index">';
    return $redirect;
}