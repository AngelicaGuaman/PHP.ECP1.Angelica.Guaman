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

if ($argc < 4 || $argc > 5) {
    $fich = basename(__FILE__);
    echo <<< MARCA_FIN

    Usage: $fich <Username> <Email> <Password>

MARCA_FIN;
    exit(0);
}

$username = $argv[1];
$userEmail = $argv[2];
$userPassword = $argv[3];

$user = new User();
$user->setUsername($username);
$user->setEmail($userEmail);
$user->setPassword($userPassword);
$user->setEnabled(false);
$user->setIsAdmin(false);

try {
    $entityManager->persist($user);
    $entityManager->flush();
    if (in_array('--json', $argv, true)) {
        echo json_encode($user, JSON_PRETTY_PRINT) . PHP_EOL;
    }
    echo 'Se ha creado el usuario ' . $user->getUsername() . ' con ID ' . $user->getId() . PHP_EOL;

} catch (Exception $exception) {
    echo $exception->getMessage() . PHP_EOL;
}