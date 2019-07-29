<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Best Blu-ray</title>


    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script language="JavaScript" type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script type="text/javascript" src="prihlasenieAjax.js"></script>

<body>


<?php

include "navigacnyPanel.php";
include "Databaza.php";

$databaza = new Databaza();


$login = $_POST['loginP'];
$heslo = $_POST['passwordP'];
$uzivatel =  $databaza->vyhladaj($login,$heslo);
if($uzivatel != null) :
$_SESSION['prihlaseny'] = true;
$_SESSION['timestamp'] = time();
$_SESSION['meno'] = $login;


?>
<script >
window.location= "index.php";
</script>

<?php

else :?>
<script >
    window.location="prihlasenieFormular.php";
    alert("Zadali ste nesprávne údaje.")
</script>

<?php
endif;
?>



</body>
</html>


