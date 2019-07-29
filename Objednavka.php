<?php



class Objednavka
{
  public $zakaznik;
  public $film;
  public $platba;
  public $dorucenie;
  public $mnozstvo;
  public $den;
  public $mesiac;
  public $rok;

  public function __construct($zakaznik, $film, $platba, $dorucenie, $mnoztvo, $den, $mesiac, $rok)
  {

      $this->zakaznik= $zakaznik;
      $this->film = $film;
      $this->platba = $platba;
      $this->dorucenie= $dorucenie;
      $this->mnozstvo= $mnoztvo;
      $this->den = $den;
      $this->mesiac= $mesiac;
      $this->rok = $rok;
  }


  public function getZakaznikO()
  {
      return $this->zakaznik;
  }

  public function getFilmO()
  {
      return $this->film;
  }

  public function getPlatbaO()
  {
      return $this->platba;
  }

  public function getDorucenieO()
  {
      return $this->dorucenie;
  }

    public function getMnozstvoO()
    {
        return $this->mnozstvo;
    }

    public function getDenO()
    {
        return $this->den;
    }

    public function getMesiacO()
    {
        return $this->mesiac;
    }

    public function getRokO()
    {
        return $this->rok;
    }







}
?>