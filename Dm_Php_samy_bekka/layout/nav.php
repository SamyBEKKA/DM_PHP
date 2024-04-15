<?php 
//require_once __DIR__ . '/classes/Travel.php';
// require_once __DIR__ . '/classes/Table.php';
//require_once __DIR__ . '/data/db.php';

//$pdo = getConnection();
//J'ai fais ces requires et $pdo dans le but de faire le SEARCH et potentielement l'admin/login à l'avenir 
// qui se retrouve en partie aussi dans la page : article-select.php
?>
<nav class="container">
        <ul class="nav justify-content-center">
            <li class="nav-item nav ">
                <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
            </li>
            
            <li class="nav-item nav ">
                <a class="nav-link" href="articles.php">Articles</a>
            </li>
            <form class="d-flex disabled " role="search" action="search-process.php" method="post">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <li class="nav-item justify-content-right">
                <a class="nav-link active" aria-current="page" href="admin/index.php">Admin</a>
            </li>
            <li class="nav-item nav ">
                <a class="nav-link" href="upload.php">Upload d'article</a>
            </li>
        </ul>
    </nav>