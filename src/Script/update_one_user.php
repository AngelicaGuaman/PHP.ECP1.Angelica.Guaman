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

if ($argc < 2 || $argc > 7) {
    $fich = basename(__FILE__);
    echo <<< MARCA_FIN

    Usage: $fich <UserId> [<Username>] [<Email>] [<Password>] [<IsEnabled>]

MARCA_FIN;
    exit(0);
}

$userId = (int)$argv[1];

$userRepository = $entityManager->getRepository(User::Class);
$user = $userRepository->findOneBy(['id' => $userId]);

if ($user === null) {
    echo 'Usuario $userId no encontrado ' . PHP_EOL;
    exit(0);
}

foreach ($argv as $k => $v) {
    if($k === 2){
        $user->setUsername($v);
    }else if($k === 3){
        $user->setEmail($v);
    }else if($k === 4){
        $user->setPassword($v);
    }else if($k === 5){
        if($v === 'true' || $v === 'false'){
            $isEnabled = $v === 'true' ? true : false;
            $user->setEnabled($isEnabled);
        }
    }
}

try {
    $entityManager->persist($user);
    $entityManager->flush();

    if (in_array('--json', $argv, true)) {
        echo json_encode($user, JSON_PRETTY_PRINT) . PHP_EOL;
    }

    echo 'Se ha actualizado el usuario ' . $user->getUsername() . ' con ID ' . $user->getId() . PHP_EOL;
} catch (Exception $exception) {
    echo $exception->getMessage() . PHP_EOL;
}