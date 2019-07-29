<?php


include "Film.php";
include "Zakaznik.php";
include "Objednavka.php";
include "kosikTrieda.php";
class Databaza
{

    public $server ;
    public $connection;
    public $login ;
    public $hesloMd5 ;


    public function __construct()
    {
        $this->server = "localhost";
        $login = "root";
        $heslo = "";
        $this->connection = mysqli_connect("localhost","root","","bluray");
        $this->connection->set_charset("utf8");
    }

    public function pridajUzivatela($login,$heslo,$email,$meno,$priezvisko) {

        $hesloMd5 = md5($heslo);
        $sql = "INSERT INTO zakaznik (login,heslo, email, meno, priezvisko, mesto, cislo_domu, psc, telefon) VALUES ('$login','$hesloMd5','$email','$meno','$priezvisko','neuvedené','0','00000','0000000000')";
        mysqli_query($this->connection,$sql);

    }




    public function skontrolujUzivatel($login, $email)
    {

       $sqlL = "select login from zakaznik where login = '$login' " ;
       $sqlE = "select email from zakaznik where email = '$email' " ;

        $queryL = $this->connection->query($sqlL);
        $queryE = $this->connection->query($sqlE);

        if((mysqli_num_rows($queryL) != 0 )||(mysqli_num_rows($queryE) != 0))
        {
            if((mysqli_num_rows($queryL) != 0) && (mysqli_num_rows($queryE) != 0))
            {
                return $oznam = "oboje" ;
            }
            if (mysqli_num_rows($queryL) != 0)
        {
            return $oznam = "loginObsadeny" ;
        }
            if (mysqli_num_rows($queryE) != 0)
            {
                return $oznam = "emailObsadeny" ;
            }
        }
        else
        {
            return $oznam = "OK" ;
        }
    }



    public function dajUdajeZakaznik($login) {
        $sql = "select * from zakaznik where login = '$login'";
        $query = $this->connection->query($sql);
        $existuje = (mysqli_num_rows($query) != 0)?TRUE:FALSE;
        if($existuje) {
            $row = $query->fetch_assoc();
            $zakaznik = new Zakaznik($row['login'],$row['meno'],$row['priezvisko'],$row['email'],$row['heslo'],$row['mesto'],$row['cislo_domu'],$row['psc'],$row['telefon']);

            return $zakaznik;

        }
        return null;

    }


    public function getMenoFilm($idF)
    {
       $sql = "select nazov from film where id = '$idF'";
        $vysledok = $this->connection->query($sql);
        $row = $vysledok->fetch_assoc();
        return $row['nazov'];
    }




    public function vyhladaj($login,$heslo) {
        $hesloMd5 = md5($heslo);
        $sql = "select * from zakaznik where login = '$login' and heslo = '$hesloMd5'";
        $query = $this->connection->query($sql);
        $existuje = (mysqli_num_rows($query) != 0) ? TRUE:FALSE;
        if($existuje) {
            $row = $query->fetch_assoc();
            $osoba = new Zakaznik($row['login'],$row['heslo'],$row['email'],$row['meno'],$row['priezvisko'],$row['mesto'],$row['cislo_domu'],$row['psc'],$row['telefon']);
            return $osoba;

        }
        return null;
    }



    public function nacitanieFilmov() {


        $pole = array();
        $pocitadlo = 0;
        $sql = "Select * from film ";
        $vysledok =$this->connection->query($sql);
        while($row = $vysledok->fetch_assoc() ) {
            $film = new Film($row['zaner'],$row['nazov'],$row['cena'],$row['rok'], $row['popis'],$row['pocet'],$row['obrazok']);
            $pole[$pocitadlo] = $film;
            ++$pocitadlo;
        }
        return $pole;
    }


        public function getFilm($index)
        {
            $film = null;
            $sql = "select * from film where obrazok = '$index'";
            $query = $this->connection->query($sql);
            $row = $query->fetch_assoc();
            $film = new Film($row['zaner'],$row['nazov'],$row['cena'],$row['rok'], $row['popis'],$row['pocet'],$row['obrazok']);
            return $film;
        }

    public function getIdZakaznika($login) {
        $sql = "select id from zakaznik where login='$login'";
        $vysledok = $this->connection->query($sql);
        $row = $vysledok->fetch_assoc();
        return $row['id'];
    }

