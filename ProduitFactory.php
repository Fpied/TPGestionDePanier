<?php
// Ce fichier à besoin des trois classes
require_once "classes/Livre.php";
require_once "classes/Ebook.php";
require_once "classes/vynile.php";



class ProduitFactory{

    // Cette méthode ne possède aucun état (aucune propriété) Elle sert uniquement à fabriquer un objet
    public static function creerProduit(array $ligne){

        // L'expression Match est une fonctionnalité de PHP8 qui replace le switch avec une syntaxe plus concise
        return match($ligne['type']){
            // Si le type est égale à 'livre' je créé un nouveau livre avec le nom et le prix hors taxes
            'livre' => new Livre($ligne["nom"], (float) $ligne["prix_ht"]),
            'ebook' => new Ebook($ligne["nom"], (float) $ligne["prix_ht"]),
            'vynile' => new Vynile($ligne["nom"], (float) $ligne["prix_ht"]),
            default => throw new InvalidArgumentException("Type inconnu"),

        };
    }

}





