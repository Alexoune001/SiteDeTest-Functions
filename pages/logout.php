<?php 
    include($_SERVER['DOCUMENT_ROOT'].'/require.php'); 
    $_SESSION = array();
    session_destroy();
    header("Location: /index");