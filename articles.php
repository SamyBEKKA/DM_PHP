<?php 
require_once __DIR__ . '/layout/header.php';
require_once __DIR__ . '/layout/nav.php';
require_once __DIR__ . '/classes/Travel.php';
require_once __DIR__ . '/classes/Table.php';
require_once __DIR__ . '/data/db.php';
//require_once __DIR__ . '/article-select.php';

$id = $_GET;
$pdo = getConnection();
$travelDb = new Travel($pdo);
$travels = $travelDb->findAll();

$id = new Travel($pdo); 

?>
<h1 class="container">Articles</h1><br>
<?php foreach ($travels as $travel){  
    $imagePath = $travel['img_travel'];

    // Vérifiez si une image est présente
    if (empty($imagePath)) {
        $imagePath = '/images/disposition-articles-voyage-au-dessus-vue.jpg'; // Chemin de l'image par défaut
    }
    ?>

    <section class=""> 
            <div class="container">
                <div class="row ">
                    <div class="col-lg-12 mb-4">
                        <div class="border col-lg-6 mb-4">
                            <div class="card">
                                <img src="<?php echo htmlspecialchars($imagePath); ?>" class="card-img-top" alt="Fissure in Sandstone"/>
                                <div class="card-body">
                                 
                                    <?php  ?>
                                    <h2 class="card-title">  <?php echo($travel['name_travel']);  ?></h2>
                                    <p class="card-text"><?php echo $travel['travel_text'] ?></p>
                                    <?php ?>
                                    <a href="article-select.php?id=<?php echo $travel['id_travel']; ?>" class="btn btn-primary text-center" data-mdb-ripple-init>Lire...</a>
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