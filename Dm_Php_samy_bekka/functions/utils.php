<?php

// pas besoin de commenté je croie haha
function redirect(string $location): void
{
    header('Location: ' . $location);
    exit;
}
