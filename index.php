<?php

require_once "produitFactory.php";
require_once "db.php";

function ajouterAuPanier(Produit $produit){
    echo $produit->getNom() . " - " . " TTC : ". $produit->calculerPrixTTC() . " € - Port : ". $produit->getFraisDePort() . " € <br>";  
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

echo "TOTAL : $total € <br>";

$compteType = "SELECT type, COUNT(*) AS nombre FROM produit GROUP BY type";
$stmt = $pdo->query($compteType);
$type = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($type as $ligne){
    echo $ligne["type"] . " - " . $ligne["nombre"] . "<br>";


}





