<?php



class Film
{

    public $zaner;
    public $nazov;
    public $cena;
    public $rok;
    public $popis;
    public $pocet;
    public $obrazok;


    public function __construct($zaner, $nazov, $cena, $rok, $popis, $pocet, $obrazok)
    {

        $this->zaner = $zaner;
        $this->nazov = $nazov;
        $this->cena = $cena;
        $this->rok = $rok;
        $this->popis = $popis;
        $this->pocet = $pocet;
        $this->obrazok= $obrazok;
    }

    public function getZaner()
    {
        return $this->zaner;
    }

    public function getNazov()
    {
        return $this->nazov;
    }


    public function getCena()
    {
        return $this->cena;
    }
    public function getRok()
    {
        return $this->rok;
    }

    public function getPopis()
    {
        return $this->popis;
    }

    public function getPocet()
    {
        return $this->pocet;
    }


    public function getObrazok()
    {
        return $this->obrazok;
    }

}