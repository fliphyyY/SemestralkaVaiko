<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="utf-8">
    <title>Registrácia</title>


    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <script language="JavaScript" type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script  type="text/javascript" language="JavaScript" src="registraciaAjax.js"></script>

</head>
<body class="blue">
<?php

include "navigacnyPanel.php"
?>


<div class="container" id="registraciaFormular">
    <h2 class="formular-registracia-napis text-center">Prosím vyplňte registračný formulár</h2>

    <form id = "loginForm" class="formular-registracia" method="post" action="registrovanie.php">

    <div class="form-group">
        <label for="formGroupExampleInput2">Login</label>
        <input type="text" class="form-control" name="loginR" id="loginr" placeholder="login">
    </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Vaše heslo</label>
            <input type="password" class="form-control" name="passwordR" id="passwordr" placeholder="heslo">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Váš email</label>
            <input type="text" class="form-control" name="emailR" id="emailr" placeholder="@">
        </div>

    <div class="form-group">
        <label for="formGroupExampleInput2">Meno</label>
        <input type="text" class="form-control" name="menoR" id="menor" placeholder="Meno">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Priezvisko</label>
        <input type="text" class="form-control" name="priezviskoR" id="priezviskor" placeholder="Priezvisko">
    </div>
    <br>

    <input type="submit" name="potvrdRegFormular"  value="Registrovať" id="registruj" class="btn btn-lg btn btn-success btn-block">

</form>
</div>


</body>
</html>