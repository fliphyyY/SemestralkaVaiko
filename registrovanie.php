<?php
include "Databaza.php";

$databaza = new Databaza();

$login = $_POST['loginR'];
$heslo = $_POST['passwordR'];
$email = $_POST['emailR'];
$meno = $_POST['menoR'];
$priezvisko = $_POST['priezviskoR'];



if($databaza->skontrolujUzivatel($login,$email) == "OK") {
    $databaza->pridajUzivatela($login,$heslo,$email,$meno,$priezvisko);
    ?>


    <script > window.location="/semestralka/index.php";
        alert("Registracia úspešná.");</script>
    <?php
}
else if ($databaza->skontrolujUzivatel($login,$email) == "loginObsadeny")
{
    ?>
    <script> window.location="registraciaFormular.php";
        alert("Login je už obsadený.");</script>
<?php
}
else if ($databaza->skontrolujUzivatel($login,$email) == "emailObsadeny")
{
    ?>
    <script> window.location="registraciaFormular.php";
        alert("Email je už obsadený.");</script>
    <?php
}

else if ($databaza->skontrolujUzivatel($login,$email) == "oboje")
{
    ?>
    <script> window.location="registraciaFormular.php";
        alert("Login aj email už niekto používa.");</script>
    <?php
}
?>



