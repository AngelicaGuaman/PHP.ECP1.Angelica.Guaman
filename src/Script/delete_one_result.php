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

if ($argc < 2 || $argc > 3) {
    $fich = basename(__FILE__);
    echo <<< MARCA_FIN

    Usage: $fich <ResultId>

MARCA_FIN;
    exit(0);
}

$resultId = (int)$argv[1];

$resultRepository = $entityManager->getRepository(Result::Class);
$result = $resultRepository->findOneBy(['id' => $resultId]);

if ($result === null) {
    echo 'El resultado con ID ' . $resultId . ' no se ha encontrado' . PHP_EOL;
    exit(0);
} else {
    $entityManager->remove($result);
    $entityManager->flush();

    if (in_array('--json', $argv, true)) {
        echo json_encode($result, JSON_PRETTY_PRINT) . PHP_EOL;
    }

    echo 'El resultado con ID ' . $resultadoId . ' se ha eliminado' . PHP_EOL;
}