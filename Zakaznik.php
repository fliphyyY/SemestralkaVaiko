<?php


class Zakaznik
{
    public $login;
    public $meno;
    public $priezvisko;
    public $email;
    public $heslo;
    public $mesto;
    public $cisloDomu;
    public $psc;
    public $telefon;

    public function __construct($login, $meno, $priezvisko, $email, $heslo, $mesto, $cisloDomu, $psc, $telefon)
    {

        $this->login = $login;
        $this->meno = $meno;
        $this->priezvisko = $priezvisko;
        $this->email = $email;
        $this->heslo= $heslo;
        $this->mesto = $mesto;
        $this->cisloDomu = $cisloDomu;
        $this->psc = $psc;
        $this->telefon = $telefon;


    }


    public function getLogin()
    {
        return $this->login;
    }


    public function getMeno()
    {
        return $this->meno;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPriezvisko()
    {
        return $this->priezvisko;
    }

    public function getMesto()
    {
        return $this->mesto;
    }

    public function getPsc()
{
    return $this->psc;
}


    public function getCisloDomu()
    {
    return $this->cisloDomu;
    }


    public function getTelefon()
    {
        return $this->telefon;
    }

    public function setMesto($mesto)
    {
        $this->mesto = $mesto;
    }


    public function setPsc($psc)
    {
        $this->psc=$psc;
    }

    public function setCisloDomu($cisloDomu)
    {
        $this->cisloDomu=$cisloDomu;
    }

    public function setTelefon($telefon)
    {
        $this->telefon=$telefon;
    }

}