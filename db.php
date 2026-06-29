<?php

class Database
{
    private static ?PDO $instance = null;
    // J'ai bêtement recopié cette classe mais j''ai enlevé ce qui y avait écris en commentaire
    public static function getConnexion(): PDO
    {
        if (self::$instance === null) {
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