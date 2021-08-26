<?php
/** 
 * Function pour rediriger vers une page.
*/
function redirectTo($time, $path)
{
    $url = '<meta http-equiv="refresh" content="' . $time . ';URL=' . $path . '">';
    return $url;
}

/**
 * Function pour afficher un message dans la div alert.
*/
function message($message, $type)
{
    if ($type == "warning" || $type == "danger") {
        $message = '<div class="alert alert-'.$type.'">
            <i class="fas fa-exclamation-triangle"></i> ' . $message . '
        </div>';
    } elseif ($type == "success" || $type == "primary" || $type == "info") {
        $message = '<div class="alert alert-'.$type.'">
            <i class="fas fa-check-circle"></i> ' . $message . '
        </div>';
    }

    return $message;
}

/**
 * Function pour afficher les différents groupes.
*/
function getGrade($data) 
{
    if($data['groupe'] == 0) 
    {
        echo '<div class="badge bg-secondary">Compte non validé</div>';
    }
    elseif($data['groupe'] == 1) 
    {
        echo '<div class="badge bg-primary">Membre</div>';
    }
    elseif($data['groupe'] == 2) 
    {
        echo '<div class="badge bg-warning">Modérateur</div>';
    }
    elseif($data['groupe'] == 3)
    {
        echo '<div class="badge bg-danger">Administrateur</div>';
    }
}