<?php
$serveur = "DESKTOP-34KRKCP";
$base_de_donnees = "SIMFORM";
$utilisateur = "";
$mot_de_passe = "";

try {
    $connexion = new PDO(
        "sqlsrv:Server=$serveur;Database=$base_de_donnees",
        $utilisateur,
        $mot_de_passe
    );
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connexion réussie !";
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
