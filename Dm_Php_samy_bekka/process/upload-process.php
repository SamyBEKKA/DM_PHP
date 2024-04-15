<?php
require_once __DIR__ . '/../data/db.php';
require_once __DIR__ . '/../functions/utils.php';
require_once __DIR__ . '/../classes/Country.php';
require_once __DIR__ . '/../classes/Travel.php';

// var_dump($_POST);
// exit;


// $success = false;
// $success = $stmt->execute([
//     'name_travel'=> $name_travel,
//     'travel_text' => $travel_text
// ]);
// if (!$success) {
//     redirect('upload.php');
// }
// redirect('index.php');


try{
    $name_travel = $_POST['name_travel'];
    $travel_text = $_POST['travel_text'];
    $pdo = getConnection();
    $baseArticle = new Travel($pdo);
    $baseArticle->setInsert([
        'name_travel' => $name_travel,
        'travel_text'=> $travel_text
        ]);
    
    // $success = true;
    redirect('../index.php');
}
catch(PDOException $e) {
//  redirect('upload.php');
    echo $e->getMessage();
}



// $travelliste = new Travel(getTravelRequests());
// $reponse = $travelliste->();
// var_dump($travelliste);