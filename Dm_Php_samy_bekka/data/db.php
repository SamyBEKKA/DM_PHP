<?php

function getConnection(): PDO
{

    [
        'DB_HOST'     => $host,
        'DB_PORT'     => $port,
        'DB_NAME'     => $dbName,
        'DB_CHARSET'  => $charset,
        'DB_USER'     => $dbUser,
        'DB_PASSWORD' => $dbPassword
    ] = parse_ini_file(__DIR__ . '/../config/db.ini');

    $dsn = "mysql:host=$host;port=$port;dbname=$dbName;charset=$charset";

    $pdo = new PDO(
        $dsn,
        $dbUser,
        $dbPassword,
        [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
    return $pdo;
}


//parti formulaire pour travel abandonné et fais en classe directement

// function setContactRequests(): array
// {
//     $pdo = getConnection();
//     $stmt = $pdo->query("insert * FROM travel");
//     return $stmt->fetchAll();
// }




// function isContactFormValid(array $data): bool
// {
//     foreach (REQUIRED_FIELDS as $field) {
//         // Si non défini, ou bien défini mais vide
//         if (!isset($data[$field]) || empty($data[$field])) {
//             return false;
//         }
//     }

//     return true;
// }