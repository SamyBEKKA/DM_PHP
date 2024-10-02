<?php
session_start();
require_once __DIR__ . '/layout/header.php';
require_once __DIR__ . '/layout/nav.php';
require_once __DIR__ . '/data/db.php';
require_once __DIR__ . '/classes/Continent.php';

$pdo = getConnection();
$continent = new Continent($pdo);
$continents = $continent->findAll(); // Récupère tous les continents

?>

<div class="container mt-4">
    <h1>Liste des continents</h1>
    <ul>
        <?php foreach ($continents as $continent) { ?>
            <li>
                <a href="continent-details.php?id=<?php echo htmlspecialchars($continent['id_continent']); ?>">
                    <?php echo htmlspecialchars($continent['name_continent']); ?>
                </a>
            </li>
        <?php } ?>
    </ul>
</div>

<?php
require_once __DIR__ . '/layout/footer.php';
?>
