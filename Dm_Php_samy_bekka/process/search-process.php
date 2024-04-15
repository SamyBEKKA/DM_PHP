<?php
require_once __DIR__ . '/../classes/Country.php';
require_once __DIR__ . '/../data/db.php';

// Je voulais créer dans la bar de recherche un moyen de retrouvé des articles répondant à ce genre de commande SQL :
// SELECT name_country FROM country WHERE name_country LIKE 'e%'; Prise dans la class en "new Contry".