<?php

require_once "Produit.php";

class Vynile extends Produit{

    #[Override]
    function calculerPrixTTC()
    {
        $prixTTC = $this->prixHT * 1.20;
        return round($prixTTC, 2);
    }

    #[Override]
    function getFraisDePort()
    {
        return 4;
    }

    #[Override]
    function getType()
    {
        return "vynile";
    }



}