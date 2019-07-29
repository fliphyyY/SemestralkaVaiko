<?php
/**
 * Created by PhpStorm.
 * User: fliphyyy
 * Date: 27.12.2018
 * Time: 1:17
 */

class kosikTrieda
{

    public $id;
    public $zakaznik;
    public $film;
    public $pocet;

    public function __construct($id,$zakaznik,$film,$pocet)
    {

    $this->id = $id;
    $this->zakaznik= $zakaznik;
    $this->film = $film;
    $this->pocet = $pocet;

    }

    public function getIdK()
    {
        return $this->id;
    }

    public function getZakK()
    {
        return $this->zakaznik;
    }

    public function  getFilmK()
    {
        return $this->film;
    }

    public function getPocetK()
    {
        return $this->pocet;
    }

}