<?php

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

if ($argc > 2) {
    $fich = basename(__FILE__);
    echo <<< MARCA_FIN

    Usage: $fich

MARCA_FIN;
    exit(0);
}

$userRepository = $entityManager->getRepository(User::Class);
$users = $userRepository->findAll();

if (empty($users)) {
    echo 'No existen datos en la base de datos' . PHP_EOL;
} else {
    foreach ($users as $user) {
        $entityManager->remove($user);
        $entityManager->flush();
    }

    if (in_array('--json', $argv, true)) {
        echo json_encode($users, JSON_PRETTY_PRINT) . PHP_EOL;
    }

    echo 'Se han eliminado todos los usuarios' . PHP_EOL;
}