    public function getIdFilmu($nazov)
    {
        $sql = "select id from film where nazov='$nazov'";
        $vysledok = $this->connection->query($sql);
        $row = $vysledok->fetch_assoc();
        return $row['id'];
    }

    public function getPocetFilm($idF)
    {
        $sql = "select pocet from film where id ='$idF'";
        $vysledok = $this->connection->query($sql);
        $row = $vysledok->fetch_assoc();
        return $row['pocet'];
    }


    public function vlozKosik($idU,$idF,$mnozstvoKupa) {
        $sql = "insert into kosik (zakaznik,film,pocet) values ('$idU','$idF','$mnozstvoKupa')";
        $this->connection->query($sql);
    }


    public function getKosik($id)
    {
        $sql = "select * from kosik where zakaznik = '$id'";
        $vysledok = $this->connection->query($sql);
        $pole = array();
        $pocitadlo = 0;
        while ($row = $vysledok->fetch_assoc()) {
            $kosik = new kosikTrieda($row['id'],$row['zakaznik'],$row['film'],$row['pocet']);
            $pole[$pocitadlo] = $kosik;
            $pocitadlo++;
        }
        return $pole;

    }


    public function vymazKosik($id) {
        $sql = "delete from kosik where id ='$id'";
        $this->connection->query($sql);
    }

    public function jeKosikPrazdny($id) {
        $sql = "select * from kosik where zakaznik = '$id' ";
        $query = $this->connection->query($sql);
        $existuje = (mysqli_num_rows($query) != 0)?TRUE:FALSE;
        if($existuje) {
            return true;
        }
        else
        {
            return false;
        }

    }

    public function vymazKosikOdhlasenie($id) {
        $sql = "delete  from kosik where zakaznik = '$id'";
        $this->connection->query($sql);
    }





    public function getMnozstvoKosik($idZ,$idF)
    {
        $sql = "select pocet from kosik where zakaznik ='$idZ' and film = '$idF' ";
        $vysledok = $this->connection->query($sql);
        $row = $vysledok->fetch_assoc();
        return $row['pocet'];


    }



    public function vytvorObjednavku($idZ,$idF,$platba,$dorucenie,$mnozstvo,$den,$mesiac,$rok) {
        $sql = "insert into objednavka (zakaznik,film,platba,dorucenie,mnozstvo,den,mesiac,rok) values ('$idZ','$idF','$platba','$dorucenie','$mnozstvo','$den','$mesiac','$rok')";
        $this->connection->query($sql);
    }


    public function updateCisloDomu($cislo,$login) {
        $sql = "update zakaznik set cislo_domu = '$cislo' where login = '$login'";
        $this->connection->query($sql);
    }

    public function updatePsc($psc,$login) {
        $sql = "update zakaznik set psc = '$psc' where login = '$login'";
        $this->connection->query($sql);
    }

    public function updateMesto($mesto,$login) {
        $sql = "update zakaznik set mesto = '$mesto' where login = '$login'";
        $this->connection->query($sql);
    }

    public function updateTelefon($telefon,$login) {
        $sql = "update zakaznik set telefon= '$telefon' where login = '$login'";
        $this->connection->query($sql);
    }

    public function updateEmail($email, $login){
        $sql = "update zakaznik set email = '$email' where login = '$login'";
        $this->connection->query($sql);
    }


    public function updatePocetFilm($idFilm,$idPocet)
    {
    $sql= "update film set pocet = '$idPocet' where id = '$idFilm'";
    $this->connection->query($sql);

    }


    public function dajObjednavku($id) {
        $poleO = array();
        $pocet = 0;
        $sql = "select * from objednavka where zakaznik='$id'";
        $vysledok = $this->connection->query($sql);

        while($row = $vysledok->fetch_assoc()) {
            $obj = new Objednavka($row['zakaznik'],$row['film'],$row['platba'],$row['dorucenie'],$row['mnozstvo'],$row['den'],$row['mesiac'],$row['rok']);
            $poleO[$pocet] = $obj;
            ++$pocet;
        }
        return $poleO;

    }

    public function getNazovFilm($id)
    {

        $sql = "select nazov from film where id = $id";

        $vysledok = $this->connection->query($sql);
        $row = $vysledok->fetch_assoc();
        return $row['nazov'];
    }

    public function getCenaFilm($id)
    {
        $sql = "select cena from film where id = $id";

        $vysledok = $this->connection->query($sql);
        $row = $vysledok->fetch_assoc();
        return $row['cena'];
    }

}