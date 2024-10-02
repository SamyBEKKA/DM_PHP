<?php
require_once __DIR__ . '/../data/db.php';
require_once __DIR__ . '/Table.php';
class Country extends Table
{
    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo, 'country', 'id_country');
    }
    public function setInsert(array $data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO country (name_country, continent_id) VALUES (:name_country, :continent_id)");
        $stmt->execute($data);
    }

    public function findByContinent(int $continent_id): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM country WHERE continent_id = :continent_id");
        $stmt->execute(['continent_id' => $continent_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findByName(string $name): ?array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM country WHERE name_country = :name_country");
        $stmt->execute(['name_country' => $name]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
    // public function findName(): array
    // {
    //     $stmt = $this->pdo->query("SELECT `name_country` FROM " . $this->name);
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }
}