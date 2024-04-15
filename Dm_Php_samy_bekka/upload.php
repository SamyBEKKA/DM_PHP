<?php
require_once __DIR__ . '/layout/header.php';
require_once __DIR__ . '/layout/nav.php';
require_once __DIR__ . '/classes/Country.php';
require_once __DIR__ . '/classes/Travel.php';
require_once __DIR__ . '/classes/Table.php';

//tentative N°2 (voir la 1 dans db.php)


// var_dump($_POST);
// try{
//     $pdo = getConnection();
//     $baseArticle = new Travel($pdo);
//     $baseArticle->setInsert([
//         'nameTravel' => $_POST ['name_travel'],
//         'travelText'=> $_POST['travel_text']]

//     );
//     $success = true;
//     var_dump($_POST);
// } catch (PDOException $e) {
//     var_dump($_POST);
// } 


$pdo = getConnection();
$titre = new Travel($pdo);
$titres = $titre->findAll();
// pas eu le temps de faire une page rebon :C
?>


<section>
            <div class=" container justify-content-center">
            <h1>Creer ton article</h1>
                <div class=" align-self-center">
                    <div class="col-lg-4 mb-4">
                        <div class="border mb-4">
                        <main>
                            <?php $pdo = getConnection();
                            $countryliste = new Country($pdo);
                            $boucleCountry = array_merge($countryliste->findAll()); ?>
                            <h2>Nouvelle article :</h2>             
                            <form action="process/upload-process.php" method="post">
                                <div><label for="name_travel">Ville</label>
                                <input type="text" name="name_travel" id="name_travel" /></div>
                                
                                <div><label for="travel_text">Texte</label>
                                <input type="text" name="travel_text" id="travel_text" /></div>                                
                                <div> 
                                    <label for="">Listes pays</label>
                                        <select name="">
                                            <option value="">-- Sélectionnez un pays --</option>
                                            <?php foreach ($boucleCountry as $countries) { ?>
                                            <option value=<?php $titres["country_id"] ?>>
                                                <?php echo 
                                                $countries["name_country"] 
                                                // C'est ici ou j'ai pas réussi (mais presque pour le insert to country)
                                                ?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                    <div><input type="submit" value="Publié" /></div>  
                                </div>
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