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
    echo 'El Resultado con ID ' . $resultId . ' no se ha encontrado' . PHP_EOL;
    exit(0);
}

if (in_array('--json', $argv, true)) {
    echo json_encode($result, JSON_PRETTY_PRINT) . PHP_EOL;
} else {
    echo PHP_EOL
        . sprintf('%3s - %20s - %20s - %20s', 'Id', 'Resultado', 'Username', 'Time')
        . PHP_EOL;
    echo PHP_EOL
        . sprintf('%3s - %20s - %20s - %20s', $result->getId(),
            $result->getResult(),
            $result->getUser()->getUsername(),
            $result->getTime()->format('d/m/Y H:i:s'))
        . PHP_EOL;
}