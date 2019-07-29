
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Zoznam filmov</title>


    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <script   src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script  src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>
<body>

<?php
include "navigacnyPanel.php";
include "Databaza.php";
include "zoznamObrazkov.php";

$zoznam = new zoznamObrazkov();
$databaza = new Databaza();


$pom=0;
$napis = "";
$typ = 0;
// premennú $typ si posielam cez GET pomocou príkazového riadku, keď kliknem v bočnom paneli na na žáner filmu
if($_GET['typ']) {
    $typ = $_GET['typ'];
}

if($typ == 0)
{
    $napis = "Akčné ";
    $pom = 0;
}

else if($typ == 1)
{
    $napis = "Dobrodružné";
    $pom = -1;
}

else if($typ == 2)
{
    $napis = "Romantické";
    $pom = -1;
}

elseif ($typ == 3)
{
    $napis = "Scifi";
    $pom = -2;

}

elseif ($typ == 4)
{
    $napis = "Best of Blu-ray";
    $pom = -3;

}

/*V premennej pole sú uložené jednotlivé filmy z databazy.
 *Jeden index poľa predstavuje jednu inštaciu triedy Film.
 *funkcia nacitanieFilmov() mi vrati všetky zaznamy z tabulky film, čiže jeden riadok v tabuľke je jeden index v poli.
 */
$pole = $databaza->nacitanieFilmov() ;

$index = 0;

?>



<h1 class="text-center" id="nadpisAkcne"><?php echo $napis ?></h1>


<div class="row">
    <div class="col-md-2 column menu" id="menu">
        <ul class="nav nav-pills nav-stacked" >
            <li class="active"><a>Kategorie</a></li>
            <li><a href="zoznamFilmov.php?typ=0"><span class="glyphicon glyphicon-chevron-right"></span> Akčné </a></li>
            <li><a href="zoznamFilmov.php?typ=1"><span class="glyphicon glyphicon-chevron-right"></span> Dobrodružné </a></li>
            <li><a href="zoznamFilmov.php?typ=2"><span class="glyphicon glyphicon-chevron-right"></span> Romantické </a></li>
            <li><a href="zoznamFilmov.php?typ=3"><span class="glyphicon glyphicon-chevron-right"></span> Scifi </a></li>
            <li><a href="zoznamFilmov.php?typ=4"><span class="glyphicon glyphicon-chevron-right"></span> Top movies </a></li>
        </ul>
    </div>
</div>

