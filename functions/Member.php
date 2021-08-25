<?php
function getMembers()
{
    $db = dbConnect();
    $req = $db->query('SELECT * FROM users');
    return $req;
}

function getMember($id)
{
    $db = dbConnect();
    $req = $db->query('SELECT * FROM users WHERE id = "'.$id.'" ');
    return $req;
}

function getError()
{
    $message = '<div class="alert alert-warning">
        <strong>Erreur:</strong> Le compte n\'existe pas.
    </div>';
    return $message;
}

function verifSessionPseudo()
{
    if(isset($_SESSION['pseudo'])) {
        $message = '<div class="alert alert-info"><i class="fas fa-info-circle"></i> Vous êtes connecté(e) en tant que <strong>'.$_SESSION['pseudo'].'</strong>.</div>';
        return $message;
    } 
}

function getPseudo($getId)
{
    $db = dbConnect();
    $req = $db->query('SELECT * FROM users WHERE id = "'.$getId.'" ');
    return $req;
}