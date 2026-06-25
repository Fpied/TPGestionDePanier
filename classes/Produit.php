<?php

abstract class Produit{
    protected $nom;
    protected $prixHT;

    public function __construct($nom, $prixHT)
    {
        $this->nom = $nom;
        $this->prixHT = $prixHT;
    }

    public function getNom(){
        return $this->nom;
    }

    abstract function calculerPrixTTC();

    public function getFraisDePort(){
        return 0;
    }





}