<div class="container-fluid">
    <div class="row">


        <div class="col-lg-2 ">

            <div class = "bluray" >
                <!-- pomocou premennej $index viem vypočítať index v poli pre konkrétny film
                     následne do premennéj $film uložím konkrétny film na indexe čo predstavuje triedu Film,
                     funkcia daj obrazok mi vráti obrázok, na konkrétnom indexe, ale index už beriem z premennej
                     $film, ktorý predstavuje jeden riadok v tabuľke film a má atribút getObrazok(),
                     ktorý hovorí o tom kde je uložený obrázok filmu z triede zoznamFilmov(index v poli)-->
                <?php $index =($typ*11+$pom);  $film = $pole[$index]?>
                <a href="filmDetail.php?typ=<?php echo ($typ)?>&index=<?php echo $index?>">
                    <?php echo  $zoznam ->dajObrazok($film->getObrazok()) ;?>
                    <a href="filmDetail.php?typ=<?php echo ($typ)?>&index=<?php echo $index?>">
                    <h4><?php echo $film->getNazov()?> </h4> </a>
                </a>
                <p>  <span class="cena"><?php echo "Cena: ".$film->getCena()."€" ;?> </span> </p>

            </div>
        </div>
        <div class="col-lg-2">
            <div class = "bluray"  >

                <?php $index =($typ*11+$pom+1);  $film = $pole[$index]?>
                <a href="filmDetail.php?typ=<?php echo ($typ)?>&index=<?php echo $index?>">
                    <?php echo  $zoznam ->dajObrazok($film->getObrazok()) ;?>
                    <a href="filmDetail.php?typ=<?php echo ($typ)?>&index=<?php echo $index?>">
                        <h4><?php echo $film->getNazov()?> </h4> </a>
                </a>
                <p>  <span class="cena"><?php echo "Cena: ".$film->getCena()."€" ;?> </span> </p>

            </div>
        </div>

        <div class="col-lg-2">
            <div class = "bluray" >
                <?php $index =($typ*11+$pom+2);  $film = $pole[$index]?>
                <a href="filmDetail.php?typ=<?php echo ($typ)?>&index=<?php echo $index?>">
                    <?php echo  $zoznam ->dajObrazok($film->getObrazok()) ;?>
                    <a href="filmDetail.php?typ=<?php echo ($typ)?>&index=<?php echo $index?>">
                        <h4><?php echo $film->getNazov()?> </h4> </a>
                </a>
                <p>  <span class="cena"><?php echo "Cena: ".$film->getCena()."€" ;?> </span> </p>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-lg-2">
            <div class = "bluray" >
                <a href="#">


                    <?php $index =($typ*11+$pom+3);  $film = $pole[$index]?>
                    <a href="filmDetail.php?typ=<?php echo ($typ)?>&index=<?php echo $index?>">
                        <?php echo  $zoznam ->dajObrazok($film->getObrazok()) ;?>
                        <a href="filmDetail.php?typ=<?php echo ($typ)?>&index=<?php echo $index?>">
                            <h4><?php echo $film->getNazov()?> </h4> </a>
                    </a>
                    <p>  <span class="cena"><?php echo "Cena: ".$film->getCena()."€" ;?> </span> </p>

            </div>
        </div>
        <div class="col-lg-2">

            <div class = "bluray"  >


                <a href="#">

                    <?php $index =($typ*11+$pom+4);  $film = $pole[$index]?>
                    <a href="filmDetail.php?typ=<?php echo ($typ)?>&index=<?php echo $index?>">
                        <?php echo  $zoznam ->dajObrazok($film->getObrazok()) ;?>
                        <a href="filmDetail.php?typ=<?php echo ($typ)?>&index=<?php echo $index?>">
                            <h4><?php echo $film->getNazov()?> </h4> </a>
                    </a>
                    <p>  <span class="cena"><?php echo "Cena: ".$film->getCena()."€" ;?> </span> </p>

            </div>
        </div>
        <div class="col-lg-2">
            <div class = "bluray" >

                <?php $index =($typ*11+$pom+5);  $film = $pole[$index]?>
                <a href="filmDetail.php?typ=<?php echo ($typ)?>&index=<?php echo $index?>">
                    <?php echo  $zoznam ->dajObrazok($film->getObrazok()) ;?>
                    <a href="filmDetail.php?typ=<?php echo ($typ)?>&index=<?php echo $index?>">
                        <h4><?php echo $film->getNazov()?> </h4> </a>
                </a>
                <p>  <span class="cena"><?php echo "Cena: ".$film->getCena()."€" ;?> </span> </p>

            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-2">
            <div class = "bluray" >

                <?php $index =($typ*11+$pom+6);  $film = $pole[$index]?>
                <a href="filmDetail.php?typ=<?php echo ($typ)?>&index=<?php echo $index?>">
                    <?php echo  $zoznam ->dajObrazok($film->getObrazok()) ;?>
                    <a href="filmDetail.php?typ=<?php echo ($typ)?>&index=<?php echo $index?>">
                        <h4><?php echo $film->getNazov()?> </h4> </a>
                </a>
                <p>  <span class="cena"><?php echo "Cena: ".$film->getCena()."€" ;?> </span> </p>

        </div>
        </div>

        <div class="col-lg-2">

            <div class = "bluray"  >

                <?php $index =($typ*11+$pom+7);  $film = $pole[$index]?>
                <a href="filmDetail.php?typ=<?php echo ($typ)?>&index=<?php echo $index?>">
                    <?php echo  $zoznam ->dajObrazok($film->getObrazok()) ;?>
                    <a href="filmDetail.php?typ=<?php echo ($typ)?>&index=<?php echo $index?>">
                        <h4><?php echo $film->getNazov()?> </h4> </a>
                </a>
                <p>  <span class="cena"><?php echo "Cena: ".$film->getCena()."€" ;?> </span> </p>

            </div>
        </div>
        <div class="col-lg-2">
            <div class = "bluray" >

                <?php $index =($typ*11+$pom+8);  $film = $pole[$index]?>
                <a href="filmDetail.php?typ=<?php echo ($typ)?>&index=<?php echo $index?>">
                    <?php echo  $zoznam ->dajObrazok($film->getObrazok()) ;?>
                    <a href="filmDetail.php?typ=<?php echo ($typ)?>&index=<?php echo $index?>">
                        <h4><?php echo $film->getNazov()?> </h4> </a>
                </a>
                <p>  <span class="cena"><?php echo "Cena: ".$film->getCena()."€" ;?> </span> </p>


            </div>
        </div>
        </div>




        <div class="row">
            <div class=" col-lg-2">
                <div class = "bluray">

                    <?php $index =($typ*11+$pom+9);  $film = $pole[$index]?>
                    <a href="filmDetail.php?typ=<?php echo ($typ)?>&index=<?php echo $index?>">
                        <?php echo  $zoznam ->dajObrazok($film->getObrazok()) ;?>
                        <a href="filmDetail.php?typ=<?php echo ($typ)?>&index=<?php echo $index?>">
                            <h4><?php echo $film->getNazov()?> </h4> </a>
                    </a>
                    <p>  <span class="cena"><?php echo "Cena: ".$film->getCena()."€" ;?> </span> </p>


                </div>
                <br>
            </div>

            <?php if($typ == 0): ?>
            <div class="col-lg-2">

                <div class = "bluray"  >

                    <?php $index =($typ*11+$pom+10);  $film = $pole[$index]?>
                    <a href="filmDetail.php?typ=<?php echo ($typ)?>&index=<?php echo $index?>">
                        <?php echo  $zoznam ->dajObrazok($film->getObrazok()) ;?>
                        <a href="filmDetail.php?typ=<?php echo ($typ)?>&index=<?php echo $index?>">
                            <h4><?php echo $film->getNazov()?> </h4> </a>
                    </a>
                    <p>  <span class="cena"><?php echo "Cena: ".$film->getCena()."€" ;?> </span> </p>

                </div>
                <br>
            </div>

    </div>
        <?php  endif; ?>



</div>
</div>

</body>



</html>