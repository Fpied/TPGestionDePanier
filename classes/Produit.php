<?php

// je déclare une class abstract une classe spécdiale pour être utilisée comme base pour les classes , livres , Ebook vynile etc... 
abstract class Produit{

    protected string $nom;
    protected float $prixHT;

    public function __construct(string $nom, float $prixHT)
    {
        $this->nom = $nom;
        $this->prixHT = $prixHT;
    }

    public function getNom(){
        return $this->nom;
    }

    // utilisation d'une function utile dans les autres class comme getType; 
    abstract public function calculerPrixTTC();

    // Les frais de port sont défini à zéro pour tout les produits
    public function getFraisDePort(){
        return 0;
    }

    abstract public function getType();





}