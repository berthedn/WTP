<?php

if(!isset($_SESSION))
    {
        session_start();
    }
$_SESSION = array();


//SIGN OUT
session_destroy();
header("Location: ../index.php");
?>
