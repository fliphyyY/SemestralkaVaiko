
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Best Blu-ray</title>


    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


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
include "navigacnyPanel.php"
?>

<h1 class="text-center" id="nadpisEshop">Best Blu-ray</h1>
    <div class="row">
        <div class="col-md-2 column menu" id="menu">
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a>Kategorie</a></li>
                <li><a href="zoznamFilmov.php?typ=0"><span class="glyphicon glyphicon-chevron-right"></span> Akčné </a></li>
                <li><a href="zoznamFilmov.php?typ=1"><span class="glyphicon glyphicon-chevron-right"></span> Dobrodružné </a></li>
                <li><a href="zoznamFilmov.php?typ=2"><span class="glyphicon glyphicon-chevron-right"></span> Romantické </a></li>
                <li><a href="zoznamFilmov.php?typ=3"><span class="glyphicon glyphicon-chevron-right"></span> Scifi </a></li>
                <li><a href="zoznamFilmov.php?typ=4"><span class="glyphicon glyphicon-chevron-right"></span> Top movies </a></li>
            </ul>
        </div>

        <div class ="obrazky">
        <div class="text-center">
        <div class="col-sm-4">
            <div class="card-block">
                <h4 class="card-title">Akčné</h4>
            </div >
            <img src="akcne/1.jpg" id="obrAkcne" alt="1"  />

        </div>
        </div>
        <div class="text-center">
        <div class="col-sm-4">
            <div class="card-block">
                <h4 class="card-title">Scifi</h4>
            </div>
            <img src="scifi/1.jpg" id="obrScifi" alt="1" />
        </div>
        </div>
        <div class="text-center">
        <div class="col-sm-4">
            <div class="card-block">
                <h4 class="card-title">Dobrodružné</h4>
            </div>
            <img src="dobrodruzne/1.jpg" id="obrDobro" alt="1" />

        </div>
        </div>

    </div>




</div>


<h4 class="text-center" id="dolnyPopis">Najlepší obchod s Blu-ray na internete</h4>

 <script >
        var akcne= ["akcne/10.jpg","akcne/9.jpg","akcne/3.jpg","akcne/1.jpg","akcne/4.jpg"];
        var scifi = ["scifi/7.jpg","scifi/8.jpg","scifi/6.jpg","scifi/2.jpg","scifi/8.jpg"];
        var dobrodruzne= ["dobrodruzne/3.jpg","dobrodruzne/10.jpg","dobrodruzne/6.jpg","dobrodruzne/7.jpg","dobrodruzne/2.jpg"];
        var pocet = 5;
        var terazAkcne = 0;
        var terazScifi= 0;
        var terazDobrodruzne = 0;
        function zmenObrazok()
        {
                        if (terazAkcne < pocet - 1) {
                            terazAkcne++;
                        } else {
                            terazAkcne = 0;
                        }
                        if (terazScifi < pocet - 1) {
                            terazScifi++;
                        } else {
                            terazScifi = 0;
                        }


                        if (terazDobrodruzne < pocet - 1) {
                            terazDobrodruzne++;
                        } else {
                            terazDobrodruzne = 0;
                        }

            document.getElementById("obrAkcne").src = akcne[terazAkcne];
            document.getElementById("obrScifi").src = scifi[terazScifi];
            document.getElementById("obrDobro").src = dobrodruzne[terazDobrodruzne];

          return false;
        }

        setInterval("zmenObrazok()",3000);



    </script>


</body>
</html>