<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Detail filmu</title>


    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script  src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>
<body class="blue">



<?php

include "navigacnyPanel.php";
include "Databaza.php";
include "zoznamObrazkov.php";


$mnozstvoKupa = 0;
$mnozstvoSklad = 0;
$databaza = new Databaza();
$zoznamObrazkov = new zoznamObrazkov();
$film = 0;

$typ =0;
$index = 0;
if(isset($_GET['index'])) {
    $index= $_GET['index'];
}

if(isset($_GET['typ'])) {
    $typ = $_GET['typ'];
}

// do premennej $film si uložím jeden konkretný film, taký kde $index==$obrazok v databáze
//je to z toho dôvodu že v triede zoznam obrázkov mi filmy začínajú od 0, ale id pre každý v databaze je od 1
$film = $databaza ->getFilm($index);
?>


<div class="container-fluid popisFilm ">
    <div class="row">

        <div class ="col-sm-5">
                                                        <!-- to isté ako pri zozname filmov,
                                                              vypýtam si atribút getObrazok, ktorý hovorí
                                                              na ktorý index v zozname obrazkov je priradený tomuto obrázku-->
                <?php  echo $zoznamObrazkov ->dajObrazok($film->getObrazok())  ; ?>
    </div>

        <div class="col-sm-7">
            <div class="nadpisDetail">
          <h1> <?php  echo $film->getNazov();?></h1>
            </div>

            <p><em> Rok: <strong><?php echo $film->getRok()?></strong></em></p>
            <p> <em> Žáner: <strong><?php  echo $film->getZaner() ?></strong> </em></p>
            <p> <em> Cena: <strong><?php  echo $film->getCena() ?> €</strong> </em></p>

            <div class="popisText">
                <p><?php echo $film->getPopis() ?></p>
            </div>

            <p><span style="font-family: Cambria">Na sklade: </span> <mark><strong><?php echo $film->getPocet() ?></strong></mark></p>

            <form method="post" id="formMnozstvo">
                <span style="font-size: 15px  ">Počet kusov: </span><input type="number" name="mnozstvoN" id="pocetKusov" min="1" max="100" >
                <input type="submit" id="submit" name="kosikSubmit" value="Do košíka" >
            </form>

        </div>
    </div>
</div>
<!-- ak nie som prihláseny tak nezobrazím formular pre prianie do košíka -->
<?php if(!isset($_SESSION['meno'])) : ?>
    <script >
        document.getElementById("formMnozstvo").style.display="none";
    </script>
<?php  endif;?>

<?php
if(isset($_POST['kosikSubmit'])) {
    $idU = $databaza->getIdZakaznika($_SESSION['meno']);
    $idF = $databaza->getIdFilmu($film->getNazov());
    $mnozstvoSklad = $databaza->getPocetFilm($idF);


if (empty($_POST['mnozstvoN'])) :
    ?>
    <!-- ak som vo formulari množstvo nič nezadal tak potom, zvýraznim na červeno formulár  -->
    <script type="text/javascript">document.getElementById("pocetKusov").style.border = "1px solid red"</script>
<?php
//ak to čo zadám je väčšie ako počet na sklade, tak to nebude možné
elseif ($mnozstvoSklad - ($_POST['mnozstvoN']) < 0): ?>
    {
    <script> alert("Požadované množstvo nie je skladom.")</script>
    }
<?php

else:
//zistim množtvo, ktoré zadal zákazník do formulára a uložím do premennej
    $mnozstvoKupa = $_POST['mnozstvoN'];
//vložim do košíka, parametre sú id zákazníka, id filmu a množstvo
    $databaza->vlozKosik($idU,$idF,$mnozstvoKupa)

    ?>
   <script>
       alert("Film bol pridaný do košíka.")
    //automaticky ma presmeruje na stránku kde je zoznam filmov

    var strana = "zoznamFilmov.php?typ=";
        strana+=<?php echo $typ  ?>;
        window.location.href = strana;

   </script>
<?php
endif;
}
?>

</body>
</html>