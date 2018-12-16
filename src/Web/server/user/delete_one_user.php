<?php

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

$userId = (int) $_GET['userId'];

$userRepository = $entityManager->getRepository(User::Class);
$user = $userRepository->findOneBy(['id' => $userId]);

if ($user === null) {
    echo 'El usuario con ID ' . $userId . ' no se ha encontrado' . PHP_EOL;
    exit(0);
} else {
    $entityManager->remove($user);
    $entityManager->flush();
    echo 'El usuario con ID ' . $userId . ' se ha eliminado' . PHP_EOL;
}