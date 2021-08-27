<?php
function getSignalMember($id_u, $pseudo, $raison)
{
    if(!empty($_POST['pseudo']) AND !empty($_POST['raison']))
    {
        $db = dbConnect();

        $sql = "INSERT INTO signal_u (id_u, pseudo, raison) VALUES (?,?,?)";
        $stmt= $db->prepare($sql);
        $stmt->execute([$id_u, $pseudo, $raison]);
    }
    else 
    {
        echo message('Les champs du formulaire ne peuvent pas être vide.', 'warning');
    }
}