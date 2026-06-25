<?php

class Database
{
    private static ?PDO $instance = null;

    public static function getConnexion(): PDO
    {
        if (self::$instance === null) {
            echo "Création de la connexion...\n"; // témoin, à supprimer après test
            // si t'as pas supprimé ce commentaire, t'as copié collé bêtement, et donc
	          // t'as pas compris ce que tu faisais.
            self::$instance = new PDO(
                'mysql:host=localhost;dbname=boutique;charset=utf8mb4',
                'root',
                '',
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        }
        return self::$instance;
    }
}