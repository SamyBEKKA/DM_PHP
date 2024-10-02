<?php 
session_start();
require_once __DIR__ . '/../data/db.php';

$pdo = getConnection();

try {
    // Rechercher les articles avec leurs pays
    $stmt = $pdo->prepare("
        SELECT t.*, c.name_country 
        FROM travel t
        LEFT JOIN countries c ON t.country_id = c.id_country
    ");
    $stmt->execute();
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Stocker les articles dans la session pour l'affichage
    $_SESSION['carrousel_articles'] = $articles;
    header('Location: ../index.php'); // Redirige vers la page d'accueil ou une autre page où le carrousel est affiché
    exit;
} catch (PDOException $e) {
    $_SESSION['error_message'] = "Erreur de base de données. Veuillez réessayer plus tard.";
    header('Location: ../index.php');
    exit;
}
?>