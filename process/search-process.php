<?php
session_start();

require_once __DIR__ . '/../layout/nav.php';
require_once __DIR__ . '/../data/db.php';
require_once __DIR__ . '/../classes/Travel.php';
require_once __DIR__ . '/../classes/Country.php';
require_once __DIR__ . '/../classes/Continent.php';

if (!isset($_GET['query']) || empty($_GET['query'])) {
    $_SESSION['error_message'] = "Veuillez entrer un terme de recherche.";
    header('Location: ../index.php'); // Redirige vers la page d'accueil ou une autre page
    exit;
}

$query = trim($_GET['query']); // Supprime les espaces en début et fin de chaîne
$query = htmlspecialchars($query, ENT_QUOTES, 'UTF-8'); // Convertit les caractères spéciaux en entités HTML

$pdo = getConnection();
$travel = new Travel($pdo);
$country = new Country($pdo);
$continent = new Continent($pdo);

// Recherche de la ville (travel_name)
$travelResult = $travel->findByName($query);
if ($travelResult) {
    $id = $travelResult['id_travel'];
    header("Location: ../article-select.php?id=$id");
    exit;
}

// Recherche du pays (name_country)
$countryResult = $country->findByName($query);
if ($countryResult) {
    $countryId = $countryResult['id_country'];
    $_SESSION['country_id'] = $countryId;
    header("Location: ../country-details.php?id=$countryId");
    exit;
}

// Recherche du continent (name_continent)
$continentResult = $continent->findByName($query);
if ($continentResult) {
    $continentId = $continentResult['id_continent'];
    $_SESSION['continent_id'] = $continentId;
    header("Location: ../continent-details.php?id=$continentId");
    exit;
}
// Si aucune correspondance trouvée
$_SESSION['error_message'] = "Aucun résultat trouvé pour \"$query\".";
header('Location: ../index.php');
exit;

// try {
//     // Rechercher des articles par nom de voyage (ville), texte de voyage et pays
//     $stmt = $pdo->prepare("
//         SELECT t.*, c.name_country, cn.name_continent 
//         FROM travel t
//         LEFT JOIN countries c ON t.country_id = c.id_country
//         LEFT JOIN continent cn ON c.continent_id = cn.id_continent
//         WHERE t.name_travel LIKE :query
//         OR t.travel_text LIKE :query
//         OR c.name_country LIKE :query
//         OR cn.name_continent LIKE :query
//     ");
//     $searchQuery = '%' . $query . '%';
//     $stmt->bindParam(':query', $searchQuery, PDO::PARAM_STR);
//     $stmt->execute();
//     $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

//     // Vérifier si une seule ville correspond à la recherche
//     if (count($results) === 1 && stripos($results[0]['name_travel'], $query) !== false) {
//         $id = $results[0]['id_travel'];
//         header("Location: ../article-select.php?id=$id");
//         exit;
//     }
//     // Stocker les résultats de recherche dans la session
//     $_SESSION['search_results'] = $results;
//     $_SESSION['search_query'] = $query;

//     // Rediriger vers la page des résultats de recherche
//     header('Location: ../search-result.php');
//     exit;
// } catch (PDOException $e) {
//     $_SESSION['error_message'] = "L'article sous ce nom est encore inexistant.";
//     header('Location: ../articles.php');
//     exit;
// }
?>
