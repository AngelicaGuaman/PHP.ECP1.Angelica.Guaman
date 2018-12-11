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

if ($argc < 2 || $argc > 3) {
    $fich = basename(__FILE__);
    echo <<< MARCA_FIN

    Usage: $fich <UserId>

MARCA_FIN;
    exit(0);
}

$userId = (int)$argv[1];

$userRepository = $entityManager->getRepository(User::Class);
$user = $userRepository->findOneBy(['id' => $userId]);


if ($user === null) {
    echo 'El usuario con ID ' . $userId . ' no se ha encontrado' . PHP_EOL;
    exit(0);
}

if (in_array('--json', $argv, true)) {
    echo json_encode($user, JSON_PRETTY_PRINT) . PHP_EOL;
} else {
    echo PHP_EOL
        . sprintf('%3s - %30s - %30s - %30s - %30s', 'Id', 'Nombre de usuario', 'Email',
            'Is Enabled ?', 'Is Admin ?')
        . PHP_EOL;
    echo PHP_EOL
        . sprintf('%3s - %30s - %30s - %30s - %30s', $user->getId(), $user->getUsername(), $user->getEmail(),
            ($user->isEnabled() ? 'true' : 'false'), ($user->isAdmin() ? 'true' : 'false'))
        . PHP_EOL;
}