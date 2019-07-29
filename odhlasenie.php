<?php
include "Databaza.php";
$databaza = new Databaza();
session_start();


if (isset($_SESSION['prihlaseny']) ) {
    // last request was more than 30 minutes ago

    $id = $databaza->getIdZakaznika($_SESSION['meno']);

    $databaza->vymazKosikOdhlasenie($id);
    $_SESSION['prihlaseny'] = false;

    session_unset();     // unset $_SESSION variable for the run-time
    session_destroy();   // destroy session data in storage


    header('Location: index.php');
exit();
}
