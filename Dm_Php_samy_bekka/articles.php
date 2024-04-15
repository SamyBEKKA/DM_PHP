<?php 
require_once __DIR__ . '/layout/header.php';
require_once __DIR__ . '/layout/nav.php';
require_once __DIR__ . '/classes/Travel.php';
require_once __DIR__ . '/classes/Table.php';
require_once __DIR__ . '/data/db.php';
//require_once __DIR__ . '/article-select.php';
$id = $_GET;
$pdo = getConnection();
$titre = new Travel($pdo);
$titres = $titre->findAll();
// var_dump($titres);
// exit;
$id = new Travel($pdo); 
//$ids = $id->find();

//maleureusement pas le temps pour faire une page rebon je vais devoir changer presque tous mes requires si je le fais


?>
<h1 class="container">Articles</h1><br>
<?php foreach ($titres as $titre){   ?>
    
<section class="container"> <!-- ICI on met si on veut un backgroud à la section en ajoutant sa class -->
            <div class="justify-content-center"> <!-- container si on touche pas container-fluid si on touche -->
                
                <div class="row align-self-center">
                    <div class=" col-lg-6 mb-4">
                        <div class="border mb-4">
                            <div class="card">
                                <img src="/images/disposition-articles-voyage-au-dessus-vue.jpg" class="card-img-top" alt="Fissure in Sandstone"/>
                                <div class="card-body">
                                 
                                    <?php  ?>
                                    <h2 class="card-title">  <?php echo($titre['name_travel']);  ?></h2>
                                    <p class="card-text"><?php echo $titre['travel_text'] ?></p>
                                    <?php ?>
                                    <a href="article-select.php?get=id" class="btn btn-primary text-center" data-mdb-ripple-init>Lire...</a>
                                    <br>
                                    <!-- ma tentative pour l'id en GET basic on va dire, l'autre on peut la trouvé dans la classe Table -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php } ?>
                                
<br><br><br>

<?php 
require_once __DIR__ . '/layout/footer.php';
?>