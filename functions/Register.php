<?php
/**
 * Function pour vérifier l'enregistrement dans la base de donnée.
*/
function verifRegister($pseudo, $passwd, $passwd2, $mail, $mail2, $description)
{
    if(!empty($_POST['pseudo']) AND !empty($_POST['passwd']) AND !empty($_POST['passwd2']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']))
    {   
        if($_POST['passwd2'] == $_POST['passwd'])
        {
            if($_POST['mail2'] == $_POST['mail'])
            {
                $db = dbConnect();
                
                $stmt = $db->prepare("SELECT * FROM users WHERE pseudo = ?");
                $stmt->execute([$pseudo]); 
                $username = $stmt->fetch();
                if ($username)
                {
                    echo message('Le pseudo est déjà enregistré dans notre base de donnée.','warning');
                }
                else 
                {
                    $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
                    $stmt->execute([$mail]); 
                    $email = $stmt->fetch();
                    if ($email)
                    {
                        echo message('L\'adresse e-mail est déjà enregistrée dans notre base de donnée.', 'warning');
                    }
                    else 
                    {
                        $sql = "INSERT INTO users (pseudo, email, passwd, description) VALUES (?,?,?,?)";
                        $stmt= $db->prepare($sql);
                        $stmt->execute([$pseudo, $mail, $passwd, $description]);
                        echo message('Votre compte a bien été enregistré dans notre base de donnée.', 'success');
                        echo redirectTo('0','/index');
                    }
                }
            } 
            else 
            {
                echo message('Les deux adresses e-mails que vous avez notées ne correspondent pas.','warning');
            }
        } 
        else 
        {
            echo message('Les deux mots de passes que vous avez notés ne correspondent pas.', 'warning');
        }
    } 
    else 
    {
        echo message('Les champs du formulaire ne peuvent pas être vide.', 'warning');
    }
}
