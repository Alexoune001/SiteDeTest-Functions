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
            echo validLogin();
            echo redirectIndex();
        }
        else
        {
            echo verifPseudoPasswd();
        }
    } 
    else
    {
        echo verifEmpty();
    }
}

function verifPseudoPasswd()
{
    $message = '<div class="alert alert-warning">
        <i class="fas fa-exclamation-triangle"></i> <strong>Erreur:</strong> Veuillez vérifier le formulaire de connexion.
    </div>';
    return $message;
}

function verifEmpty()
{
    $message = '<div class="alert alert-warning">
        <i class="fas fa-exclamation-triangle"></i> <strong>Erreur:</strong> Les champs du formulaire ne peuvent pas être vide.
    </div>';
    return $message;
}

function validLogin()
{
    $message = '<div class="alert alert-success">
        <i class="fas fa-check-circle"></i> Vous êtes maintenant connecté(e) à votre compte.
    </div>';
    return $message;
}

function redirectIndex() 
{
    $redirect = '<meta http-equiv="refresh" content="0;URL=/index">';
    return $redirect;
}