<?php
session_start();
require_once __DIR__ . '/layout/header.php'; 
require_once __DIR__ . '/layout/nav.php';
require_once __DIR__ . '/data/db.php';
require_once __DIR__ . '/classes/Continent.php';
require_once __DIR__ . '/classes/Country.php';
require_once __DIR__ . '/classes/Travel.php';

if (!isset($_GET['id'])) {
    $_SESSION['error_message'] = "Continent non fourni.";
    header('Location: index.php');
    exit;
}

$continentId = intval($_GET['id']);

$pdo = getConnection();
$continent = new Continent($pdo);
$country = new Country($pdo);

$continentData = $continent->find($continentId);
$countries = $country->findByContinent($continentId);

if (!$continentData) {
    $_SESSION['error_message'] = "Continent non trouvé.";
    header('Location: index.php');
    exit;
}
?>

<div class="container mt-4">
    <h1><?php echo htmlspecialchars($continentData['name_continent']); ?></h1>

    <?php if (empty($countries)) { ?>
        <p>Aucun pays trouvé pour ce continent.</p>
    <?php } else { ?>
        <div class="row">
            <?php foreach ($countries as $country) { ?>
                <div class="col-lg-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($country['name_country']); ?></h5>
                            <a href="country-details.php?id=<?php echo htmlspecialchars($country['id_country']); ?>" class="btn btn-primary">Voir les villes</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
</div>
<?php require_once __DIR__ . '/layout/footer.php'; ?>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script> -->

