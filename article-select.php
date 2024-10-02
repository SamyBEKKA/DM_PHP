<?php 
session_start();
require_once __DIR__ . '/layout/header.php'; 
require_once __DIR__ . '/layout/nav.php';
require_once __DIR__ . '/data/db.php';
// require_once __DIR__ . '/articles.php';
require_once __DIR__ . '/classes/Travel.php';


//Sécurisé l'ID des l'articles inexistant et présent
if (!isset($_GET['id'])) {
    echo "ID obligatoire";
    exit;
}

$id = intval($_GET['id']);

if ($id === 0) {
    echo "Veuillez passer un identifiant valide";
    exit;
}

// $foundArticle = null;
// foreach ($articles as $article) {
//     if ($article['id'] === $id) {
//         $foundArticle = $article;
//     }
// }

$pdo = getConnection();
$travel = new Travel($pdo);
$foundArticle = $travel->find($id);

if ($foundArticle === false) {
    http_response_code(404);
    echo "Article non trouvé";
    exit;
}

// Accéder à l'image avec la notation fléchée
$imagePath = $foundArticle['img_travel']; 

// Vérifiez si une image est présente
if (empty($imagePath)) {
    $imagePath = '/images/disposition-articles-voyage-au-dessus-vue.jpg'; // Chemin de l'image par défaut
}

// Vérifiez si le texte est null et définissez une valeur par défaut si nécessaire
$travelText = $foundArticle['travel_text'] !== null ? $foundArticle['travel_text'] : 'no text'; 
?>
<section class="container"> <!-- ICI on met si on veut un backgroud à la section en ajoutant sa class -->
    <div class="justify-content-center"> <!-- container si on touche pas container-fluid si on touche -->
        <div class="row align-self-center">
            <div class="col-lg-6 mb-4">
                <div class="border mb-4">
                    <div class="card">
                        <img src="<?php echo htmlspecialchars($imagePath); ?>" class="card-img-top" alt="Image de l'article">
                        <div class="card-body">
                            <h2 class="card-title"><?php echo htmlspecialchars($foundArticle['name_travel']); ?></h2>
                            <p class="card-text"><?php echo htmlspecialchars($travelText); ?></p>
                            <a href="articles.php" class="btn btn-primary text-center" data-mdb-ripple-init>BACK</a>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
require_once __DIR__ . '/layout/footer.php'; 