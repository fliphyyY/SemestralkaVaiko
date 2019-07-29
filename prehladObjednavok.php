<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Prehľad objednávok</title>



    <script language="JavaScript" type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!--  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script> -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php

if(!isset($_SESSION))
{
    session_start();

}
if(isset($_SESSION['prihlaseny']) && $_SESSION['prihlaseny'] == true && isset($_SESSION['meno'])) {
    $_SESSION['prehladObjednavok'] = true;

    include "Databaza.php";
    include "navigacnyPanel.php";

    $sucet = 0;
    $databaza = new Databaza();
    $idZ = $databaza->getIdZakaznika($_SESSION['meno']);
    $objednavka = $databaza->dajObjednavku($idZ);
    $pocet = sizeof($objednavka);

}
?>



<h2 class ="text-center" id="kosikNadpis">Prehľad objednávok</h2>


<br>



<table class="table table-hover" id="objednavkyTabulka">
    <thead>
    <tr>
        <th scope="col">Čislo</th>
        <th scope="col">Názov filmu</th>
        <th scope="col">Typ platby</th>
        <th scope="col">Doručenie</th>
        <th scope="col">Množstvo</th>
        <th scope="col">Dátum</th>
        <th scope="col">Cena</th>




    </tr>
    </thead>
    <tbody>
    <?php  for($i=0; $i<$pocet ; $i++) {
    $sucet +=($objednavka[$i]->getMnozstvoO()*($databaza->getCenaFilm($objednavka[$i]->getFilmO())));
    ?>


    <tr>
        <th scope="row"><?php echo $i+1 ?></th>
        <td><?php echo   $databaza->getMenoFilm($objednavka[$i]->getFilmO())  ?></td>
        <td><?php echo $objednavka[$i]->getPlatbaO() == 0?"Platba kartou" : "Dobierka" ?></td>
        <td><?php echo $objednavka[$i]->getDorucenieO() ==0? "Kurierom" : "Osobny odber" ?></td>
        <td><?php echo $objednavka[$i]->getMnozstvoO() ?></td>
        <td><?php echo $objednavka[$i]->getDenO().".".$objednavka[$i]->getMesiacO().".".$objednavka[$i]->getRokO() ?></td>
        <td><?php echo $celkovaCena =($objednavka[$i]->getMnozstvoO()*($databaza->getCenaFilm($objednavka[$i]->getFilmO())))."€"?></td>



    </tr>

    </tbody>
    <?php } ?>
    <tr>
        <td>Spolu:</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>

        <td>
            <?php echo $sucet." €"?>
        </td>

    </tr>


</table>



</body>
</html>

