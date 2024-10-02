<?php
session_start();
require_once __DIR__ . '/layout/header.php';
require_once __DIR__ . '/layout/nav.php';
require_once __DIR__ . '/data/db.php';
require_once __DIR__ . '/classes/Country.php';

$pdo = getConnection();
$country = new Country($pdo);
$countries = $country->findAll(); // Récupère tous les pays

?>

<div class="container mt-4">
    <h1>Liste des pays</h1>
    <ul>
        <?php foreach ($countries as $country) { ?>
            <li>
                <a href="country-details.php?id=<?php echo htmlspecialchars($country['id_country']); ?>">
                    <?php echo htmlspecialchars($country['name_country']); ?>
                </a>
            </li>
        <?php } ?>
    </ul>
</div>

<?php
require_once __DIR__ . '/layout/footer.php';
?>
