<?php
session_start();
require_once __DIR__ . '/layout/header.php';
require_once __DIR__ . '/layout/nav.php';
require_once __DIR__ . '/classes/Country.php';
require_once __DIR__ . '/classes/Travel.php';
require_once __DIR__ . '/classes/Continent.php';
require_once __DIR__ . '/data/db.php';



$pdo = getConnection();
// $travelDb = new Travel($pdo);
// $titres = $travelDb->findAll();
$countryListe = new Country($pdo);
$boucleCountry = $countryListe->findAll();

?>


<section>
        <div class=" container justify-content-center">
        <h1>Creer ton article</h1>
        <?php
        if (isset($_SESSION['error_message'])) {
            echo '<div class="alert alert-danger">' . $_SESSION['error_message'] . '</div>';
            unset($_SESSION['error_message']);
        }
        ?>
            <div class=" align-self-center">
                <div class="col-lg-4 mb-4">
                    <div class="border mb-4">
                    <main>
                        <h2>Nouvelle article :</h2>             
                        <form action="process/upload-process.php" method="post" enctype="multipart/form-data">
                            <div><label for="name_travel">Ville :</label>
                            <input type="text" name="name_travel" id="name_travel" /></div>
                                
                            <div><label for="travel_text">Texte :</label>
                            <input type="text" name="travel_text" id="travel_text" /></div>                                
                            <div> 
                                <label for="">Listes pays :</label>
                                    <select name="country_id" id="country_id">
                                        <option value="">-- Sélectionnez un pays --</option>
                                        <?php foreach ($boucleCountry as $country) { ?>
                                            <option value="<?php echo $country['id_country']; ?>">
                                            <?php echo $country['name_country']; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                            </div>
                            <div>
                                <label for="image_upload">Télécharger une image</label>
                                <input type="file" name="image_upload" id="image_upload" />
                            </div>
                            <div>
                                <label for="image_url">Ou utiliser un lien Internet pour l'image</label>
                                <input type="text" name="image_url" id="image_url" />
                            </div>
                                <div><input type="submit" value="Publié" /></div>  
                        </form>
                    </main>              
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="border mb-4">
                        <h2>Listes des articles Carrouselles</h2>
                        <!-- Dans cette partie la je voulais faire apparaître le carrouselle à nouveau pour
                        faire comme un rappel de ce qui est déjà présent, purement visuel -->
                    </div>
                </div>
            </div>
        </div>
</section>


<br><br><br><br>
<?php
require_once __DIR__ . '/layout/footer.php';