<?php
function verifRegister($pseudo, $passwd, $passwd2, $mail, $mail2)
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
                    echo verifExistPseudo();
                }
                else 
                {
                    $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
                    $stmt->execute([$mail]); 
                    $email = $stmt->fetch();
                    if ($email)
                    {
                        echo verifExistEmail();
                    }
                    else 
                    {
                        $sql = "INSERT INTO users (pseudo, email, passwd) VALUES (?,?,?)";
                        $stmt= $db->prepare($sql);
                        $stmt->execute([$pseudo, $mail, $passwd]);

                        echo validRegister();
                        header('Location: /index');
                        exit;
                    }
                }
            } 
            else 
            {
                echo verifMail();
            }
        } 
        else 
        {
            echo verifPasswd();
        }
    } 
    else 
    {
        echo verifForm();
    }
}

function validRegister()
{
    $message = '<div class="alert alert-success">
        <i class="fas fa-check-circle"></i> Votre compte a bien été enregistré dans notre base de donnée.
    </div>';
    return $message;
}

function verifForm()
{
    $message = '<div class="alert alert-warning">
        <i class="fas fa-exclamation-triangle"></i> <strong>Erreur:</strong> Veuillez vérifier <strong>tous</strong> less champs du formulaire.
    </div>';
    return $message;
}

function verifPasswd()
{
    $message = '<div class="alert alert-warning">
        <i class="fas fa-exclamation-triangle"></i> <strong>Erreur:</strong> Les deux mots de passes que vous avez notés ne correspondent pas.
    </div>';
    return $message;
}

function verifMail()
{
    $message = '<div class="alert alert-warning">
        <i class="fas fa-exclamation-triangle"></i> <strong>Erreur:</strong> Les deux adresses e-mails que vous avez notées ne correspondent pas.
    </div>';
    return $message;
}

function verifExistPseudo()
{
    $message = '<div class="alert alert-warning">
        <i class="fas fa-exclamation-triangle"></i> <strong>Erreur:</strong> Le pseudo est déjà enregistré dans notre base de donnée.
    </div>';
    return $message;
}

function verifExistEmail()
{
    $message = '<div class="alert alert-warning">
        <i class="fas fa-exclamation-triangle"></i> <strong>Erreur:</strong> L\'adresse e-mail est déjà enregistrée dans notre base de donnée.
    </div>';
    return $message;
}
