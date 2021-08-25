<?php
function getSearch($requete)
{
    $db = dbConnect();
    $req = $db->prepare("SELECT * FROM users WHERE pseudo LIKE ?");
    $req->execute(array('%' . $requete . '%'));
    $nb_resultats = $req->rowCount();
    
    if($nb_resultats != 0){
        echo 'Nous avons trouvés ';
        if($nb_resultats > 1)
        { 
            echo '<strong>'.$nb_resultats.' résultats</strong> pour votre recherche : '.$_POST['requete']; 
        } 
        else 
        { 
            echo '<strong>'.$nb_resultats. ' résultat</strong> pour votre recherche : '.$_POST['requete']; 
        }
        while($donnees = $req->fetch()) 
        {
            echo '<ul><li>';
                echo '<a href="profil-'.$donnees['id'].'" class="link">'.$donnees['pseudo'].'</a> - ';
                if($donnees['groupe'] == 0) {
                    echo '<span class="badge bg-secondary">Compte non activé</span>';
                }elseif($donnees['groupe'] == 1) {
                    echo '<span class="badge bg-primary">Membre</span>';
                }elseif($donnees['groupe'] == 2) {
                    echo '<span class="badge bg-warning">Modérateur</span>';
                }elseif($donnees['groupe'] == 3) {
                    echo '<span class="badge bg-danger">Administrateur</span>';
                }
            echo '</li></ul>';
        }
    }
        
}