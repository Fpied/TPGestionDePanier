<?php

require_once "classes/Livre.php";
require_once "classes/Ebook.php";
require_once "classes/vynile.php";



class ProduitFactory{

    public static function creerProduit(array $ligne){


        return match($ligne['type']){
            'livre' => new Livre($ligne["nom"], (float) $ligne["prix_ht"]),
            'ebook' => new Ebook($ligne["nom"], (float) $ligne["prix_ht"]),
            'vynile' => new Vynile($ligne["nom"], (float) $ligne["prix_ht"]),
            default => throw new InvalidArgumentException("Type inconnu"),

        };
    }

}





