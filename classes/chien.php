<?php
include("../bdd/bdd.php");

class Chien { // Classe Chien qui contient les éléments de base
  private $id;
  private $nom;
  private $race;
  private $terrain;
  private $sante;
  private $bonheur;
  private $proprete;
  private $faim;
  private $idUtilisateur;


  public function __construct($id, $nom, $race, $terrain, $sante, $bonheur, $proprete, $faim, $idUtilisateur) {
    // Constrcuteur élémentaire pour créer un chien à partir de la BDD
      $this->id = $id;
      $this->nom = $nom;
      $this->race = $race;
      $this->terrain = $terrain;
      $this->sante = $sante;
      $this->bonheur = $bonheur;
      $this->proprete = $proprete;
      $this->faim = $faim;
      $this->idUtilisateur = $idUtilisateur;
  }

  // METHODES : accès aux propriétés

  public function getId() {
      return $this->id;
  }

  public function getNom() {
      return $this->nom;
  }

  public function getRace() {
      return $this->race;
  }

  public function getTerrain() {
    return $this->terrain;
}

  public function getSante() {
      return $this->sante;
  }

  public function getBonheur() {
      return $this->bonheur;
  }

  public function getProprete() {
      return $this->proprete;
  }

  public function getFaim() {
      return $this->faim;
  }

  public function getIdUtilisateur() {
      return $this->idUtilisateur;
  }

  // METHODES : fonctions pour interragir avec le chien

    // Nourrir 
     // Augmente la Santé de +10, réduit la Propreté de -5
    public function nourrir() {
        $nouvelleSante = $this->getSante() + 10;
        $nouvelleProprete = $this->getProprete() - 5;
        $id = $this->getId();
        $sqlnourrir = "UPDATE Animaux SET Sante=".$nouvelleSante.", Proprete=".$nouvelleProprete." WHERE id=".$id."";
        $resultatnourrir = $GLOBALS["pdo"]->query($sqlnourrir);
    }

    // Brosser
     // Augmente la Propreté de +15, la Santé de +5 
     public function brosser() {
        $nouvelleSante = $this->getSante() + 5;
        $nouvelleProprete = $this->getProprete() + 15;
        $id = $this->getId();
        $sqlbrosser = "UPDATE Animaux SET Sante=".$nouvelleSante.", Proprete=".$nouvelleProprete." WHERE id=".$id."";
        $resultatbrosser = $GLOBALS["pdo"]->query($sqlbrosser);
    }

    // Jouer
     // Augmente le Bonheur de +20, augmente la Faim de +10 
    public function jouer() {
        $nouveauBonheur = $this->getBonheur() + 20;
        $nouvelleFaim = $this->getFaim() + 10;
        $id = $this->getId();
        $sqljouer = "UPDATE Animaux SET Bonheur=$nouveauBonheur, Faim=$nouvelleFaim WHERE id=$id";
        $resultatjouer = $GLOBALS["pdo"]->query($sqljouer);
}

}




?>