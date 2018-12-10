<?php

use MiW\Results\Entity\Result;
use MiW\Results\Utils;

require __DIR__ . '/../../vendor/autoload.php';

// Carga las variables de entorno
$dotenv = new \Dotenv\Dotenv(
    __DIR__ . '/../..',
    Utils::getEnvFileName(__DIR__ . '/../..')
);
$dotenv->load();

$entityManager = Utils::getEntityManager();

if ($argc > 1) {
    $fich = basename(__FILE__);
    echo <<< MARCA_FIN

    Usage: $fich

MARCA_FIN;
    exit(0);
}

$resultRepository = $entityManager->getRepository(Result::Class);
$results = $resultRepository->findAll();

if (empty($results)) {
    echo 'No existen datos en la base de datos' . PHP_EOL;
} else {
    foreach ($results as $result) {
        $entityManager->remove($result);
        $entityManager->flush();
    }

    echo 'Se han eliminado todos los resultados' . PHP_EOL;
}