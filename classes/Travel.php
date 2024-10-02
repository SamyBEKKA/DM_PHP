<?php
require_once __DIR__ . '/Table.php';

class Travel extends Table
{
    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo, 'travel', 'id_travel');
    }

    public function setInsert(array $data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO travel (name_travel, travel_text, country_id, img_travel) VALUES (:name_travel, :travel_text, :country_id, :img_travel)");
        $stmt->execute($data);
    }

    public function findByCountry(int $country_id): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM travel WHERE country_id = :country_id");
        $stmt->execute(['country_id' => $country_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function findByName(string $name): ?array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM travel WHERE name_travel = :name_travel");
        $stmt->execute(['name_travel' => $name]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
}