<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Účet</title>



    <script language="JavaScript" type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!--  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script> -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php

if(!isset($_SESSION))
{
    session_start();

}
$_SESSION['ucet'] = true;

if(isset($_SESSION['prihlaseny']) && $_SESSION['prihlaseny'] == true && isset($_SESSION['meno'])){
    include "Databaza.php";
include "navigacnyPanel.php";
    $databaza = new Databaza();
    $zakaznik = $databaza->dajUdajeZakaznik($_SESSION['meno']);
}

?>




    <h2 class="formular-vypis text-center">Informácie o zákazníkovi</h2>

<div class="text-center" id="vypisInfoZakaznik">

    <p><em> Login: <strong><?php if(isset($_SESSION['prihlaseny']) && $_SESSION['prihlaseny'] == true ){
        echo $_SESSION['meno'];
                }
                else
                {
                    echo "Fattal error";
                }
                                    ?></strong></em></p>
    <p><em> Meno: <strong><?php echo $zakaznik->getMeno()?></strong></em></p>
    <p> <em> Priezvisko: <strong><?php  echo $zakaznik->getPriezvisko() ?></strong> </em></p>
    <p> <em> email: <strong><?php  echo $zakaznik->getEmail()?> </strong> </em></p>
    <p> <em> Mesto: <strong><?php  echo $zakaznik->getMesto()?> </strong> </em></p>
    <p> <em> Čislo domu: <strong><?php  echo $zakaznik->getCisloDomu()?> </strong> </em></p>
    <p> <em> PSČ: <strong><?php  echo $zakaznik->getPsc()?> </strong> </em></p>
    <p> <em> telefon: <strong><?php  echo $zakaznik->getTelefon()?> </strong> </em></p>


</div>

</div>

</body>
</html>
