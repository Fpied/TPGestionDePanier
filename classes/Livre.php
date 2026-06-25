<?php

require_once "Produit.php";

class Livre extends Produit{

    #[Override]
    function calculerPrixTTC()
    {
        $prixTTC = $this->prixHT * 1.055;
    }

    #[Override]
    function getFraisDePort()
    {
        return 2;
    }



}