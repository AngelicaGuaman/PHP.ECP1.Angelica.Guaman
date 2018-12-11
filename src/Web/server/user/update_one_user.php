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

$userRepository = $entityManager->getRepository(User::Class);
$user = $userRepository->findOneBy(['id' => $userId]);

if ($user === null) {
    echo 'Usuario $userId no encontrado ' . PHP_EOL;
    exit(0);
}


try {
    $entityManager->persist($user);
    $entityManager->flush();
    echo 'Se ha actualizado el usuario ' . $user->getUsername() . ' con ID ' . $user->getId() . PHP_EOL;
} catch (Exception $exception) {
    echo $exception->getMessage() . PHP_EOL;
}