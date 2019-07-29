<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="utf-8">
    <title>Best-Blu-ray</title>


    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <script language="JavaScript" type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script language="JavaScript" type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script language="JavaScript" type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"> </script>
    <script language="JavaScript" type="text/javascript" src="prihlasenieAjax.js"></script>

<body class="blue">
<?php

include "navigacnyPanel.php"
?>

<div class="container" id="registraciaFormular">
    <h2 class="formular-registracia-napis text-center">Prihláste sa</h2>

    <form id = "loginForm" class="formular-registracia" method="post" action="prihlasenie.php">
        <div class="form-group">
            <label for="formGroupExampleInput">Zadajte Váš login</label>
            <input type="text" class="form-control" name="loginP" id="loginp" placeholder="login">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Vaše heslo</label>
            <input type="password" class="form-control" name="passwordP" id="passwordp" placeholder="password">
        </div>

        <br>

        <input type="submit" name="potvrdPrihlasFormular"  value="Prihlásiť" id="prihlasenie" class="btn btn-lg btn btn-success btn-block">

    </form>
</div>



</body>
</html>
