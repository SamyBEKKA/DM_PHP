<?php

abstract class Table
{
    public function __construct(
        protected PDO $pdo,
        protected string $name
    ) {
    }

    abstract public function setInsert(array $data);

    public function findAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM " . $this->name);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find(int $id): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM " . $this->name . " WHERE id=:id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    //l'une des classes les plus utiles et vu que j'ai faites et utilisé
    //ça m'a donné un bon teasing sur la partie synfony en espérant m'en sortir
}
