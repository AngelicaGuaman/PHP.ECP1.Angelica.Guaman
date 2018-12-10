<?php

use MiW\Results\Entity\Result;
use MiW\Results\Entity\User;
use MiW\Results\Utils;

require __DIR__ . '/../../vendor/autoload.php';

// Carga las variables de entorno
$dotenv = new \Dotenv\Dotenv(
    __DIR__ . '/../..',
    Utils::getEnvFileName(__DIR__ . '/../..')
);
$dotenv->load();

$entityManager = Utils::getEntityManager();

if ($argc !== 4) {
    $fich = basename(__FILE__);
    echo <<< MARCA_FIN

    Usage: $fich <ResultadoId> <UserId> <Result>

MARCA_FIN;
    exit(0);
}

$resultId = (int)$argv[1];

$resultRepository = $entityManager->getRepository(Result::Class);
$result = $resultRepository->findOneBy(['id' => $resultId]);

if ($result === null) {
    echo 'Resultado con ID $resultadoId no encontrado ' . PHP_EOL;
    exit(0);
}


$userId = (int)$argv[2];

$userRepository = $entityManager->getRepository(User::Class);
$user = $userRepository->findOneBy(['id' => $userId]);

if ($user === null) {
    echo 'Usuario con ID $userId no encontrado ' . PHP_EOL;
    exit(0);
}

$score = (int)$argv[3];

$result->setUser($user);
$result->setResult($score);

try {
    $entityManager->persist($result);
    $entityManager->flush();
    echo 'Se ha actualizado el resultado con ID ' . $result->getId() . ' y usuario ' . $user->getUsername() . PHP_EOL;
} catch (Exception $exception) {
    echo $exception->getMessage() . PHP_EOL;
}