<?php

require_once "db.php";

$pdo = Database::getConnexion();

$sql = "SELECT * FROM produit";
$stmt = $pdo->query($sql);

// While ($row =$stmt->fetch(PDO::FETCH_ASSOC)){
//     echo $row['nom'] . " - " . $row['prix_ht'] . "<br>";
// }
$ligne = $stmt->fetch(PDO::FETCH_ASSOC);

function creerProduit($ligne){
    return match('type'){
        'Livre' => new Livre($ligne["nom"], $ligne["prixHT"]),
        'Ebook' => new Ebook($ligne["nom"], $ligne["prixHT"]),
        default => throw new InvalidArgumentException("Type inconnu"),

    };



}