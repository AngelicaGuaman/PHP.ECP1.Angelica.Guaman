<?php

use MiW\Results\Entity\Result;
use MiW\Results\Entity\User;
use MiW\Results\Utils;

require __DIR__ . '/../../../../vendor/autoload.php';

// Carga las variables de entorno
$dotenv = new \Dotenv\Dotenv(
    __DIR__ . '/../../../..',
    Utils::getEnvFileName(__DIR__ . '/../../../..')
);
$dotenv->load();

$entityManager = Utils::getEntityManager();

$resultId = (int)$_GET['resultId'];

$resultRepository = $entityManager->getRepository(Result::Class);
$result = $resultRepository->findOneBy(['id' => $resultId]);

$userId = $_POST['userId'];

$userRepository = $entityManager->getRepository(User::Class);
$user = $userRepository->findOneBy(['id' => $userId]);

$score = $_POST['points'];

$result->setUser($user);
$result->setResult($score);

try {
    $entityManager->persist($result);
    $entityManager->flush();
    echo 'Se ha actualizado el resultado con ID ' . $result->getId() . ' y usuario ' . $user->getUsername() . PHP_EOL;
} catch (Exception $exception) {
    echo $exception->getMessage() . PHP_EOL;
}