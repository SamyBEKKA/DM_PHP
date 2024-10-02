<?php
require_once __DIR__ . '/Table.php';

class Continent extends Table
{
    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo, 'continent', 'id_continent');
    }

    public function setInsert(array $data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO continent (name_continent) VALUES (:name_continent)");
        $stmt->execute($data);
    }
    public function findByName(string $name): ?array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM continent WHERE name_continent = :name_continent");
        $stmt->execute(['name_continent' => $name]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
}
