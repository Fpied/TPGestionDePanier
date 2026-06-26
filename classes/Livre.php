<?php

require_once "Produit.php";

class Livre extends Produit{

    #[Override]
    function calculerPrixTTC()
    {
        $prixTTC = $this->prixHT * 1.055;
        return round($prixTTC, 2);
    }

    #[Override]
    function getFraisDePort()
    {
        return 2;
    }

    #[Override]
    function getType()
    {
        return "livre";
    }



}