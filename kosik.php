<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Košík</title>



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


    include "navigacnyPanel.php";
    include "Databaza.php";

    $databaza = new Databaza();
    $id = $databaza->getIdZakaznika($_SESSION['meno']);


    //zoberiem všetky položky v košiku pre konkretného zákazníka podla id zakazníka, bude to pole
    // jeden záznam, je jeden riadok v tabulke košik a je to jenda inštacia triedy košík
    $poleKosik = $databaza->getKosik($id);
    $pocet = sizeof($poleKosik);
    $sucet = 0;



?>

    <h2 class ="text-center" id="kosikNadpis"> Obsah košíka</h2>


<br>



<table class="table table-hover" id="kosikTabulka">
    <thead>
    <tr>
        <th scope="col">Číslo</th>
        <th scope="col">Názov</th>
        <th scope="col">Množstvo</th>
        <th scope="col">Cena jedného filmu</th>
        <th scope="col">Celková cena</th>




    </tr>
    </thead>
    <tbody>
    <?php  for($i = 0; $i<$pocet ; $i++) //vypišem v cykle velkosť pola == počet záznamov
  { ?>

    <tr>
        <th scope="row"><?php echo $i+1 ?></th>
        <td><?php echo $databaza->getMenoFilm($poleKosik[$i]->getFilmK());?></td>
        <td><?php echo $poleKosik[$i]->getPocetK() ?></td>
        <td><?php echo $databaza->getCenaFilm($poleKosik[$i]->getFilmK())."€" ?></td>
        <td><?php echo $celkovaCena =($poleKosik[$i]->getPocetK()*$databaza->getCenaFilm($poleKosik[$i]->getFilmK()))."€";$sucet+= ($poleKosik[$i]->getPocetK()*($databaza->getCenaFilm($poleKosik[$i]->getFilmK())));?></td>

        <td><form method="post">
                <!--tlačidlu vymazať je potrebné dať konkretné čislo aby bolo jasné , ktoré som zmačkol, posielam to cez post -->
                <input type="submit" name="cislo<?php echo $i; ?>" value="Vymazať">
            </form>
            </td>

    </tr>

    </tbody>
<?php } ?>
    <tr>
        <td>Spolu:</td>
        <td></td>
        <td></td>
        <td></td>
        <td>
            <?php echo $sucet." €"    ?>
        </td>
        <td></td>
    </tr>


</table>


<a id="link" href="objednavkaFormular.php">Objednať</a>
<!-- ak je košík prázdny tak sa nedá objednať a nezobrazí sa mi link objednať-->
<?php if(!$databaza->jeKosikPrazdny($id))  { ?>
    <script >
        document.getElementById("link").style.visibility="hidden"</script>
<?php  } ?>



<?php
/*Mám tu foreach pretože počet tlačidiel na vymazanie závisi od prvkov v poli v košíku,
 *keď nejaké zmačknem tak ja neviem, ktoré som zmačkol , čiže musím zistiť , ktoré som zmačkol
 */
  foreach ($_POST as $item => $value)

    if(substr($item,0,5) == "cislo") { // táto podmienka identifikuje tlačidlo, musí sa začinať na "cislo"
        $ind = substr($item,5);//zistim si číslo, čiže index, tlačidla ktoré som zmačkol
        $databaza->vymazKosik($poleKosik[$ind]->getIdK());//kedže trieda košík ma index filmu v databáze, tak si zistim index a podľa
                                                            // toho mažem
     ;?>
        <script >window.location="/semestralka/kosik.php" </script>
<?php }



?>


</body>
</html>
