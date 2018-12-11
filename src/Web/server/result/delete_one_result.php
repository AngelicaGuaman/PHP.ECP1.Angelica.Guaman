<?php

use MiW\Results\Entity\Result;
use MiW\Results\Utils;

require __DIR__ . '/../../../../vendor/autoload.php';

// Carga las variables de entorno
$dotenv = new \Dotenv\Dotenv(
    __DIR__ . '/../../../..',
    Utils::getEnvFileName(__DIR__ . '/../../../..')
);
$dotenv->load();

$entityManager = Utils::getEntityManager();

$resultId = (int)$argv[1];

$resultRepository = $entityManager->getRepository(Result::Class);
$result = $resultRepository->findOneBy(['id' => $resultId]);

if (null === $result) {
    echo 'El resultado con ID ' . $resultId . ' no se ha encontrado' . PHP_EOL;
    exit(0);
} else {
    $entityManager->remove($result);
    $entityManager->flush();
    echo 'El resultado con ID ' . $resultadoId . ' se ha eliminado' . PHP_EOL;
}