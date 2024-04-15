<?php
require_once __DIR__ . '/Table.php';
class Travel extends Table
{
    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo, 'travel');
    }

    public function setInsert(array $data)
    {
        $insertTravel = "INSERT INTO travel(`name_travel`, `travel_text`, `country_id`) VALUES (:name_travel, :travel_text, :country_id)";
        $stmt = $this->pdo->prepare($insertTravel);
        $stmt->execute([
            'name_travel' => $data['name_travel'],
            'travel_text' => $data['travel_text'],
            'country_id' => $data['country_id']
            // à cause de difficulté et de perte de temps pour avancé et y arriver
            // j'ai laissé pour les tous, les mêmes noms/valeurs que dans ma base de donnée
            // j'espère ne pas perdre de point bêtements à cause de ça, au moins ça m'aura permi de comprendre quelque erreur
            // et également de reconnaitre directement à quoi il signifie dans ma base de donnée.
        ]);
    }
}
