<?php

require_once "produitFactory.php";
require_once "db.php";

function ajouterAuPanier(Produit $produit){
    echo $produit->getNom() . " - " . " TTC : ". $produit->calculerPrixTTC() . " € - Port : ". $produit->getFraisDePort() . " €";  ;
}

$pdo = Database::getConnexion();
$ligne = "SELECT * FROM produit";
$stmt = $pdo->query($ligne);
$lignes = $stmt->fetchAll(PDO::FETCH_ASSOC);

$total = 0;
foreach($lignes as $ligne){
    $produit = ProduitFactory::creerProduit($ligne);
    ajouterAuPanier($produit);
    $total = $total + $produit->calculerPrixTTC() + $produit->getFraisDePort();


}

echo "TOTAL : $total €";





