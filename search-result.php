<?php 
session_start();
require_once __DIR__ . '/layout/header.php'; 
require_once __DIR__ . '/layout/nav.php';

$results = $_SESSION['search_results'] ?? [];
$query = $_SESSION['search_query'] ?? '';
$error_message = $_SESSION['error_message'] ?? '';

unset($_SESSION['search_results']);
unset($_SESSION['search_query']);
unset($_SESSION['error_message']);

?>
<div class="container">
        <?php if (!empty($error_message)) { ?>
            <div class="alert alert-danger mt-4"><?php echo htmlspecialchars($error_message); ?></div>
        <?php } ?>

        <h1>Résultats de la recherche pour "<?php echo htmlspecialchars($query); ?>"</h1>
        <?php if (empty($results)) { ?>
            <p>Aucun résultat trouvé.</p>
        <?php } else { ?>
            <div class="row">
                <?php foreach ($results as $result) { ?>
                    <div class="col-lg-4 mb-4">
                        <div class="card">
                        <img src="<?php echo htmlspecialchars($result['img_travel']); ?>" class="card-img-top" alt="Image de l'article">
                            <div class="card-body">
                                <h2 class="card-title"><?php echo htmlspecialchars($result['name_travel']); ?></h2>
                                <p class="card-text"><?php echo htmlspecialchars($result['travel_text']); ?></p>
                                <p class="card-text"><small class="text-muted"><?php echo htmlspecialchars($result['name_country']); ?>, <?php echo htmlspecialchars($result['name_continent']); ?></small></p>
                                <a href="country-details.php?id=<?php echo htmlspecialchars($result['country_id']); ?>" class="btn btn-primary text-center">Voir les pays</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
