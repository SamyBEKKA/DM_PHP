<?php 
require_once __DIR__ . '/layout/header.php'; 
require_once __DIR__ . '/layout/nav.php';
require_once __DIR__ . '/articles.php';


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

$foundArticle = null;

foreach ($articles as $article) {
    if ($article['id'] === $id) {
        $foundArticle = $article;
    }
}

if ($foundArticle === null) {
    http_response_code(404);
    echo "Membre non trouvé";
    exit;
}
//pas le temps pour une page rebon
?>
<section class="container"> <!-- ICI on met si on veut un backgroud à la section en ajoutant sa class -->
        <div class="justify-content-center"> <!-- container si on touche pas container-fluid si on touche -->
            <div class="row align-self-center">
                <div class=" col-lg-6 mb-4">
                    <div class="border mb-4">
                        <div class="card">
                            <img src="/images/disposition-articles-voyage-au-dessus-vue.jpg" class="card-img-top" alt="Fissure in Sandstone"/>
                            <div class="card-body">
                                <h2 class="card-title">  <?php echo($titre['name_travel']);  ?></h2>
                                    <p class="card-text"><?php echo $titre['travel_text'] ?></p>
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