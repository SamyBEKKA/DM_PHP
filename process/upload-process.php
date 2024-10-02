<?php
session_start();
require_once __DIR__ . '/../data/db.php';
require_once __DIR__ . '/../functions/utils.php';
require_once __DIR__ . '/../classes/Country.php';
require_once __DIR__ . '/../classes/Travel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nameTravel = $_POST['name_travel'];
    $travelText = $_POST['travel_text'] ?? ''; // Le texte peut rester vide
    $countryId = $_POST['country_id'];
    $imageUrl = $_POST['image_url'] ?? '';
    // Validation des données
    if (empty($nameTravel) || empty($countryId)) {
        $_SESSION['error_message'] = "Le nom du voyage et le pays sont obligatoires.";
        header('Location: ../upload.php');
        exit;
    }
    $pdo = getConnection();
    $travel = new Travel($pdo);
    // Gestion du téléchargement de l'image
    $imagePath = '';
    // Vérifiez que soit un fichier est téléchargé, soit une URL est fournie
    if (!empty($_FILES['image_upload']['name']) && !empty($imageUrl)) {
        // L'utilisateur a fourni à la fois une image et une URL
        $_SESSION['error_message'] = "Veuillez choisir soit de télécharger une image, soit de fournir un lien, mais pas les deux.";
        header('Location: ../upload.php');
        exit;
    } elseif (!empty($_FILES['image_upload']['name'])) {
        // Traitement du téléchargement de l'image
        $targetDir = __DIR__ . '/../images/';
        $targetFile = $targetDir . basename($_FILES['image_upload']['name']);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        // Vérification du type de fichier
        $allowedFileTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp']; // Ajout du type webp
        if (!in_array($imageFileType, $allowedFileTypes)) {
            $_SESSION['error_message'] = "Le format de fichier n'est pas supporté. Veuillez utiliser JPG, JPEG, PNG, GIF ou WebP.";
            header('Location: ../upload.php');
            exit;
        }
        $check = getimagesize($_FILES['image_upload']['tmp_name']);
        if ($check !== false) {
            if (move_uploaded_file($_FILES['image_upload']['tmp_name'], $targetFile)) {
                $imagePath = '/images/' . basename($_FILES['image_upload']['name']);
            } else {
                $_SESSION['error_message'] = "Désolé, une erreur s'est produite lors du téléchargement de l'image.";
                header('Location: ../upload.php');
                exit;
            }
        } else {
            $_SESSION['error_message'] = "Le fichier sélectionné n'est pas une image valide.";
            header('Location: ../upload.php');
            exit;
        }
    } elseif (!empty($imageUrl)) {
        // Utilisation de l'URL de l'image
        $imagePath = $imageUrl;
    } else {
        $_SESSION['error_message'] = "Veuillez télécharger une image ou fournir une URL pour l'image.";
        header('Location: ../upload.php');
        exit;
    }
    try {
        $travel->setInsert([
            'name_travel' => $nameTravel,
            'travel_text' => $travelText,
            'country_id' => $countryId,
            'img_travel' => $imagePath
        ]);
        $_SESSION['success_message'] = "Article créé avec succès!";
        header('Location: ../articles.php');
        exit;
    } catch (PDOException $e) {
        $_SESSION['error_message'] = "Erreur lors de la création de l'article : " . $e->getMessage();
        header('Location: ../upload.php');
        exit;
    }
}
?>
