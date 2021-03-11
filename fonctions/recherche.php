<?php
class Recherche
{
  private $search;
  private $categorie;
  private $date;
  private $iditem;

  private $titre;
  private $auteur;
  private $affiche;
  private $synopsis;

  public function __construct($search, $categorie, $iditem)
  {
    $this->search = $search;
    $this->categorie = $categorie;
    $this->iditem = $iditem;
  }
//Setteur
  public function setSearch($search)
  {
    $this->search = $search;
  }
  public function setCategorie($categorie)
  {
    $this->categorie = $categorie;
  }
  public function setDate($date)
  {
    $this->date = $date;
  }
  public function setIditem($iditem)
  {
    $this->iditem = $iditem;
  }
//Getteur
  public function getSearch()
  {
    return $this->search;
  }
  public function getCategorie()
  {
    return $this->categorie;
  }
  public function getDate()
  {
    return $this->date;
  }
  public function getIditem()
  {
    return $this->iditem;
  }

//ItemInfos
  public function setTitre($titre)
  {
    $this->titre = $titre;
  }
  public function getTitre()
  {
    return $this->titre;
  }

  public function setAuteur($auteur)
  {
    $this->auteur = $auteur;
  }
  public function getAuteur()
  {
    return $this->auteur;
  }

  public function setAffiche($affiche)
  {
    $this->affiche = $affiche;
  }
  public function getAffiche()
  {
    return $this->affiche;
  }

  public function setSynopsis($synopsis)
  {
    $this->synopsis = $synopsis;
  }
  public function getSynopsis()
  {
    return $this->synopsis;
  }
}
?>
