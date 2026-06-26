<?php

require_once "Produit.php";

class Ebook extends Produit{

    #[Override]
    function calculerPrixTTC()
    {
        $prixTTC = $this->prixHT * 1.20;
        return round($prixTTC, 2);
    }

    #[Override]
    function getType()
    {
        return "ebook";
    }

    



}