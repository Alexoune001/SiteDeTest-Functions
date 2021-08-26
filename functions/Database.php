<?php
/**
 * Function pour se connecter à la base de donnée.
*/
function dbConnect()
{
    try
    {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $db = new PDO('mysql:host=localhost;dbname=esp', 'root', '', $pdo_options);
        return $db;
    }
    catch(Exception $e) 
    {
        die('Erreur: '.$e->getMessage());
    }
}