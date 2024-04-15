<?php
require_once __DIR__ . '/../data/db.php';
require_once __DIR__ . '/Table.php';
class Country extends Table
{
    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo, 'country');
    }
    // public function findAll();

    public function setInsert(array $data)
    {
        $insertCountry = "INSERT INTO country(`name_country`) VALUES (:name_country)";
        $stmt = $this->pdo->prepare($insertCountry);
        $stmt->execute([
            `name_country` => $data[`name_country`]
        ]);
    }
    public function findName(): array
    {
        $stmt = $this->pdo->query("SELECT `name_country` FROM " . $this->name);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    //En dessous tu peux voir mes premières tentatives avant d'avoir une classe parente comme "Table
    // j'ai abandonné l'idée de faire une function boucle par peur de perdre trop de temps 
    


    // public function getCountries(): array
    // {
    //     $pdo = getConnection();
    //     $countryfull = $pdo->query("SELECT * FROM country");
    //     return $countryfull->fetchAll();
    // }
    

    // public function setCountries($intoContry): array
    // {
    //     $pdo -> 
    //     $intoContry = $pdo->prepare('INSERT INTO country(name_country) VALUES (:name_country)');
    //     $intoContry->execute([
    //         'name_country' => $_POST ['name_country']
    //     ]);
    //     redirect("upload.php");
    // }

//     function boucleCountry($countryfull): array
//     {
//         $countryfull->name_country;
//         foreach($countryfulls as $countryfull){

//         }
//     }
// 
}