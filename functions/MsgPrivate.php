<?php
/**
    * Function pour lister tous ses messages privés. 
*/
function getInbox($dest)
{
    $db = dbConnect();
    $req = $db->query('SELECT * FROM mp WHERE destinataire = "'.$dest.'" ');
    return $req;
}

/**
    * Function pour envoyer un message privé à un membre. 
*/
function getSendMsgPrivate($exp, $dest, $titre, $message)
{
    $db = dbConnect();
    if(!empty($titre) && !empty($message))
    {
        $sql = "INSERT INTO mp(expediteur, destinataire, titre, message) VALUES (?,?,?,?)";
        $stmt= $db->prepare($sql);
        $stmt->execute([$exp, $dest, $titre, $message]);

        echo message('Votre message a bien été envoyé au membre <strong>'.$dest.'</strong>.', 'success');
        echo redirectTo('1','/index'); 
    }
    else 
    {
        echo message('Votre message n\'a pas pu être envoyé à <strong>'.$dest.'</strong>, veuillez vérifier le formulaire.', 'warning');
    }
}

/**
    * Function pour lire un message privé.
*/
function getReadMsgPrivate($getId, $dest)
{
    $db = dbConnect();
    $req = $db->query('SELECT * FROM mp WHERE id = "'.$getId.'" AND destinataire = "'.$dest.'" ');
    return $req;
}