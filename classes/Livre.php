<?php

require_once "Produit.php";

class Livre extends Produit{
    // Un attrbut PHP qui indique qu'une méthode doit obligatoirement redéfinir une méthode
    #[Override]
    // Je calcul le prix hors taxe avec la TVA demandé dans l'exercice
    function calculerPrixTTC()
    {
        $prixTTC = $this->prixHT * 1.055;
        // Comme c'est un prix j'arrondis à deux nombre après la virgule
        return round($prixTTC, 2);
    }

    #[Override]
    function getFraisDePort()
    {
        return 2;
    }

    // Je retourne le type
    #[Override]
    function getType()
    {
        return "livre";
    }



}