<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Best-Blu-ray</title>



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
?>

<?php

if( (isset($_SESSION['ucet']) && ($_SESSION['ucet'])== true ) && (isset($_SESSION['meno'])|| (isset($_SESSION['prehladObjednavok']) && ($_SESSION['prehladObjednavok'] == true)) && (isset($_SESSION['meno'])))):?>

<div class = "container-fullwidth">
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Home</a>
        </div>

        <div class ="collapse navbar-collapse" id ="bs-example-navbar-collapse-1" >

            <ul class = "nav navbar-nav" >

                <li><a href = "kontakt.html"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>  Kontakt</a></li>
            </ul>

            <ul class = "nav navbar-nav" >

                <li><a href = "prehladObjednavok.php"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>  Prehľad objednávok</a></li>
            </ul>

            <ul class = "nav navbar-nav navbar-right" >
                <li><a href = "ucet.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $_SESSION['meno']  ?></a></li>
                <li><a href = "kosik.php"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>  Košík</a></li>
                <li><a href = "odhlasenie.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>  Odhlásenie</a></li>
            </ul>
        </div>
    </nav>
   <?php $_SESSION['ucet']= false;
   $_SESSION['prehladObjednavok'] = false;
   ?>

<?php
elseif(isset($_SESSION['meno'])):
?>


<div class = "container-fullwidth">
         <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Home</a>
        </div>

        <div class ="collapse navbar-collapse" id ="bs-example-navbar-collapse-1" >

            <ul class = "nav navbar-nav" >

          <li><a href = "kontakt.html"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>  Kontakt</a></li>
            </ul>

            <ul class = "nav navbar-nav navbar-right" >
                <li><a href = "ucet.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $_SESSION['meno']  ?></a></li>
                <li><a href = "kosik.php"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>  Košík</a></li>
                <li><a href = "odhlasenie.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>  Odhlásenie</a></li>
            </ul>
        </div>
    </nav>
    </div>



<?php else: ?>
<div class = "container-fullwidth">
         <nav class="navbar navbar-inverse">
            <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Home</a>
        </div>

        <div class ="collapse navbar-collapse" id ="bs-example-navbar-collapse-1" >

            <ul class = "nav navbar-nav" >

          <li><a href = "kontakt.html"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>  Kontakt</a></li>
            </ul>

            <ul class = "nav navbar-nav navbar-right" >

                <li><a href = "registraciaFormular.php"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>  Registrácia</a></li>
                <li><a href = "prihlasenieFormular.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  Prihlásenie</a></li>
            </ul>

        </div>

        </div>
    </nav>

    </div>

</body>
</html>
<?php endif; ?>