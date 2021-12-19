<?php
/**
	* Function pour  mettre à jour son compte membre.
*/
function editMail($oldmail, $newmail, $userid)
{
    $db = dbConnect();
    if($newmail != $oldmail)
    {
        $sql = "UPDATE users SET email = ? WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$newmail, $userid]);
        echo message('Votre profil a bien été mis à jour.', 'success');
        echo redirectTo('0','/index');
    }
    else 
    {
        echo message('Les deux adresses e-mails que vous avez notées ne peuvent pas correspondre.', 'warning');
    }
}

/**
    * Function pour mettre à jour sa description.
*/
function editDescription($description, $userid)
{
    $db = dbConnect();
    $sql = "UPDATE users SET description = ? WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$description, $userid]);
    echo message('Votre profil a bien été mis à jour.', 'success');
    echo redirectTo('0','/index');
}

/**
	* Function pour mettre à jour son mot de passe.
*/
function editPassword($old_password, $new_password, $userid)
{
    $db = dbConnect();

    if($new_password != $old_password) 
    {
        if (isset($userid) && isset($old_password))
        {
            $req = $db->prepare('SELECT * FROM users WHERE id = :userid');
            $req->execute(array('userid' => $userid));
            $user = $req->fetch();

            if (password_verify($old_password, $user['passwd'])) 
            {
                $sql = "UPDATE users SET passwd = ? WHERE id = ?";
                $stmt = $db->prepare($sql);
                $stmt->execute([$new_password, $userid]);
                echo message('Votre profil a bien été mis à jour.', 'success');
                echo redirectTo('0','/index');
            }
        }
    }
    else 
    {
        echo message('Les deux mot de passes que vous avez notés ne peuvent pas correspondre.', 'warning');
    }    
}