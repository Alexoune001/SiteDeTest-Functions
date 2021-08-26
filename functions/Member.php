<?php
/**
 * Function pour récupérer l'ensemble de la liste des membres.
*/
function getMembers()
{
    $db = dbConnect();
    $req = $db->query('SELECT * FROM users');
    return $req;
}

/**
 * Function pour récupérer un membre par rapport à son ID.
*/
function getMember($id)
{
    $db = dbConnect();
    $req = $db->query('SELECT * FROM users WHERE id = "'.$id.'" ');
    return $req;
}

/**
 * Function pour récupérer le pseudo d'un membre par rapport à son ID.
*/
function getPseudo($getId)
{
    $db = dbConnect();
    $req = $db->query('SELECT pseudo FROM users WHERE id = "'.$getId.'" ');
    return $req;
}
