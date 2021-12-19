<?php
/**
 * Function pour  mettre à jour son compte membre.
*/
function editProfil($oldmail, $newmail, $description, $userid)
{
    $db = dbConnect();
    if($newmail != $oldmail)
    {
        $sql = "UPDATE users SET email = ?, description = ? WHERE id = ?";
        $stmt= $db->prepare($sql);
        $stmt->execute([$newmail, $description, $userid]);
        echo message('Votre profil a bien été mis à jour.', 'success');
        echo redirectTo('0','/index');
    }
    else 
    {
        echo message('Les deux adresses e-mails que vous avez notées ne peuvent pas correspondre.','warning');
    }
}