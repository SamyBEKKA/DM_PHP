<?php
session_start();
require_once __DIR__ . '/layout/header.php'; 
require_once __DIR__ . '/layout/nav.php';
require_once __DIR__ . '/data/db.php';
require_once __DIR__ . '/classes/Country.php';
require_once __DIR__ . '/classes/Continent.php';
require_once __DIR__ . '/classes/Travel.php';

if (!isset($_GET['id'])) {
    $_SESSION['error_message'] = "ID du pays non fourni.";
    header('Location: index.php');
    exit;
}

$countryId = intval($_GET['id']);

$pdo = getConnection();
$country = new Country($pdo);
$travel = new Travel($pdo);
$continent = new Continent($pdo);

$countryData = $country->find($countryId);
$travels = $travel->findByCountry($countryId);
$continentData = $continent->find($countryData['continent_id']);

if (!$countryData) {
    $_SESSION['error_message'] = "Pays non trouvé.";
    header('Location: index.php');
    exit;
}
?>
<div class="container mt-4">
    <h1><?php echo htmlspecialchars($countryData['name_country']); ?></h1>
    <h3>Continent : <?php echo htmlspecialchars($continentData['name_continent']); ?></h3>
    
    <?php if (empty($travels)) { ?>
        <p>Aucun voyage trouvé pour ce pays.</p>
    <?php } else { ?>
        <div class="row">
            <?php foreach ($travels as $travel) { 
                $imagePath = $travel['img_travel'];
                // Vérifiez si une image est présente
                if (empty($imagePath)) {
                    $imagePath = '/images/disposition-articles-voyage-au-dessus-vue.jpg'; // Chemin de l'image par défaut
                }
                ?>
                <div class="col-lg-4 mb-4">
                    <div class="card">
                        <img src="<?php echo htmlspecialchars($imagePath); ?>" class="card-img-top" alt="Image de l'article">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($travel['name_travel']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($travel['travel_text']); ?></p>
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
