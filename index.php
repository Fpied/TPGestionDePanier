<?php

require_once "produitFactory.php";
require_once "db.php";


// J'ai eu des problèmes là parce qu'il disent d'ajouté au panier mais finalement faut juste écrire une phrase
function ajouterAuPanier(Produit $produit){
    echo $produit->getNom() . " - " . " TTC : ". $produit->calculerPrixTTC() . " € - Port : ". $produit->getFraisDePort() . " € <br>";  
}

// je demande la connexion à la base de donnée
$pdo = Database::getConnexion();
// Je prépare ma requete SQL
$ligne = "SELECT * FROM produit";
// Au départ j'avais mis execute parce c'est écris dans l'exercice mais Nicolas m'a demandé de mettre query
$stmt = $pdo->query($ligne);
// Je récupère toute les lignes renvoyées par une requête SQL
// LE PDO:: FETCH_ASSOC me renvoie chaque ligne sous forme de tableau associatif
$lignes = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Je déclare la variable 0 comme le demande l'exercice
$total = 0;
foreach($lignes as $ligne){
    // Pour chaque ligne je créer un produit qui se trouve dans la class ProduitFActory 
    $produit = ProduitFactory::creerProduit($ligne);
    ajouterAuPanier($produit);
    // Je calcul le prix
    $total = $total + $produit->calculerPrixTTC() + $produit->getFraisDePort();


}
// J'affiche le prix total
echo "TOTAL : $total € <br>";

// Je compte le nombre de produit qui existe dans ma base de donnée par type genre 2 Livre, 2Ebook
$compteType = "SELECT type, COUNT(*) AS nombre FROM produit GROUP BY type";
$stmt = $pdo->query($compteType);
$type = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($type as $ligne){
    // J'affiche
    echo $ligne["type"] . " - " . $ligne["nombre"] . "<br>";


}





