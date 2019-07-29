
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Nová objednávka</title>


    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <script language="JavaScript" type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!--  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script> -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>
<body class="blue">



<?php
include "navigacnyPanel.php";
include "Databaza.php";

$databaza = new Databaza();
$zakaznik = $databaza->dajUdajeZakaznik($_SESSION['meno']); // vráti mi jeden riadok z tabuľky zákazík, podľa mena
                                                            //$_SESSION['meno'] je v podstate login, login je jedinečný
?>


<div class="container" id="objednavkaFormular">
    <h2 class="formular-objednavka-napis text-center">Prosím vyplňte objednávkový formulár</h2>

    <form id = "loginForm" class="formular-objednavka" method="post">

        <div class="form-group">
            <label for="formGroupExampleInput2">Meno</label>
            <input type="text" class="form-control" name="menoO" id="menoo"  disabled placeholder="<?php echo $zakaznik->getMeno();?>">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Priezvisko</label>
            <input type="text" class="form-control" name="priezviskoO" id="priezviskoo"  disabled placeholder="<?php echo $zakaznik->getPriezvisko();?>">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">email</label>
            <input type="text" class="form-control" name="emailO" id="emailo"  value="<?php echo $zakaznik->getEmail();?>">
        </div>

        <div class="form-group">
            <label for="formGroupExampleInput2">Mesto</label>
            <input type="text" class="form-control" name="mestoO" id="mestoo" placeholder="Mesto" value="<?php echo $zakaznik->getMesto();?>">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">PSČ</label>
            <input type="text" class="form-control" name="pscO" id="psco" placeholder="PSČ" value="<?php echo $zakaznik->getPsc();?>">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Číslo Domu</label>
            <input type="text" class="form-control" name="cisloDomuO" id="cisloDomuo" placeholder="Číslo domu" value="<?php echo $zakaznik->getCisloDomu();?>">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Telefón</label>
            <input type="text" class="form-control" name="telefonO" id="telefono" placeholder="Telefón" value="<?php echo $zakaznik->getTelefon();?>">
        </div>
        <label class="form-check-label">
        <input type="checkbox" name="karta" class="form-check-input">
        Platba kartou
        </label>
        <label class="form-check-label">
            <input type="checkbox" name="dobierka" class="form-check-input">
            Platba dobierkou
        </label>
        <label class="form-check-label">
            <input type="checkbox" name="kurier" class="form-check-input">
            Kurier
        </label>
        <label class="form-check-label">
            <input type="checkbox" name="odber" class="form-check-input">
            Osobný odber
        </label>
        <input type="submit" name="FormO"  value="Záväzne objednať" id="objednaj" class="btn btn-lg btn btn-success btn-block">

    </form>
</div>
<!--Tento formulár služi na vytvorenie objednávky  -->
<?php

if(isset($_POST['FormO'])) {
$idZ= $databaza->getIdZakaznika($_SESSION['meno']);
$poleKosik = $databaza->getKosik($idZ);// vráti mi každý záznam v košíku podľa id zákazníka


        $rok = date("Y");
        $mesiac = date("m");
        $den = date("d");

//kontrola
 if(empty($_POST['emailO']) ) :  ?>

        <script type="text/javascript">document.getElementById("mestoo").style.border="1px solid red"

        </script>

<?php

elseif($_POST['mestoO'] == "neuvedené" || empty($_POST['mestoO'])) :  ?>

    <script type="text/javascript">document.getElementById("mestoo").style.border="1px solid red"

    </script>

<?php

elseif($_POST['pscO'] == "00000" || empty($_POST['pscO'])) :  ?>

    <script type="text/javascript">document.getElementById("psco").style.border="1px solid red"  </script>

<?php

elseif($_POST['cisloDomuO'] == "0" || empty($_POST['cisloDomuO'])) :  ?>

    <script type="text/javascript">document.getElementById("cisloDomuo").style.border="1px solid red"  </script>

<?php



elseif($_POST['telefonO'] =="0000000000" || empty($_POST['telefonO'])) :  ?>

    <script type="text/javascript">document.getElementById("telefono").style.border="1px solid red"
        alert("Nezadali ste telefónne číslo.");
    </script>

<?php


elseif(!isset($_POST['karta']) && !isset($_POST['dobierka']) || isset($_POST['karta']) && isset($_POST['dobierka']) ) :
?>
    <script type="text/javascript">
        alert("Nesprávne zvolený spôsob platby.");
    </script>
<?php

elseif(!isset($_POST['kurier']) && !isset($_POST['odber']) || isset($_POST['kurier']) && isset($_POST['odber'])) :
?>
    <script type="text/javascript">
        alert("Nesprávne zvolený spôsob doručenia.");
    </script>
<?php
elseif(!is_numeric($_POST['cisloDomuO'])) : ?>
    <script>alert("Nesprávne zadané číslo domu.")</script>
<?php
elseif(!is_numeric($_POST['pscO'])) : ?>
    <script>alert("Nesprávne zadané PSČ.")</script>
<?php
elseif(!is_numeric($_POST['telefonO'])) : ?>
    <script>alert("Nesprávne zadané telefónne číslo.")</script>
<?php
    else:

foreach ($poleKosik as $prvok) {// pre každý prvok v košíku vytvorím jednu objednávku, koľko
    $platba = 0;                // riadkov v košíku, tak toľko  "objednávok"
    $dorucenie =0;
    if(isset($_POST['karta'])) {
        $platba = 0;
    }
    if(isset($_POST['dobierka'])) {
        $platba = 1;
    }
    if(isset($_POST['kurier'])) {
        $dorucenie = 0;
    }
    if(isset($_POST['odber'])) {
        $dorucenie = 1;
    }

    $idF = $prvok->getFilmK();
    $databaza->vytvorObjednavku($idZ,$idF,$platba,$dorucenie,$prvok->getPocetK() ,$den,$mesiac,$rok);//vytvorenie objednávky
    $databaza->updateMesto($_POST['mestoO'],$_SESSION['meno']);
    $databaza->updateCisloDomu($_POST['cisloDomuO'],$_SESSION['meno']);
    $databaza->updateTelefon($_POST['telefonO'],$_SESSION['meno']);
    $databaza->updatePsc($_POST['pscO'],$_SESSION['meno']);// update
    $databaza->updateEmail($_POST['emailO'],$_SESSION['meno']);
    $databaza->vymazKosikOdhlasenie($idZ); // vždy mažem košik, aj pri vytvorení objednávky aj po odhlásení
    $mnozstvoPoObj = $databaza->getPocetFilm($idF) - $prvok->getPocetK() ; //uložím si do premennej počet filmov
    $databaza->updatePocetFilm($idF,$mnozstvoPoObj); // nastavím


}
?>
        <script type="text/javascript">
        alert("Objednávka bola úspešne zaevidovaná.");

        var strana = "index.php";

        window.location.href = strana;

    </script>
<?php

endif;

}


?>


</body>


</html>

